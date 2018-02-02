# -*- coding:utf-8 -*-

import importlib
import sys
from core.home import Home


class App:

    def __init__(self):
        self.action = sys.argv[1]
        self.env = sys.argv[2] if len(sys.argv) > 2 and sys.argv[2] == 'dev' else 'local'
        Home.app = self

    def run(self):
        obj = importlib.import_module('action.' + self.action)
        cls = getattr(obj, ''.join(string.capitalize() for string in self.action.split('_')))
        getattr(cls(), 'run')()

