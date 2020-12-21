# 로그인

유저가 로그인 하는 API 입니다.

**URL** : `/api/v1/login`

**Method** : `POST`

**JWT required** : NO

**Parameters** : 
  - (String) email (*Required*)
  - (String) password (*Required*)

## Request Example
```shell
curl --location --request POST 'http://localhost:8000/api/v1/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    "email": "hyeonbo@backpackr.com",
    "password": "P@ssw0rdbacpack"
}'
```

## Success Response

**Code** : `200 OK`

**Content example**
**Field** : 
  - **jwt** 
    - (String) 로그인 후 헤더에 사용될 JWT입니다. 
    
```json
{
    "result": {
        "jwt": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxNCIsInVzZXJfaWQiOiI4IiwiZXhwaXJlZF90aW1lIjoxNjA4NTY5MDE2fQ.XW1f_dSvCkZP4TJOoFvl8f9_afO4GS9UMJ89K2PYPP0"
    },
    "return_code": 1,
    "desc": "",
    "timestamp": 1608565416,
    "http_code": 200
}
```
## Error Responses
**Code** : `200 OK` 
```json
{
    "result": [],
    "return_code": 0,
    "desc": "LoginFailedException: email",
    "timestamp": 1608565455,
    "http_code": 200
}
```
