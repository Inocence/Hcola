# -*- coding:utf-8 -*-
import importlib


class Factory:

    @staticmethod
    def product(config):
        mod = importlib.import_module(config['class'])
        obj = getattr(mod, ''.join(string.capitalize() for string in config['class'].split('.')[-1].split('_')))()
        del config['class']
        for (k, v) in config.items():
            setattr(obj, k, v)
        return obj
