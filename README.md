# CUrl
CUrl class for http request

### Get Requests
```
use oangia\CUrl;

$curl = new CUrl();
$response = $curl->connect('GET', 'http://example.com');

echo $response;
```

### Post Request
```
use oangia\CUrl;

$curl = new CUrl();
$curl->json_data();
$curl->json();
$curl->setHeader('Authorization: aa123acfbd5efc');
$data = [
    'name' => 'Nhat'
];
$response = $curl->connect('POST', 'http://nhathuynh.com/api/v1/test', $data);
echo $response;
```

### NCrypt
```
use oangia\NCrypt;

$encryptTxt = NCrypt::encrypt('hello world', 'secret_key_a1c32efbc');
echo NCrypt::decrypt($encryptTxt, 'secret_key_a1c32efbc');
```

# Firebase
```
use oangia\firebase\Firebase;
use oangia\firebase\FireStore;

$fb = new Firebase(['apiKey' => 'AIzaSyDBLyiGjroIhQndhe0T3iac39GalX-z9Lo', 'projectId' => 'myecom-f0a26']);
$firestore = new FireStore($fb);
$response = $firestore->getCollection('users', '123'));
```

### Current version
- v1.1.0
### Push tags
```
git tag -a v1.0.0 -m "v1.0.0"
git push --tags
```

# Larva
### Description
A MVC PHP web development

### Response
```
use oangia\web\Response;

Response::json(['data' => '', 'message' => 'Success'], 200);
```

### Request
```
use oangia\web\Request;

$data = Request::json($required = ['id']);
$id = Request::get('id');
```

## Imgpluz
### Up ảnh
Up ảnh vào thư mục {ROOT_DOCUMENT}/uploads/{path}

File ảnh lớn hơn 300px sẽ generate vào {ROOT_DOCUMENT}/uploads/generate/{generatePath}

File ảnh nhỏ hơn hoặc bằng 300px sẽ generate vào {PUBLIC_DOCUMENT}/uploads/img/{generatePath}

### Push tags
```
git tag -a v1.0.0 -m "v1.0.0"
git push --tags
```

