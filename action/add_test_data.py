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
            return 'TFxTUzIxAAAFHyAECAUHCc7QAAAlHnYBAAAAhcIrjx/IAPwPtgAJAA8QmwCHAHcPegDpHxcPLwC5ABkPoB8bAS8MIgB9AF8QIQCvANoPZwAwHkkP7QABAeAOkR9AAVcPQwCLAOIQoAA6AHINEQBBHjcIZgAMACgObx+7AO8PgABUAPIQbAD/APMPSQAQHiUL1wCjAEEOiB9kAPwPZwDnAToRvAAmATMPmABWH+oPSAAvAfkPrR9CAUQP4ADuASgUhgAyAPcOkABYHh0MfgDhADkPlR/3AAcMngDBARMTqgB1AAMPtgBvH24PWwBqADUPih8qAVEP9gBwAIgRPwAjAc8P4gAQHkUOlABBADMNbR8+AGcPQAD5AOMQvAATAAAPHAMfEov3rvT6E5aJ7Gl8g759IgwXAuYPKYc9BafvwBrcEWT/3IIog+5v2Z3AAa/vaQRY8cjmq/vvEcP3yBEoCuAKVQGh/3v5fGOcf2N4HQs3BsvotvnTifMLY/W76Gb4fYM+ipL8Y+bXtYbtmdb4EmDpE/lbfZ+DOI+f5reFsgUKTfMe5Bi77FYJaYYc/hgY6Gw2/eL7KPzE8t/1pfva/ecLqB6Uh/qRG+D23xJQWAOp99oJXPEYEMPkDRGd6gj22JETCecNkYLMd7ObVAaRgjYJgAnsMWT+iglnh/5r0ItIj7KSVXefC0IYdIQtAdL9qH4PbouC1QG2/VuC3o/eD+8LjxDh6p54IUoBAvcpdAcFXAFpf2wJAJQAbphlwAoAYQCofsfgUgwAbgBmBWZhWxEAmgB6hwTAx9/AwTWhDAB6AHhhwW/AwMINxdMCZcFieG3BBMUoDkFtEgC5FHqvfvpoR8VLAwDB0gD6EQHqIoNZdAfAxOCBCQDzLYYFwlSSCACKNffAOMH630sPAII2cAfAx+FrwcDBZwbFnz1obsAHAKc5xVNBEwFqPWtcZAfAeRgBPUFgRMMHGAXhTY/Bb8HAmcLFbXHCUsAZAcdXlW/AwmTC/8I6xEDdwcHAUg4BxmCJfcNrfmkKAFVl+EcuTQkAcGm1wMffisEMAHhpNcAq4DlVCQBzbqjAxN7AwVwHAK62AD1VDQCmdoOItXjEGAGueAZVVNwBBmGRwHjCwGIHw0vff118EQCZQH3GZ8F+wMHBbgUJBb6JA0pMwBnEBpGTwP9cwHzCB2LH313B/4sUAHmjhmfDi3vBwIUHiwAfwaQJwigaxAivicPB/oly/1yHb2txBAActVyhCwXtt4n/w/5+ThoEFrecw8H/hrfAxp5xZ2rBBQDkul/fawsAjsb6gf/7If4HALnKBoRCCh+Hy3CEwv9Mw8XfiAMAjsz9OhoEFcyag3R4fkxqiWwJALnPD1c6//sFAAjZnpB4B2rHmWfBwYl8DMWC2ugvwv4vNAzFeuBywsHAi8LCTAUFneT9OAcAwS4P+uH/PgcAwfDSwC7gCwCR+QYwOMD7IAwAcP7t/jr8OeD+/cL+CRBlAhXh/i5XEBCYxozBv57CxMTJxE4DFfACJP8IEKDNF/rhwf0uFBEGz6bH3nv/i8LCjKrBAQ+UEx4iBBBNFXLZxAsQkBkmOPws4fv8/AQQJt9JehcRpx4pKMDZBRW4dH1VAxCE4En5GxGOJZDNw8YQbDlCxQYQvir1L8QKEYwtUP79M/r/4vz9/P39/Tv++OLA/sAbEPP0qWJhxcCCw4DBAcGQ3MekBBBHMv94Aw+jOUb//sA5BBW5R0Y+BBCrgz0j'
        return 'TFFTUzIxAAAFEhAECAUHCc7QAAAlE3YBAAAAhD8uYxLQAAcNhwDDAZYdaQCWAA8PgQCZEn0PqwATAeIPbxIqASICZAD1ASYWNAAsAUgPpgBYEhMP8wCfAFwPTxJLASsN6ADvASEYLQBGATwPaQBmE0cEFABXABkIkxIXAJgNYwAbAIUfaQAIAXgPegC7EhoPZgCEAE0PxhIGASQPUQDiAUwZIQAJAVYPeQAzEzUPXgBFAeADkRJQAWAIYwCJAIwdpQBJAJoPEABBEzUPPwBAAMIPKxI9AH0PYgByAIAdmwCYAJQOcQCSEh8MvgCgAFoMnBJ7AJYPkQD0AUcfpwA8AT0OFwAmE6QPPgBmAE0NYxJQAaQJMwCnAA8figBDAJUPhABREy0P3wBQAGUP0BI3AKEPxIvwh76Abxz+biZT6Im/n++V/m0m+iv3TBXrlor2wAIg2rTtQQLx3akCQA80EWMdLYjmjmuObu9Sg29/tAOICWSZ6IK28NPwmBIU5UsQ1uj2Cs4Us8aHYbZXMwTaAfrpyXvC/j4Lw+RDS2cyJnwa/sKJMGu3emIPyf9PgKLiSCk9KrEDkxJGHGYfwfphA/STgJLQ/SkG/Sf7HNsyOHiGhvL2tAc2F9r54QMmEM+QAJ7L/YqCDXijoTtkNIPGeT4GKHurEvf1gIPhj8OKhZEjhG4NKgTLerLvUAZ+5MYi/Arc7KDf6YJBc0+AjZG7gvJ6hYCse5+ShYcGMEYFMP9jHLb8NAPt8ocIlBFmCxsLEQOWCXIZXan0oGgW5UUEEMcm2QMAecUWxRgBiQAWOkwE/QISmwAT/Vb/yACpEhf+wP/+/7tqDhK/ABw9UsCDCwV5ABP+wMT8BVj6BwFEBfoi/5BEaEPBahYAOQ3FMPpeS11SwGIHxdwIMP7AwEoKAPQWBSr/TP8JACnk/T05wAkAIiz9jv/6XBUAFzb6/QfA+O1EOML9WHjRAEcsAv/9Yv5EBFHH0/59BAA6Qb9dBhJARAnADgBURxZWOcJbjxgAzlL40z3Awvz/TwVk+tDBc8AGAOSSIGfSBgBeW4bBOpIAEmdcD0YVAPBgBlNUwP//WlwE/0AXAWVhF2sExS1mb4YZAAR66e9X++zAwf1VwMGvQvoeAZ1/HMHAlWpXHwEEg+3//jpB+kf+CABjhIm9gAwSYpWGwHzCvBEFeZQMSz7AapZFFRIDlvDALzb9wfhZBwBCmYCABBEFeZoTV///WwfATyoVAEqcA/85wUJRwcBdVP8GxUOaaMF+CQBgs0yQgdEIAGC5g4SwwhUSabkMNVFkOsD70P4ZAAG97QU3+O0z/sD/RWQF/0EbAcK9HHNYOgkF0sMidlb/CsVh25STcJ8SAAEh3vvtNDD/K1jA0QAF49///v9B/Qf6xO3+wMDA/sE6GQUQ+uD/Pv7+O/3EPUNE/0v9EtUmAPYyKv/8wTg7wDodEYYGl5GSBnfGYwkQxgcc/ztF+BgRZwh9wsNWw4QUER4JXsN1wxAnH1aLwREQpsqexdLAwsKTi8EGdwwCrxMiSy/9xhCuBSrABRDXKOzARRcRUSlMpwPV6yk0wRIQYC1AAMLD2snCxsPEqQHGixERZi4e/QTVNSpUiQQQkjRAOvoOAnhejP77/Tn78u74/gQQZzX1rhECpDewwZKCUsKJnv8FEMA4Kzv9xBYRuzk0QgPVqjom/AMQ1kgtOxAVL1m9wP/8/Tj++O7+/P7/+8A='

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

    def edu_user(self):
        self.db.insert_batch('edu_user', [
            {
                'school_name': '石室中学',
                'name': '李小四',
                'user_type': 1,
                'money': 10000,
                'sex': 1,
                'important_people': '李四',
                'important_phone': '18380252957',
                'create_time': self.get_time(),
                'modify_time': self.get_time()
            },
            {
                'school_name': '石室中学',
                'name': '张小五',
                'user_type': 2,
                'money': 2,
                'sex': 2,
                'important_people': '张四',
                'important_phone': '18380252957',
                'create_time': self.get_time(),
                'modify_time': self.get_time()
            }
        ])

        self.db.insert_batch('edu_student', [
            {
                'id': 1,
                'dorm_id': 111,
                'classes': '三年二班',
                'student_no': '1122354',
                'address': '成都都江堰'
            }
        ])

    def edu_teacher(self):
        self.db.insert_batch('edu_teacher', [
            {
                'id': 2,
            }
        ])

    def edu_device_nfc_local(self):
        self.db.insert_batch('edu_device_nfc_local', [
            {
                'user_id': i % 2 + 1,
                'nfc_data': self.get_nfc(i % 2 + 1),
                'create_time': self.get_time(10),
                'modify_time': self.get_time(10)
            } for i in range(1, 5)
        ])

    def edu_device_finger_local(self):
        self.db.insert_batch('edu_device_finger_local', [
            {
                'user_id': i % 2 + 1,
                'finger_type': 'l-' + str(i % 2 + 1),
                'finger_data': self.get_finger(i % 2 + 1),
                'create_time': self.get_time(10),
                'modify_time': self.get_time(10)
            } for i in range(1, 5)
        ])

    def edu_device(self):
        self.db.insert_batch('edu_device', [
            {
                'school_name': '石室中学',
                'device_type': 1,
                'info': 'test1',
                'device_sn': 'A533DB7047C13A33828C71599A8B660D',
                'finger_device_sn': '3832162102095',
                'create_time': self.get_time(),
                'modify_time': self.get_time()
            },
            {
                'school_name': '石室中学',
                'device_type': 1,
                'info': 'test2',
                'device_sn': 'A533DB7047C13A33828C71599A8B660D',
                'finger_device_sn': '3832162101913',
                'create_time': self.get_time(),
                'modify_time': self.get_time()
            },
            {
                'school_name': '石室中学',
                'device_type': 1,
                'info': 'test3',
                'device_sn': 'A533DB7047C13A33828C71599A8B660D',
                'finger_device_sn': '3832162102099',
                'create_time': self.get_time(),
                'modify_time': self.get_time()
            },
            {
                'school_name': '石室中学',
                'device_type': 1,
                'info': 'test3',
                'device_sn': 'A533DB7047C13A33828C71599A8B660D',
                'finger_device_sn': '3832162102098',
                'create_time': self.get_time(),
                'modify_time': self.get_time()
            }
        ])

    def edu_device_version(self):
        self.db.insert_batch('edu_device_version', [
            {
                'id': i,
                'is_need_update_app': 2,
            } for i in range(1, 5)
        ])

    def edu_device_conf_version(self, do=False):
        self.db.insert_batch('edu_device_conf_version', [
            {
                'device_id': 1,
                'version': '1.1.1',
                'version_content': json.dumps({
                                        "is_show_student": 1,
                                        "is_show_balance": 1,
                                        "finger_value": "11111",
                                        "wifi": {
                                            "type": 1,
                                            "username": "jingxian3804",
                                            "password": "jingxian3804"
                                        },
                                        "domain": "api.school.jxjt.me"
                                    }),
                'create_time': 1515637532,
                'modify_time': 1515639090
            }
        ])

    def edu_device_pay_version(self):
        self.db.insert_batch('edu_device_pay_version', [
            {
                'device_id': 1,
                'version': '1515637532',
                'version_content': json.dumps({
                                        "month_times_total": 1000,
                                        "day_times_total": 100,
                                        "offline_day_money_total": 10,
                                        "offline_day_times_total": 10,
                                    }),
                'create_time': 1515637532,
                'modify_time': 1515639090
            }
        ])

    def edu_device_app_version(self, do=False):
        self.db.insert_batch('edu_device_app_version', [
            {
                'device_id': 1,
                'version': '1.1.1',
                'version_content': json.dumps({
                                        "message":"app版本更新",
                                        "url":"http:://www.baidu.com"
                                    }),
                'create_time': 1515637532,
                'modify_time': 1515639090
            }
        ])

    def edu_device_find(self, do=False):
        times = int(time.time())
        self.db.insert_batch('edu_device_find', [
            {
                'device_type': i % 2 + 1,
                'device_sn': 'A533DB7047C13A33828C71599A8B660D',
                'finger_device_sn': '3832162102095',
                'app_version': '1.1.1',
                'create_time': times,
                'modify_time': times
            } for i in range(1, 30)
        ])

    def edu_device_log(self):
        self.db.insert_batch('edu_device_log', [
            {
                'device_id': i % 2 + 1,
                'name': '123456' + str(i) + '.txt',
                'content': 'fweeeeeeeeeeeeeeeeee',
                'create_time': int(time.time())
            } for i in range(1, 30)
        ])



