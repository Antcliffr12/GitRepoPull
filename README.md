# GitRepoPull

Github Most Starred PHP public repos updates when API is changed. The list is through Github API using OOP.

# Used PHP, MySQL, JQuery, and Bootstrap to program and style this application

To get the data I used file_get_contents and looped the data to get it, you can see in files api/create, and api/update.php

api/create takes the create method from items/github and creates the items in the database

api/read takes the read method from items/github and reads from the database to display on index.php

api/update takes the update method which has an ignore incase you need to recreate the database it will not throw an error when the same data is already in the database.

# To make this work

Change database info in config/database.php, load index.php, example (http://locahost/projectName/OOP/) and it will create database, table and insert data on page load. I used xampp with phpmyadmin
