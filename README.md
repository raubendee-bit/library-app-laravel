# 📚 Library Management System

A simple Laravel application for managing a library's book collection and borrowing system. This application demonstrates the **MVC (Model-View-Controller)** architecture pattern in Laravel using a serverless **SQLite** database.

---

## 👥 Team Members
* **Delicano, Rovin**
* **Herman, Angel Mae**
* **Olmedo, Jirah**
* **Prado, Jhona Mae**
* **Sudayon, Karyl Ann**

---

## ✨ Features

### 📖 Book Management
* **Insert Books:** Add new titles and authors to the collection.
* **Photo Uploads:** Attach cover images to books (stored via Laravel Storage).
* **Book Lookup:** View all books in a responsive table.
* **Status Tracking:** Real-time "Available" or "Borrowed" indicators.

### 🔄 Borrowing System
* **Borrow Books:** One-click action to mark a book as unavailable.
* **Return Books:** Flip the status back to available when a book is returned.
* **No Auth:** Designed for quick, open access in a laboratory environment.

---

## 🏗️ MVC Structure

### Models
* **Book** (`app/Models/Book.php`): Manages the database schema for titles, authors, status, and photo paths.

### Controllers
* **BookController** (`app/Http/Controllers/BookController.php`): 
    * `index()`: Displays the book list.
    * `store()`: Handles validation and file upload logic.
    * `borrow()` / `returnBook()`: Manages the boolean state of book availability.

### Views
* **Books** (`resources/views/books.blade.php`): A single-page dashboard styled with **Tailwind CSS**.

---

###🚀 Installation & Setup
Clone the Repository

Bash
git clone https://github.com/raubendee-bit/library-app-laravel.git
cd library-app-laravel
Install Dependencies

Bash
composer install
Configure Environment

Bash
cp .env.example .env
php artisan key:generate
Configure Database (SQLite)
Open the .env file and update these lines to use SQLite:

Plaintext
DB_CONNECTION=sqlite
# Remove or comment out DB_HOST, DB_PORT, DB_DATABASE, etc.
Create the Database File

Windows (PowerShell):

PowerShell
New-Item -ItemType File -Path database/database.sqlite
Mac/Linux/Git Bash:

Bash
touch database/database.sqlite
Run Migrations

Bash
php artisan migrate
Link Storage (Important for Photos)
Since this app handles book cover uploads, you must link the storage folder:

Bash
php artisan storage:link
Start Development Server

Bash
php artisan serve
Visit Application
Open your browser and go to: http://localhost:8000

## Database Schema
    🛠️ Technologies Used
    Laravel 11.x

    PHP 8.2+

    SQLite

    Tailwind CSS

    📝 License
    This is an educational project for learning Laravel MVC.
