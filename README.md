## Task Description
Write a RESTful web service that ingests JSON files, parses them, and stores them in a
normalized database. The following endpoints are expected.
1. An endpoint to which a user can upload a .json file.
2. An endpoint in which a user can view all menu items.
3. An endpoint in which a user can view a menu item.
4. An endpoint in which a user can delete a menu item.

Normally we would give a developer more room regarding framework choices, but due to the
nature of this test, you must make use of Laravel Lumen 8.
The file upload endpoint should only accept a .json file, with the following structure:
`{
"MenuItems": [
{
"ItemName": <string>,
"ItemDescription": <string>,
"Price": <float>,
"ItemOptions": [
{
"Name": <string>,
"MaxQty": <int>,
"Price": <float>
}
]
}
]
}`

## Desirable Output
1. A working solution.
2. Code quality (organization, modularity, modeling, testing, .etc).
3. Your ability to follow instructions.
4. Well documented code.
5. Clearly defined models.
6. RESTful design.
## Development Stack
- PHP Lumen (Micro-Framework By Lumen).
- Programing language PHP 8.1
- Mysql database

## Installation

### Step 1.
- Begin by cloning this repository to your machine
```
git clone `repo url` 
```

- Install dependencies
```
composer install
```
- Create environmental file and variables
```
cp .env.example .env
```

### Step 2
- Next, create a new database and reference its name and username/password in the project's .env file.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=your_password
```
- Run migration
```
php artisan migrate or php artisan migrate:fresh
```
### Step 3
- before start, you need to run table seeders
```
php artisan db:seed
```
### Step 4
- To start the server, run the command below
```
php -S localhost:8000 -t public or php -S 127.0.0.1:8000 -t public
```
## Application Route
```
http://127.0.0.1:8000/api/v1/       
```
## Author
- ibrahim khalaf
