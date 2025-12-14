# ZeroMVC - Custom PHP Framework

ZeroMVC is a lightweight, custom-built PHP MVC (Model-View-Controller) framework designed to demonstrate the core principles of modern web architecture. It was built entirely from scratch without relying on existing frameworks like Laravel or CodeIgniter.

## 🚀 Features

* **MVC Architecture:** Clean separation of concerns (Models, Views, Controllers).
* **Custom Router:** Regex-based routing engine handling GET and POST requests.
* **Database Layer:** Secure PDO wrapper with SQL injection protection.
* **Authentication:** Complete Login, Registration, and Logout system with password hashing (`bcrypt`).
* **Route Protection:** Middleware implementation using Constructor Guards.
* **CRUD Operations:** Create, Read, Update, and Delete users.
* **File Uploads:** Profile picture upload and handling.

## 🛠️ Installation

Follow these steps to set up the project locally.

### 1. Clone the repository
```bash
git clone [https://github.com/rakibuddinchowdhury/ZeroMVC.git](https://github.com/rakibuddinchowdhury/ZeroMVC.git)
cd ZeroMVC

2. Install Dependencies
composer install

3. Database Setup
Create a MySQL database named e.g "zeromvc_db"

4. Run the Application
php -S localhost:8000 -t public
