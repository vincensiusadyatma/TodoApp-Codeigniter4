# TODO APP WITH CODEIGNITER 4

## Installation

USE `composer update` whenever
there is a new release of the framework for first time use this app.


## Setup
- clone this repository on your local folder
- Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.
- Make database`tododb`
  - # todolist table
    - id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    - user_id INT(11) UNSIGNED NOT NULL,
    - kegiatan VARCHAR(100) NOT NULL,
    - status VARCHAR(10) NOT NULL,
    - PRIMARY KEY (id),
    - FOREIGN KEY (user_id) REFERENCES users(id)
  - # users table
    - id INT(11) NOT NULL AUTO_INCREMENT,
    - username VARCHAR(10) NOT NULL,
    - email VARCHAR(100) NOT NULL,
    - password VARCHAR(255) NOT NULL,
    - PRIMARY KEY (id)
      
- Run `php spark serve` on your terminal

