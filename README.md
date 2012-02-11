CakeRsvp
========

CakeRsvp is a CakePHP based application to help manage guests for a event, such
as a wedding. 

Currently I am building this app for my own wedding but am trying to make it 
universal so it can be configurable for others.

Right now this won't be super simple to install, but I am working on it


Installation
============

* Install to a webserver
* Setup a vhost to point to /app/webroot/ as your DocRoot
* Copy the database.php.template file to database.php in the /app/Config folder
* Update the database.php file with your database settings
* Run the /app/config/sql/create.sql on your database

The users table contains admin accounts and logins, however, there isn't an easy
way to create new users. 

The admin interface provides crud features for new people

Needed Features
===============

* Add new admin users
* Import 'invites' from admin UI



