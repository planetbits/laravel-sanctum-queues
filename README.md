# **Laravel API Authentication & Job Queues**  

## **Overview**  
This repository covers:  
- **API authentication** using **Laravel Sanctum** (Token-based)  
- **Job queues** for handling background tasks efficiently  

## **1. API Authentication with Laravel Sanctum**  
- Install Sanctum:  
  ```bash
  composer require laravel/sanctum
  php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
  php artisan migrate
  ```
- Protect API routes:  
  ```php
  Route::middleware('auth:sanctum')->group(function () {
      Route::get('/user', fn(Request $request) => $request->user());
  });
  ```

## **2. Job Queues in Laravel**  
- Set up queues:  
  ```bash
  QUEUE_CONNECTION=database  
  php artisan queue:table  
  php artisan migrate  
  php artisan queue:work  
  ```
- Create & dispatch a job:  
  ```php
  php artisan make:job SendEmail  
  SendEmail::dispatch()->onQueue('high_priority');  
  ```
- Check pending jobs:  
  ```php
  Route::get('/queue/status', fn() => response()->json(DB::table('jobs')->get()));
  ```

## **License**  
Licensed under **GPL v3** (No commercial use).  

## **More Info & References**  
- Full guide on **[Laravel Sanctum](#)**  
- Full guide on **[Laravel Job Queues](#)**  
- Laravel Docs: [Sanctum](https://laravel.com/docs/sanctum) | [Queues](https://laravel.com/docs/queues)  

## **Share Your Experience**  
Tried this in your project? Share your feedback! 🚀

