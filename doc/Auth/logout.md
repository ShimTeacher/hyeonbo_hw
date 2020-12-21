# 로그아웃

유저가 로그아웃 하는 API 입니다.

**URL** : `/api/v1/logout`

**Method** : `POST`

**JWT required** : YES

**Header** :
- Authorization(*Required*)

**Parameters** : 
    - 없음
## Request Example
```shell
curl --location --request POST 'http://localhost:8000/api/v1/logout' \
--header 'Content-Type: application/json' \
--header 'Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxNCIsInVzZXJfaWQiOiI4IiwiZXhwaXJlZF90aW1lIjoxNjA4NTY5MDE2fQ.XW1f_dSvCkZP4TJOoFvl8f9_afO4GS9UMJ89K2PYPP0' \
--data-raw ''
```

## Success Response

**Code** : `200 OK`

**Content example**
**Field** : 
  - **result** 
    - (String) 성공에 대한 결과입니다.
    
```json
{
    "result": {
        "result": "success"
    },
    "return_code": 1,
    "desc": "",
    "timestamp": 1608565637,
    "http_code": 200
}
```
## Error Responses
**Code** : `200 OK` 
```json
{
    "result": [],
    "return_code": -2000,
    "desc": "JWTLogoutExpiredException ",
    "timestamp": 1608566457,
    "http_code": 200
}
```
