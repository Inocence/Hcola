# -*- coding:utf-8 -*-

import re
import requests
import json
import os
from core.lib.mysql import Mysql


class EduSchoolDoc:

    path = ''
    domain = ''
    login_url = ''
    login_param = {}
    session_path = ''
    db_config = None
    token = ''
    manage = []

    def test(self):
        self.login()
        self.request()

    def refresh(self):
        self.insert_doc()

    def insert_doc(self):
        self.db = Mysql(self.db_config)
        self.login()
        result = self.request()
        for row in result:
            title = self.db.query_one('SELECT * FROM xq_cate WHERE title  = %s', (row['cls'][0], ))
            if title is None:
                pid = self.db.insert('xq_cate', {'pid': 0, 'title': row['cls'][0], 'sort': 100, 'type': 1})
            else:
                pid = title['id']
            act = self.db.query_one('SELECT * FROM xq_cate WHERE title  = %s', (row['title'], ))
            data = {
                'pid': pid,
                'author': row['cls'][1],
                'sort': 100,
                'url': self.domain + row['func'],
                'type': 1 if row['method'] == 'GET' else 2,
                'result': '<pre class="prettyprint lang-js">' + json.dumps(row['result'],indent=4) + '</pre>'
            }
            param = []
            for i in row['param']:
                param.append({'key': i[0], 'value': i[1], 'note': i[2]})

            if row['method'] == 'GET':
                data['get'] = str(json.dumps(param))
            else:
                data['post'] = str(json.dumps(param))

            if act is None:
                data['title'] = row['title']
                data['`return`'] = data['result']
                self.db.insert('xq_cate', data)
            else:
                self.db.update('xq_cate', data, {'id': act['id']})

    def _read(self):
        back = []
        true_back = []
        for files in os.listdir(self.path):
            controller = files[:files.index('Controller')]
            with open(self.path + '/' + files, encoding='utf8') as f:
                content = f.read()
                cls = re.findall(r"(/\*\*.*\nclass.*?\{)", content, flags=re.DOTALL + re.MULTILINE)
                if len(cls) == 0:
                    continue
                cls_info = re.findall(r'\* (.*)\n', cls[0])

                local = [m.start() for m in re.finditer(r"(/\*\*.*?\{)", content, flags=re.DOTALL + re.MULTILINE)]
                if len(local) <= 1:
                    continue
                content = content[local[1]:]

                m = re.findall(r"(/\*\*.*?\{)", content, flags=re.DOTALL + re.MULTILINE)
                for i in m:
                    info = re.findall(r'\* (.*)\n', i)
                    titles = info[0].strip().split(' ')
                    method = info[1].strip().upper()
                    if method != 'POST' and method != 'GET':
                        raise ValueError('Need request method using POST or GET')
                    params = []
                    for p in info[2:]:
                        param = re.split(r'\s+', p.strip())
                        params.append(param)
                    action = re.findall(r'[\s]*(\w*)[\s]*\(', i)
                    if len(action) == 0:
                        continue
                    func = '/' + controller + '/' + action[0]
                    if len(titles) == 1:
                        back.append({'cls': cls_info, 'func': func, 'title': titles[0], 'method': method, 'params': params, })
                    elif len(titles) > 1 and titles[1].lower() == 'true':
                        true_back.append({'cls': cls_info, 'func': func, 'title': titles[0], 'method': method, 'params': params, })

        return back if len(true_back) == 0 else true_back

    def login(self):
        response = requests.post(self.domain + self.login_url, self.login_param)
        try:
            token = json.loads(json.loads(response.text)['content'])['data']['token']
            self.token = token
        except ValueError:
            print(response.text)
            exit()

    def request(self):
        result = self._read()
        back = []
        for row in result:
            print('REQUEST: ' + row['title'] + '  ' + self.domain + row['func'][:-6])
            param = {'token': self.token}
            if len(row['params']) > 0:
                for k in row['params']:
                    param[k[0]] = k[1]
            print('PARAM:  ' + str(param))
            if row['method'] == 'GET':
                response = requests.get(self.domain + row['func'][:-6], {'encrypt_type': 1, 'content': json.dumps(param)})
            else:
                response = requests.post(self.domain + row['func'][:-6], {'encrypt_type': 1, 'content': json.dumps(param)})
            res = ''
            if response.headers['content-type'].find('json') != -1:
                print('STATUS:  ' + 'SUCCESS')
                print('RESPONSE:  ===========>')
                try:
                    res = json.loads(response.text)
                    res['content'] = json.loads(res['content'])
                    print(res)
                except ValueError:
                    print(response.text)
            else:
                filename = os.path.dirname(__file__) + '/error/' + row['func'][1:].replace('/', '_') + '.html'
                print('STATUS:  ' + 'ERROR')
                print('RESPONSE:  ===========> WRITE IN FILE: ' + filename.replace('/', '\\'))
                with open(filename, 'w', encoding='utf8') as f:
                    f.write(response.text)
            print('                           ')
            back.append({'cls': row['cls'], 'title': row['title'], 'method': row['method'], 'func': row['func'], 'param': row['params'],'result': res})
        return back
