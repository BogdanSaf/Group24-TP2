<p align="center">
    <img width="500" src="https://user-images.githubusercontent.com/115074233/228799015-28a2f64c-4a0e-4063-8104-ffa7f3a95883.jpg" alt="Ace Mobiles">
</p>

<h1 align="center">
<h1>Welcome to ACE MOBILES</h1>
</p>

<h3> Contributors </h3>

Bogdan Saftiuc (BogdanSaf)
Samirul Islam (samirul2)

<h3> Who are we?</h3>

Since 2005, we have been helping to give customers a wide range of high quality mobile products.
Our company started as a humble little shop in Birmingham offering phone repairs to passers-by.
Since then, our company has expanded to over 200 stores across the UK as well as the website you are in right now!

<h3>How to run the project </h3>

<h4>Laravel</h4>

The Laravel part will contain the main website that will be accessed by the users and employees. Here they can register, log in, browse and purchase items.

Here is how to set it up on your local machine:

1) Make sure you have installed xampp first and then composer (https://getcomposer.org/).
2) In xampp start Apache and Mysql than go to phpmyadmin (http://localhost/phpmyadmin/index.php) and create a database. You can name it however you want
2) Inisde the laravel project, edit the .env.example file in the and rename it to ".env"
3) Open the .env file and locate "DB_DATABASE= laravel", wipe laravel and add the name of the database you just created. After this you will have the username and password. Unless you edited them, username will be root and the password field will be empty by default
4)Open powershell or cmd if you are on Windows or the Terminal on MacOS/Linux then cd to the AceMobile folder
5) Type "composer install" and it should install all the dependencies
6) After that type php artisan key:generate to generate a new key
7) Now type "php artisan migrate" and it should migrate all the tabels to the database you added (tables are empty by default. You will need to insert entries manually)
8) To run the website type "php artisan serve" in powershell/cmd  or the Terminal and the website should be live on your local machine. Do not close the powershell/cmd/terminal while you run this as it will also close the website..

Well done! The website should now be running on your local machine!

<h4>JavaApp</h4>

The JavaApp will contain the admin website where an admin can edit and add different things such as the users,products,orders and employees and also be able to check analytics of the business such as sold products and stock levels.

Here is how to set it up on your local machine. Make sure that you first did the steps for the laravel project as it requires the database you just created and the migrated tables

1)Open the JavaApp folder with the IDE of you preference. I recommend something like IntelliJ Idea or Eclipse
2)Open application.properties inside JavaApp/AceMobiles/src/main/resources
3)Locate spring.datasource.url=jdbc:mysql://localhost:3306/ and add to it the name of the database you just created for laravel for example "spring.datasource.url=jdbc:mysql://localhost:3306/database"
4)Now locate spring.datasource.username and spring.datasource.password and add the same cridentials you did in laravel
5)In the database you have created locate the admin table and add an entry for it. The password must be encrypted using Bcrypt (tool that can help https://bcrypt-generator.com/)
5)Now Run the file AceMobilesApplication.java inside JavaApp/AceMobiles/src/main/java/Group24/AceMobiles.
6)A login page will show up. For Username it's the email of the of the admin you created and password is the password before encryption

Well done! The Admin Website should now be working too. Here you are able to edit,delete and add new users,products,employess and the ability to check or edit orders. The changes will be reflected on the main website (Laravel)
