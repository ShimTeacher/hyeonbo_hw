# 단일회원 상세조회 API
특정 유저의 정보를 조회하는 API입니다.

**URL** : `/api/v1/users/:user_id`

**Method** : `GET`

**JWT required** : YES

**Header** :
- Authorization(*Required*)

**Parameters** :
- URI PK
  - *user_id* : 조회하고자 하는 user의 id

## Request Example
```shell
curl --location --request GET 'http://localhost:8000/api/v1/users/8' \
--header 'Content-Type: application/json' \
--header 'Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxNCIsInVzZXJfaWQiOiI4IiwiZXhwaXJlZF90aW1lIjoxNjA4NTY5MDE2fQ.XW1f_dSvCkZP4TJOoFvl8f9_afO4GS9UMJ89K2PYPP0' \
--data-raw ''
```

## Success Response

**Code** : `200 OK`

**Content example**
**Field** : 
  - **name** : (String) 사용자의 이름
  - **nickname** : (String) 사용자의 닉네임
  - **email** : (String) 사용자의 이메일
  - **phone** : (String)  사용자의 휴대전화번호
  - **gender** : (String) 사용자의 성별
    
```json
{
    "result": {
        "name": "김*팩",
        "nickname": "backpackr",
        "email": "hye***@backpackr.com",
        "phone": "010****1234",
        "gender": "male"
    },
    "return_code": 1,
    "desc": "",
    "timestamp": 1608567540,
    "http_code": 200
}
```
