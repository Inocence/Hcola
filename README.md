# Hcola
Development framework for back-end developer by python3.6, for example, generate document or add testing data
## Explain
```
action
    add_test_data.py // add test data to mysql
    doc.py // use for generate api document
conf
    common.py // common config
    db.py // mysql config
    plug // plug config
core
    lib
        color.py // terminal color
        mysql.py // mysql connect class
    app.py // start app instance
    factory.py // product object
    home.py // class for store up instance or param
    parse.py // parse console param
plug
    doc
        doc_web // document web project
        error // http response error
        edu_school_doc.py // generate document class
index.py // start instance
```
## Usage
If you wanna add test data to mysql, first, you should create a file, and make a class.
 for example, filename is  **add_test_data.py** , class should be **AddTestData**, finally, you should write a **run()** function in the class. **dev** is mysql envinonment, and you can configure it in **conf/db.py**
```
python index.py add_test_data.py dev
```
If you wanna generate API document, you just run the command. **-r** is use for refresh mysql data which will be use for showing in doc website. if you do not use **-r**, it just request APIs, and never refresh the document data.
```
python index.py doc.py -r
```
## DB
There are two environment, **local** and **dev**, you can extend them.
```
DB_CONFIG = {
    'local': {'host': '127.0.0.1',
              'user': '',
              'password': '',
              'db': '',
              'charset': 'utf8',
              },
    'dev': {'host': '',
            'user': '',
            'password': '',
            'db': '',
            'charset': 'utf8',
            },
```
Pass the config to **Mysql(DB_CONFIG)**, will return db connect.
```
self.db = Mysql(DB_CONFIG)
```
Insert function.
```
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
```
## Plug
The key **edu_school_doc** is plug name, and the frist value **class** is namespace of plug, other paramter are property of plug object.
```
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
```
Standard of plug document that you should follow, espacially, if **true** afer actionname, mean is only request the API, if **false**, do not request the API.
```
/**
 * @class classname
 * @author author
 */
class Example {
    /**
     * @action actionname true|false
     * @method POST
     * @param username jack usename
     * @param password 123456 password
     */
    public function login() {
        //TODO
    }
}