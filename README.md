## Prerequisites

- PHP (Minimum Version 8.0)
- [Composer](https://getcomposer.org/download/) 
- [Docker](https://www.docker.com/products/docker-desktop/).

## Info 
    - Host set localhost|127.0.0.1 & Port 8000 (localhost:8000)
    - After registration welcome email manage via queue and auto queue command work
    - After successfull registration welcome mail send to user mail via GMAIL API
    
## Installation
 - Download or Git clone this repo
 - Run Command "composer update" (For vendor packages)
 - Run docker compose up --build (Thats all)
    
## Possible Errors
   - When run docker compose up --build then MAY be auto migration problem occur
   - run docker compose up --build (If face problem) 

## Postgresql Database
  - For postgresql GUI package added (dpage/pgadmin4) in docker compose file
  - Access postgresql gui via localhost:5050
 ```dotenv
   PGADMIN_DEFAULT_EMAIL: admin@example.com
   PGADMIN_DEFAULT_PASSWORD: admin
 ```
  - Others postgresql software like TABLEPLUS also good solutions
  - Postgresql DB credentials
```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=db
    DB_PORT=5432
    DB_DATABASE=gigalogytask
    DB_USERNAME=admin
    DB_PASSWORD=admin
```
## API Endpoint
  - http://localhost:8000/api/register (POST Request)      
```json
{
    "name": "John",
    "email": "john@gmail.com",
    "password": "12345678",
    "password_confirmation": "12345678"
}
```
## ANY QUERY
 - shahnaouzrazu21@gmail.com
