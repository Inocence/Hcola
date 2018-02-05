# -*- coding:utf-8 -*-
from conf.db import DOC_CONFIG

PLUG = {
    'edu_school_doc': {
        'class': 'plug.doc.edu_school_doc',
        'path': 'D:\phpStudy\WWW\edu_school\Application\Api\Controller',
        'domain': 'http://localhost',
        'login_url': '/public/login',
        'login_param': {'encrypt_type': 1, },
        'manage': ['VersionController.class.php', 'DeviceController.class.php'],
        'db_config': DOC_CONFIG
    }
}
