---
title: API Reference

language_tabs:
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://black.loc/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_97706d28f14d0a8cf5c04d5ec5479575 -->
## api/arendators
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'http://black.loc/api/arendators',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'user[contact_phone]'=> 'quam',
            'user[company_name]'=> 'placeat',
            'user[address]'=> 'necessitatibus',
            'user[email]'=> 'maxime',
            'user[city]'=> 'magnam',
            'arendator[type]'=> 'commodi',
            'arendator[first_name]'=> 'et',
            'arendator[birth_date]'=> 'laborum',
            'arendator[register]'=> 'et',
            'arendator[address]'=> 'sit',
            'arendator[inn]'=> 'molestiae',
            'arendator[company_name]'=> 'aut',
            'arendator[last_name]'=> 'quia',
            'arendator[patronymic]'=> 'officiis',
            'arendator[contact_phone]'=> 'ab',
            'arendator[city]'=> 'dolores',
            'arendator[region]'=> 'alias',
            'arendator[passport_number]'=> 'ipsam',
            'arendator[passport_serial]'=> 'qui',
            'violations[description]'=> 'omnis',
            'violations[status]'=> 'maiores',
            'violations[date]'=> 'nihil',
            'violations[document]'=> 'qui',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "msg": "Success"
}
```

### HTTP Request
`POST api/arendators`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `user.contact_phone` |  required  | 
    `user.company_name` |  required  | 
    `user.address` |  required  | 
    `user.email` |  required  | 
    `user.city` |  optional  | equired
    `arendator.type` |  required  | 1 or 2
    `arendator.first_name` |  required  | 
    `arendator.birth_date` |  required  | if   arendator.type = 1
    `arendator.register` |  required  | if   arendator.type = 1
    `arendator.address` |  required  | if   arendator.type = 2
    `arendator.inn` |  required  | if   arendator.type = 2
    `arendator.company_name` |  required  | if   arendator.type = 2
    `arendator.last_name` |  required  | 
    `arendator.patronymic` |  required  | 
    `arendator.contact_phone` |  required  | 
    `arendator.city` |  required  | 
    `arendator.region` |  required  | 
    `arendator.passport_number` |  required  | 
    `arendator.passport_serial` |  required  | 
    `violations.description` |  required  | 
    `violations.status` |  required  | 0 or 1
    `violations.date` |  required  | date like 2020-04-15
    `violations.document` |  optional  | optional base_64 string

<!-- END_97706d28f14d0a8cf5c04d5ec5479575 -->

<!-- START_0edbb0df171b5a423ddb7fd4fc5f05be -->
## api/arendators
> Example request:

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://black.loc/api/arendators',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer {token}',
        ],
        'query' => [
            'type'=> 'ex',
            'passport_serial'=> 'optio',
            'passport_number'=> 'vero',
            'inn'=> 'corrupti',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "data": {
        "id": 205,
        "first_name": "api",
        "last_name": "api",
        "patronymic": "api",
        "passport_serial": "api",
        "passport_number": "123",
        "phone": "api",
        "region": "api",
        "city": "api",
        "date": "2020-04-22",
        "violetions": [
            {
                "id": 483,
                "status": 1,
                "date": "2020-04-03",
                "description": "asdasdasd",
                "user": {
                    "id": 63,
                    "email": "individual-entrepreneur@gmail.com",
                    "country": "Armenia",
                    "city": "Yerevan",
                    "address": "Kievyan 8",
                    "phone": "123123",
                    "type": 4,
                    "inn": "123",
                    "company_name": "Map",
                    "contact_person_full_name": "Aram Arami Aramyan",
                    "contact_person_position": "Boss"
                }
            },
            {
                "id": 482,
                "status": 1,
                "date": "2020-04-15",
                "description": "asd",
                "user": {
                    "id": 95,
                    "email": "client_id_25_time_1587566017@api.com",
                    "country": null,
                    "city": "api",
                    "address": "api",
                    "phone": "api",
                    "type": 5,
                    "full_name": "api"
                }
            }
        ],
        "user": {
            "id": 95,
            "email": "client_id_25_time_1587566017@api.com",
            "country": null,
            "city": "api",
            "address": "api",
            "phone": "api",
            "type": 5,
            "full_name": "api"
        },
        "register": "api",
        "birth_date": "2020-04-15"
    }
}
```

### HTTP Request
`GET api/arendators`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `type` |  required  | passport or inn
    `passport_serial` |  optional  | if type equal passport required
    `passport_number` |  optional  | if type equal passport required
    `inn` |  optional  | if type equal inn required

<!-- END_0edbb0df171b5a423ddb7fd4fc5f05be -->


