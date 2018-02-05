# -*- coding:utf-8 -*-

from core.lib.mysql import Mysql
from conf.db import EDU_CONFIG
import random

class AddEduData:

    def __init__(self):
        self.db = Mysql(EDU_CONFIG)

    def run(self):
        # self.truncate()
        self.action()

    def table(self):
        result = self.db.query_all('SHOW tables')
        result = [list(i.values())[0] for i in result]
        return result

    def truncate(self):
        result = self.table()
        for i in result:
            print('TRUNCATE TABLE %s' % (i,))
            self.db.execute('TRUNCATE TABLE %s' % (i,))

    def action(self):
        result = self.table()
        action = dir(self)
        for i in action:
            if i in result:
                print('TRUNCATE TABLE %s' % (i,))
                self.db.execute('TRUNCATE TABLE %s' % (i,))
                print('INSERT DATA %s' % i)
                getattr(self, i)()

    '''def edu_machine_find(self):
        self.db.insert_batch('edu_machine_find', [
            {
                'school_id': 2,
                'type': i % 2 + 1,
                'bio_sn': '111111111',
                'create_time': 1516082086,
                'modify_time': 1516082086,
                'app_version': '1112',
                'is_active': 1,
            } for i in range(1, 5)
        ])

    def edu_fund(self):
        self.db.insert_batch('edu_fund', [{
            'name': '资产名' + str(i),
            'number': 'FWE2333',
            'type': '办公',
            'price': 10000,
            'num': 100,
            'manager': '张三',
            'place': '成都市',
            'input_time': 1516082086,
            'modify_time': 1516082086,
            'create_time': 1516082086,
        } for i in range(1, 100)]
                             )

    def edu_pay_conf(self):
        self.db.insert_batch('edu_pay_conf', [{
            'school_id': 2,
            'conf_content': '{"month_times_total":"100","day_times_total":"2","offline_day_money_total":"10","offline_day_times_total":"2"}',
            'create_time': 1516082086
        } for i in range(1, 100)]
                             )

    def edu_device_log(self):
        self.db.insert_batch('edu_device_log', [{
            'device_id': i,
            'name': '2018-01-' + str(i) + '.txt',
            'content': '{"month_times_total":"100","day_times_total":"2","offline_day_money_total":"10","offline_day_times_total":"2"}',
            'create_time': 1516082086
        } for i in range(1, 100)]
        )'''

    def edu_device_version(self):
        self.db.insert_batch('edu_device_version', [{
            'school_id': 2,
            'app_version': '1.1.' + str(i),
            'type': i % 2 + 1,
            'username': '张三',
            'url': 'http://www.baidu.com',
            'info': '测试版本' + str(i),
            'file_size': random.randrange(100, 999999),
            'status': i % 2 + 1,
            'create_time': 1516082086
        } for i in range(1, 10)]
        )
