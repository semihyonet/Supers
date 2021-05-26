# Supers

<img src="E:\Programing\Laravel\Supers\logo.png" style="zoom:30%;" />

## Intro



Supers is a backend API made with Laravel and MySQL. Currently you can perform authentication steps, see posts you can donate to and donate.



### How to start the application

You need Composer, PHP:(Latest V ), Laravel:5.5, MySQL. 

To set up the Laravel Repo you have to `composer install`, `composer update` and `composer upgrade` on the repo. 

After that set up a db inside your mysql and enter your creditentials under Supers-backend/.env for the database.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=supers
DB_USERNAME=root
DB_PASSWORD=123
```

Create DB tables by calling `php artisan migrate`

Please populate the DB tables by `php artisan db:seed`



After that you can start the environment by calling `php artisan serve`



## Tables

I've focused most on the design for this app. I couldn't think of ways to demonstrate my idea through a website since it involves an active process over the fields for doing charity work. I've designed multiple steps for the idea to flourish. 10 tables even though I didn't focus on creating routes for them. 



### Users

```php
			$table->increments('id');
            $table->char('name', 50);
            $table->char('email', 50)->unique();
            $table->char('password', 100);
            $table->timestamps();
```



### Places// Posts you can donate to

```php
			$table->bigIncrements('id');
            $table->boolean('is_active');
            $table->char('latitude', 20);
            $table->char('longitude', 20);
            $table->text('description')->nullable();
            $table->enum('type', ['clean','plant','build']);
            $table->bigInteger('area'); // Square meter!
            $table->enum("area_type", ['beach', 'forrest','city', 'lake', 'field','street']);
            $table->integer("goal_money", false, true);
            $table->char('currency', 5);
            $table->integer('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
```



### Donations

```php
            $table->bigIncrements('id');
            $table->integer('user_id', false, true);
            $table->integer('place_id', false, true);
            $table->integer("money", false, true);
            $table->char('currency', 5);
            $table->timestamps();

            
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('user_id')->references('id')->on('users');
```



### Workers

People earn a living for working in the places which got funded. They can Clean, Plant or Build depending on the funds and earn money by the work they perform. 

```php
			$table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('place_id');
            $table->boolean('is_volunteer');
            $table->date('date');
            $table->boolean('is_leader');
            $table->boolean('attended');
            $table->boolean('work_started');
            $table->boolean('work_ended');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('places');
```



### WorkerGroups

People work in groups of two. Which increases the efficency and helps people socialize and have a better time

```php
            $table->bigIncrements('id');
            $table->integer('worker_id');
            $table->integer('partner_id');
            $table->integer('leader_id'); // Person authorized to check on these people
            $table->integer('place_id');

            $table->foreign('worker_id')->references('id')->on('users');
            $table->foreign('partner_id')->references('id')->on('users');
            $table->foreign('leader_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('places');
```



### UserPoints

Users gain points and increase their probability to become a leader on a ~place~ which would also increase the money earned.

```php
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->smallInteger('star', false, true);
            $table->integer('reviewer_id');
            $table->text('message')->nullable();
            $table->integer('place_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('reviewer_id')->references('id')->on('users');
```



### EarnedMoney

Money earned by working on an event.

```php
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('worker_id');
            $table->integer("money", false, true);
            $table->char('currency', 5);
            $table->boolean('is_paid');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('worker_id')->references('id')->on('workers');
```



### PlacePhotos

This table holds the directory of the photos for the events. 

```php
            $table->bigIncrements('id');
            $table->integer('place_id');
            $table->char('directory', 100);
            $table->smallInteger("order", false, true);
            $table->foreign('place_id')->references('id')->on('places');
            $table->timestamps();
```

## Authentication

I built a system depending on the JWT because I wanted my API to be an stateless REST API. Please provide Authorization Header with a Bearer in post and delete requests

## Collection

Here is the Postman API Collection DOCS

