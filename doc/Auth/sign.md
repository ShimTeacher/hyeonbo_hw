# 회원가입

유저가 회원가입을 하는 API 입니다.

**URL** : `/api/v1/sign-up`

**Method** : `POST`

**JWT required** : NO

**Parameters** : 
- (String) name (*Required*) 
  - 한글, 영문 대소문자만 허용됩니다.
- (String) nickname (*Required*)
  - 영문 소문자만 허용됩니다.
- (String) password (*Required*)
  - 영문 대문자, 영문 소문자, 특수 문자, 숫자 각 1개 이상씩 포함되어야 합니다.
- (String) phone_number (*Required*)
  - 숫자만 허용됩니다.
- (String) email (*Required*)
  - 유저를 구분하는 유니크 아이디로 쓰입니다.
- (String) gender (*Optional*)
  - male, female 만 허용됩니다.

## Request Example
```shell
curl --location --request POST 'http://localhost:8000/api/v1/sign-up' \
--header 'Content-Type: application/json' \
--data-raw '{
    "name": "김백팩",
    "nickname": "backpackr",
    "password": "P@ssw0rdbacpack",
    "phone_number": "01012341234",
    "email": "hyeonbo@backpackr.com",
    "gender": "male"
}'
```

## Success Response

**Code** : `200 OK`

**Content example**
**Field** : 
  - **name** : (String) 사용자의 이름
  - **email** : (String) 사용자의 이메일
```json
{
    "result": {
        "name": "김*팩",
        "email": "hye***@backpackr.com"
    },
    "return_code": 1,
    "desc": "회원가입이 완료되었습니다.",
    "timestamp": 1608564379,
    "http_code": 200
}
```
## Error Responses
**Code** : `200 OK` 
```json
{
    "result": [],
    "return_code": -9000,
    "desc": "AccountAlreadyExistsException",
    "timestamp": 1608564629,
    "http_code": 200
}
```
