# MixtendCodingTest

## Table of Contents
- **[Introduction](#introduction)**
- **[Technologies](#technologies)**
- **[Setup](#setup)**
- **[APIs](#apis)**


## Introduction
Cloud-based backend service that emulates a simple event calendar service. 


## Technologies
- VueJS 2.6
- PHP 8.1
- Laravel 9
- MySQL 8.0


## Setup
To run this project:
1. Clone this project.
2. cd MixtendCodingTest
3. composer run-script first-initialization
5. Rename .env.example to .env
6. docker-compose build
7. docker-compose up
8. docker-compose exec mixtend php artisan migrate
9. docker-compose exec mixtend php artisan db:seed
10. Access localhost:8000

## APIs
Check below the list of endpoints:
* https://documenter.getpostman.com/view/11082955/UVsJv6G6


## Sources
- **[Laravel Documentation](https://laravel.com/docs)**
