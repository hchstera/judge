## judge


Composer Package for Manage Roles and Permissions in Laravel.


### Introduction

* 80% complete
* Version 0.21





### Features


1. Manage Role and Permission in different kinds of User Models (Authcatible Model).
2. Create, Given, Remove, Delete and Check Permission.
3. Create, Given, Remove, Delete and Check Role.


### Links

* [composer package](https://packagist.org/packages/hchs/judge)
* [github](https://github.com/hchstera/judge)

### DEMO

* Notyet     


## How To Use


### Install

1.composer require    

		$ composer require hchs/judge       
2.add Service Provider in config/app.php       

		Hchs\Judge\JudgeServiceProvider::class    
3.run vendor:publish    

		$ php artisan vendor:publish --tag=migrations    
    
		$ php artisan vendor:publish --tag=config    
    
		// optional
		$ php artisan vendor:publish --tag=tests    
4.modify config file config/judge.php     
```php
'models' => [
	'users' => 'App\User',  // set relation and namespace
	'fakeusers' => 'Hchs\Judge\Permission\FakeUser', // only for testing
]    
```     
5.Auth Model extends Judge Abstract Class
```php
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Hchs\Judge\Permission\AuthEloquent as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
	'password', 'remember_token',
    ];
}
```     




