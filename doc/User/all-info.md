# 여러회원 목록 조회 API
여러 회원 목록을 조회하는 API입니다.

**URL** : `/api/v1/users`

**Method** : `GET`

**JWT required** : YES

**Header** :
- Authorization(*Required*)


**Parameters** :
- (String) limit (*Required*)
  - 제한 갯수
- (String) page (*Required*)
  - 요청 페이지
- (String) name (*Optional*)
  - 검색할 이름
- (String) nickname (*Optional*)
  - 검색할 닉네임

## Request Example
```shell
curl --location --request GET 'http://localhost:8000/api/v1/users' \
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
  - **phone** : (String) 사용자의 휴대전화번호
  - **email** : (String)  사용자의 이메일
  - **gender** : (String) 사용자의 성별
  - **order_number** : (String) 최근 주문된 상품의 주문번호
  - **order_date** : (String) 최근 주문된 상품의 주문날짜
  - **status** : (String) 최근 주문된 상품의 주문상태
  - **product_name** : (String) 최근 주문된 상품의 상품명
    
```json
{
    "result": [
        {
            "name": "심*",
            "nickname": "asd",
            "phone": "124***",
            "email": "ads***@naver.com",
            "gender": "male",
            "order_number": "BP1000000004",
            "order_date": "2010-10-14 10:00:00",
            "status": "READY",
            "product_name": "백예린 1집😀"
        },
        {
            "name": "안*",
            "nickname": "연",
            "phone": "010****4949",
            "email": "ads***@naver.com",
            "gender": "female",
            "order_number": "BP1000000005",
            "order_date": "2010-10-13 10:00:00",
            "status": "READY",
            "product_name": "백예린 2집 😀"
        },
        {
            "name": "겸*",
            "nickname": "니",
            "phone": "010****4949",
            "email": "ads***@naver.com",
            "gender": "female",
            "order_number": null,
            "order_date": null,
            "status": null,
            "product_name": null
        },
        {
            "name": "심*보",
            "nickname": "shimteacher",
            "phone": "010****4949",
            "email": "hye***@gmai.com",
            "gender": "male",
            "order_number": null,
            "order_date": null,
            "status": null,
            "product_name": null
        },
        {
            "name": "김*팩",
            "nickname": "backpackr",
            "phone": "010****1234",
            "email": "hye***@backpackr.com",
            "gender": "male",
            "order_number": "BP1000000003",
            "order_date": "2010-10-13 00:10:00",
            "status": "READY",
            "product_name": "백예린 싱글😀"
        }
    ],
    "return_code": 1,
    "desc": "",
    "timestamp": 1608568607,
    "http_code": 200
}
```
