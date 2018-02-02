# -*- coding:utf-8 -*-
from conf.plug import PLUG
from core.factory import Factory
from core.parse import Parse


class Doc:

    def run(self):
        parse = Parse.get()
        document = Factory.product(PLUG['edu_school_doc'])
        if '-r' in parse:
            document.refresh()
        else:
            document.test()

