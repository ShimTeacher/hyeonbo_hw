# 단일 회원의 주문 목록 조회 API
특정 유저의 주문정보를 조회하는 API입니다.

**URL** : `/api/v1/users/:user_id/orders`

**Method** : `GET`

**JWT required** : YES

**Header** :
- Authorization(*Required*)

**Parameters** :
- URI PK
  - *user_id* : 조회하고자 하는 user의 id

## Request Example
```shell
curl --location --request GET 'http://localhost:8000/api/v1/users/8/orders' \
--header 'Content-Type: application/json' \
--header 'Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOiIxNCIsInVzZXJfaWQiOiI4IiwiZXhwaXJlZF90aW1lIjoxNjA4NTY5MDE2fQ.XW1f_dSvCkZP4TJOoFvl8f9_afO4GS9UMJ89K2PYPP0' \
--data-raw ''
```

## Success Response
**Code** : `200 OK`

**Content example**
**Field** : 
  - **orderNumber** : (String) 주문번호
  - **name** : (String) 주문 상품명
  - **status** : (String) 주문상태
  - **date** : (String)  주문날짜
  - **timezone** : (String) 주문타임존
    
```json
{
    "result": [
        {
            "orderNumber": "BP1000000000",
            "name": "백예린 5집😀",
            "status": "READY",
            "order_date": {
                "date": "2010-10-10 01:00:03.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "orderNumber": "BP1000000001",
            "name": "백예린 4집😀",
            "status": "WAITING",
            "order_date": {
                "date": "2010-10-11 00:50:00.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "orderNumber": "BP1000000002",
            "name": "백예린 3집😀",
            "status": "DONE",
            "order_date": {
                "date": "2010-10-12 00:30:00.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "orderNumber": "BP1000000003",
            "name": "백예린 싱글😀",
            "status": "READY",
            "order_date": {
                "date": "2010-10-13 00:10:00.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        }
    ],
    "return_code": 1,
    "desc": "",
    "timestamp": 1608568084,
    "http_code": 200
}
```
