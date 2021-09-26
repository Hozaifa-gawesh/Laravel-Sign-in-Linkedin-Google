# Code Challenge
Small laravel app to sign-up by Linked-in or Google.

## Installation
1) Clone Repo
2) Make an `.evn` file
3) Set config DB in `.env` file
4) Run command `composer update`
5) Run command `php artisan key:generate`
6) Run command `php artisan migrate`
7) Run command `php artisan db:seed`
8) Set a Linkedin configuration `LINKEDIN_CLIENT_ID`, `LINKEDIN_CLIENT_SECRET`, `LINKEDIN_REDIRECT` in env file
9) Set a Google configuration `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, `GOOGLE_REDIRECT` in env file
10) Run command `php artisan cache:clear` and `php artisan config:cach`


## Access Front-End
1) domain.com/public/


## Access Dashboard
1) domain.com/public/dashboard
2) Email: test@test.com
3) Password: 123456
