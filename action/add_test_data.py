# -*- coding:utf-8 -*-

from core.lib.mysql import Mysql
from conf.db import DB_CONFIG
import json
import time
import inspect

class AddTestData:

    def __init__(self):
        self.db = Mysql(DB_CONFIG)

    @staticmethod
    def get_time(num=0):
        return int(time.time()) + num

    @staticmethod
    def get_nfc(ty):
        if ty == 1:
            return '53315d7b'
        return '80d90ba8'

    @staticmethod
    def get_finger(ty):
        if ty == 1:
            return '121'
        return '1212212'

    def run(self):
        #self.truncate()
        self.action()

    def table(self):
        result = self.db.query_all('SHOW tables')
        result = [list(i.values())[0] for i in result]
        return result

    def truncate(self):
        result = self.table()
        for i in result:
            print('TRUNCATE TABLE %s' % (i, ))
            self.db.execute('TRUNCATE TABLE %s' % (i, ))

    def action(self):
        result = self.table()
        action = dir(self)
        for i in action:

            if i in result:
                act = getattr(self, i)
                is_do = inspect.signature(act)
                if 'do' not in is_do.parameters:
                    print('INSERT DATA %s' % i)
                    getattr(self, i)()

    def test(self):
        self.db.insert('test', {'username': 'jack', 'info': 'testing'})