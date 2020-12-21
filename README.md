# Introduction
- PHP version: 7.3
- Framework: Codeigniter 3.0.0
- Database : MYSQL using Doctrine ORM Framwork

## Base URL 
docker 실행후 8000번 포트로 설정됩니다.
- http://localhost:8000

## Open Endpoints
* [회원가입](doc/Auth/sign.md) : `POST /api/v1/sign-up`
* [로그인](doc/Auth/login.md) : `POST /api/v1/login`
* [로그아웃](doc/Auth/logout.md) : `POST /api/v1/logout`
* [회원조회](doc/User/info.md) : `GET /api/v1/users/:user_id`
* [회원주문조회](doc/User/order.md) : `GET /api/v1/users/:user_id/orders`
* [전체회원조회](doc/User/all-info.md) : `GET /api/v1/users`

# Response Note
모든 요청에 대한 포맷은 다음과 같습니다. result 필드안에 각 API에서 내려주고자 하는 결과값을 담도록 되어있습니다. API가 정상적으로 웹서버와 통신이 되었을때에는 HTTP_CODE > 200의 값과 return code 1의 값으로 표현합니다. 그 외의 정상적이지 못한 API는 2가지의 경우로 나뉩니다. 이 외의 모든 오류는 아직 정의되지 않은 경우의 케이스입니다.
- 서버와 통신이 실패한 경우 (HTTP CODE 403,500 등과 같은 경우를 말합니다.)

- 서버와 통신은 성공하였지만 ErrorException이 난 경우 다음과 같이 json 필드에 기입합니다.
  - return_code: 음수형태의 코드를 표시합니다.
  - http code: 200으로 표시합니다.
  - desc: 에러에 대한 상세 Exception name 

## Response Example
**Code** : `200 OK`

**Content example**
```json
{
    "result": {
        ...
    },
    "return_code": 1,
    "desc": "",
    "timestamp": 1608564379,
    "http_code": 200
}
```

## Installation
Composer, Docker installation is required

### Usage

##### RUN

```
$ composer install
$ docker-compose up -d
```
