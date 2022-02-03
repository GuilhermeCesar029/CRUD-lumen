## 🚀 Install

```
$ git clone https://github.com/GuilhermeCesar029/multipedidos.git
$ cd multipedidos/api
$ composer install
```

## 🖱️ Usage

```
$ cp .env.example .env
```
```
Create a database with the name of multipedidos 
```

## ⚙️ Configure your database in **.env**

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multipedidos
DB_USERNAME=root
DB_PASSWORD=
```

```
$ php artisan migrate --seed
```

## 📈 Run app

```
$ php -S localhost:8000 -t public
```

Check app in http://localhost:8000/
