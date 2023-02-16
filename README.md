Group 24 AceMobiles

Seeting up the laravel project.
1) Make sure you have installed xampp first and then composer (https://getcomposer.org/).
2) In xampp start Apache and Mysql than go to phpmyadmin (http://localhost/phpmyadmin/index.php) and create a database. You can name it however you want
2) Inisde the laravel project, duplicate the .env.example file in the same folder and rename one of them to ".env" . Do not just edit the only env.example file as it will delete it from the repo and other people will need it to set everything up
3) Open the .env file and locate "DB_DATABASE= laravel", wipe laravel and add the name of the database you just created. After this you will have the username and password. Unless you edited them then username will be root and the password field will be empty by default
4)Open powershell or cmd then cd to the AceMobile folder
5) Type "composer install" and it should install all the dependencies
6) After that type "php artisan migrate" and it should migrate all the tabels to the database you added
7) To run the website type "php artisan serve" in powershell/cmd and the website should be live. Do not close the powershell/cmd you run this on as it will also close the website..
