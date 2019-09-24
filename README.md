# SoundCast API CRUD

This project is an API CRUD made with Symfony 4 https://symfony.com/ 

## Installation

You can install the project with Composer or Docker

### Composer
- Clone the repository git clone\
`https://github.com/pixweber/soundcast-api-crud`

- Install dependencies\
`composer install`

- Migrations: creating the database tables/schema\
`php bin/console make:migration` \
`php bin/console doctrine:migrations:migrate`

- Add fake data for (Users, Campagnes, Events)
`php bin/console doctrine:fixtures:load`

### Docker


## Documentation
You can run the project with 

- built-in server\
`php bin/console server:run`

- WAMP / MAMP
Create a virtual host with the root path to ../application/public folder

## Documentation
API should be available at http://localhost:YOURPORT/api

Methods POST, GET, PUT, DELETE are avaible to these entities

API routes:

Campagne\
`GET /api/campagnes Retrieves the collection of Campagne resources.\`\
`POST /api/campagnes Creates a Campagne resource.\`\
`GET /api/campagnes/{id} Retrieves a Campagne resource.`\
`DELETE /api/campagnes/{id} Removes the Campagne resource`.\
`PUT /api/campagnes/{id} Replaces the Campagne resource.`\

Event\
`GET /api/events Retrieves the collection of Event resources.`\
`POST /api/events Creates a Event resource.`\
`GET /api/events/{id} Retrieves a Event resource.`\
`DELETE /api/events/{id} Removes the Event resource.`\
`PUT /api/events/{id} Replaces the Event resource.`

User
`GET /api/users Retrieves the collection of User resources.`\
`POST /api/users Creates a User resource.`\
`GET /api/users/{id} Retrieves a User resource.`\
`DELETE /api/users/{id} Removes the User resource.`\
`PUT /api/users/{id} Replaces the User resource.`\

Report\
`/api/report?group_by=group_by_param`

group_by_param can be : type, ip, country, city, date 

## Demo
Coming soon

