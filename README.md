📚 Book Management System

The Book Management System is a Laravel-based CRUD application designed to manage books, categories, users, and borrow/return records. It is simple, clean, and ideal for learning or small-scale library use.

✨ Features

📖 Book CRUD (Create, Read, Update, Delete)

🏷️ Book Category CRUD

👥 User Management

🔄 Borrow & Return System

📊 Basic overview pages (tables & UI with Bootstrap)

🛠️ Technologies Used

Laravel 12

PHP 8.2

MySQL

XAMPP (Apache + MySQL)

Composer

Bootstrap 5

🚀 Installation & Setup Guide

Follow these steps to run the project on your local machine.

1️⃣ Install XAMPP

Download & install XAMPP (PHP 8.x version).
Start:

Apache

MySQL

2️⃣ Clone or Download the Project
git clone https://github.com/SahanWijerathne00/Book-Management-System---Laravel-CRUD-Application.git
cd book-management

3️⃣ Install Composer Dependencies
composer install


If you see errors, install Composer first:
👉 https://getcomposer.org/download/

4️⃣ Create Environment File
cp .env.example .env


Or manually create .env.

5️⃣ Configure the Database

Open XAMPP → phpMyAdmin and create a new database.

Example:

book_management


Update your .env:

DB_DATABASE=book_management
DB_USERNAME=root
DB_PASSWORD=

6️⃣ Generate App Key
php artisan key:generate

7️⃣ Run Migrations
php artisan migrate

8️⃣ Start the Development Server
php artisan serve


Open the project in your browser:
👉 http://127.0.0.1:8000/
