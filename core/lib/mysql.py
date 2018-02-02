# -*- coding:utf-8 -*-

import pymysql.cursors
from core.home import Home


class Mysql:

    def __init__(self, conf, is_debug=False):
        self.conf = conf
        self.is_debug = is_debug
        self.conn = self.connect()
        self.db = self.conn.cursor()

    def connect(self):
        return pymysql.connect(**self.conf[Home.app.env], cursorclass=pymysql.cursors.DictCursor)

    def query_all(self, sql, value=None):
        self.execute(sql, value)
        return self.db.fetchall()

    def query_one(self, sql, value=None):
        self.execute(sql, value)
        return self.db.fetchone()

    def execute(self, sql, value=None):
        if self.is_debug:
            print(sql)
        self.sql = sql
        self.db.execute(sql, value)
        self.conn.commit()

    def insert(self, table, data):
        sql = 'INSERT INTO %s(%s) VALUES(%s)' % (table, ','.join(data.keys()), ('%s,' * len(data))[:-1], )
        self.execute(sql, tuple(data.values()))
        return self.db.lastrowid

    def insert_batch(self, table, data, truncate=True):
        if truncate:
            print('TRUNCATE TABLE %s' % (table,))
            self.db.execute('TRUNCATE TABLE %s' % (table,))

        values = []
        string = []
        for i in data:
            values.extend(list(i.values()))
            string.append('(%s)' % ('%s,' * len(i))[:-1], )

        sql = 'INSERT INTO %s(%s) VALUES%s' % (table, ','.join(list(data[0].keys())), ','.join(string), )
        self.execute(sql, values)

    def update(self, table, data, where):
        values = []
        wheres = []
        inserts = []
        for i in data.keys():
            values.append('%s = %%s' % (i, ))
            inserts.append(data[i])
        for i in where.keys():
            wheres.append('%s = %%s' % (i, ))
            inserts.append(where[i])

        sql = 'UPDATE %s SET %s WHERE %s' % (table, ','.join(values), 'and'.join(wheres), )
        self.execute(sql, inserts)
