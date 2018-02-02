# -*- coding:utf-8 -*-
from conf.db import DOC_CONFIG

PLUG = {
    'edu_school_doc': {
        'class': 'plug.doc.edu_school_doc',
        'path': 'D:\phpStudy\WWW\edu_school\Application\Api\Controller',
        'domain': '',
        'login_url': '/public/login',
        'login_param': {},
        'manage': ['VersionController.class.php', ],
        'db_config': DOC_CONFIG
    }
}
