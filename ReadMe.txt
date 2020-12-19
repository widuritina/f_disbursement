1. You need to import admin.sql and disburse_db.sql into your local database

2. You need to adjust database connection in db_connection.php based on your local database.
   	$dbServer for the ip server of your lcoalhost database;
	$dbUsername for database username ;
	$dbPass for database password ;
	$dbName=your database name;

3. Heres some username/password: shop1/shop1, shop2/shop2 already made.

4. You could run UserInput.php at dir \xampp\htdocs\disbursement_marketplace\ to simply run the program with command prompt (php need to install php before).
   Or you can simply run xampp-control.exe at folder \xampp\, then start the apache and mysql

5. To access the program, you could access http://localhost/disbursement_marketplace/UserInput.php  or http://127.0.0.1/disbursement_marketplace/UserInput.php with your browser

6. To access the database, you could type http://localhost/phpmyadmin/ or simply click admin button at MySQL in your running xampp-control.exe

