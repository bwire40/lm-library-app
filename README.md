
# 📚 Laravel Library Management System

A simple but functional Library Management System built using **Laravel 12** and **SQLite**. This system supports:

- User enrollment
- Book acquisition
- Book booking/reservation
- Fee handling for late returns


## 🎯 Features

**User Enrollment**
- Register new library members.
- Store and manage member details.

**Book Acquisition**
- Add new books with details like title, author, publication year, ISBN, etc.
- Manage book inventory.

**Booking a Book**
- Users can book/reserve a book.
- Prevent double-booking of the same book.

**Late Return & Fees**
- Track borrowed book with their return dates.
- Automatically calculate and charge late return fees based on the number of overdue days.
## 👩‍💻 Tech Stack

- **Framework:** Laravel 12
- **Database:** SQLite
- **PHP Version:** >= 8.2

## 🏠 Run Locally

Clone the project

```bash
  https://github.com/bwire40/lm-library-app.git
```

Go to the project directory

```bash
  cd lm-library-app
```

Install dependencies

```bash
  composer install
```

Create .env

```bash
  cp .env.example .env
```
Generate application key

```bash
  php artisan key:generate
```


Setup SQLite database

```bash
  touch database/database.sqlite
```

Run migrations

```bash
  php artisan migrate
```

Serve the app
```bash
  php artisan serve
```


## 🧩 Project Structure 
```
app/
├── Models/
│   ├── Acquisition.php
│   ├── Genre.php
│   ├── Book.php
│   ├── BookTitle.php
│   ├── Guest.php
│   ├── User.php
│   ├── ReturnBook.php
│   └── FeeModule.php
├── Http/
│   └── Controllers/
|       ├──Auth├──AuthenticatedSessionController.php
|              ├──ConfirmablePasswordController.php
|              ├──EmailVerificationNotificationController.php
|              ├──EmailVerificationPromptController.php
|              ├──NewPasswordController.php
|              ├──PasswordController.php                
|              ├──PasswordResetLinkController.php
|              ├──RegisteredUserController.php
│              └──VerifyEmailController.php
|       ├── AcquisitionController.php
│       ├── BookController.php
│       ├── Controller.php
│       ├── UserController.php
│       ├── GenreController.php
│       ├── GuestController.php
│       ├── ProfileController.php
│       ├── ReturnBookController.php
│       ├── UserController.php
│       └── HomeController.php
database/
├── migrations/
├── seeders/
routes/
├── web.php
├── console.php
└── auth.php
```
## 📈 Database Schema Overview

| **Table**       | **Description**                                                             |
|-----------------|------------------------------------------------------------------------------|
| `users`         | Stores registered library members.                                           |
| `cache`         | Laravel internal caching table (used for performance optimization).         |
| `genres`        | Stores book genres/categories for classification.                           |
| `books`         | Contains book inventory data including title, author, ISBN, etc.            |
| `acquisitions`  | Stores records of books borrowed (or acquired) by guests, with due dates.   |
| `guests`        | Stores temporary visitors or non-member users.                              |
| `jobs`          | Laravel internal queue jobs table (for asynchronous tasks).                 |





## 🎡 API Endpoints 
| Method | Endpoint                            | Description                      |
|--------|-------------------------------------|----------------------------------|
| GET    | `/register`                         | Show registration form           |
| POST   | `/register`                         | Register a new user              |
| GET    | `/login`                            | Show login form                  |
| POST   | `/login`                            | Authenticate user                |
| GET    | `/forgot-password`                  | Request password reset           |
| POST   | `/forgot-password`                  | Send password reset email        |
| GET    | `/reset-password/{token}`           | Show reset password form         |
| POST   | `/reset-password`                   | Reset user password              |
| GET    | `/verify-email`                     | Show email verification prompt   |
| GET    | `/verify-email/{id}/{hash}`         | Verify user's email              |
| POST   | `/email/verification-notification`  | Resend verification email        |
| GET    | `/confirm-password`                 | Show confirm password form       |
| POST   | `/confirm-password`                 | Confirm user's password          |
| PUT    | `/password`                         | Update user's password           |
| POST   | `/logout`                           | Logout user                      |

## 👥 Authors

- [Allan Ojwang - Github](https://github.com/Allan-Ojwang)
- [Emmanuel Bwire - Github](https://github.com/bwire40)
- [Moses Mmata Kashi - Github](https://github.com/Mmatakashy)


## 📝 License

[MIT](https://choosealicense.com/licenses/mit/)

