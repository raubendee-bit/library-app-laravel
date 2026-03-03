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

## Installation

1. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Configure Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure Database**
   
   Edit `.env` file and set your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=library_app
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Run Migrations**
   ```bash
   php artisan migrate
   ```

5. **Seed Database (Optional)**
   
   Add sample books to get started:
   ```bash
   php artisan db:seed
   ```

6. **Start Development Server**
   ```bash
   php artisan serve
   ```

7. **Visit Application**
   
   Open your browser and go to: `http://localhost:8000`

## Database Schema
    🛠️ Technologies Used
    Laravel 11.x

    PHP 8.2+

    SQLite

    Tailwind CSS

    📝 License
    This is an educational project for learning Laravel MVC.