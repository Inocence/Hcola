# -*- coding:utf-8 -*-
from conf.db import DOC_CONFIG

PLUG = {
    'edu_school_doc': {
        'class': 'plug.doc.edu_school_doc',
        'path': 'D:\phpStudy\WWW\edu_school\Application\Api\Controller',
        'domain': 'http://api.school.jxjt.me',
        'login_url': '/public/login',
        'login_param': {'encrypt_type': 1, 'content': '{"device_type":1,"device_sn":"A533DB7047C13A33828C71599A8B660D","finger_device_sn":"3832162102098","app_version":"1.1.1"}'},
        'manage': ['VersionController.class.php', 'DeviceController.class.php'],
        'db_config': DOC_CONFIG
    }
}
