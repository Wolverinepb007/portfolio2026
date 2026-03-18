# Portfolio & Profile CV Website

Welcome to the Portfolio and Profile CV website! This project is a beautifully crafted web application built using the modern **Laravel** PHP framework. It is designed to serve as a personal portfolio to showcase projects, skills, experiences, and a detailed CV.

The application also features a robust backend management panel powered by **Filament**, making it incredibly easy to manage website content dynamically.

---

## 🚀 Features

- **Portfolio Showcase:** Beautifully display your work, skills, and projects.
- **Profile/CV Page:** Elegant presentation of your resume and background.
- **Admin Panel:** Easy-to-use content management system securely handled with Filament PHP.
- **Modern Stack:** Built with Laravel 12, PHP 8.2+, and Vite for fast frontend asset compilation.

---

## 🛠️ Prerequisites

Before you begin installing this project, make sure you have the following installed on your local machine:

1. **[PHP](https://www.php.net/downloads)** (Version 8.2 or higher)
2. **[Composer](https://getcomposer.org/download/)** (PHP Dependency Manager)
3. **[Node.js and npm](https://nodejs.org/)** (Required to compile frontend assets like CSS and JavaScript)
4. A standard Database like **MySQL**, **PostgreSQL**, or simply **SQLite**.

---

## 📦 Installation Guide

If you are a beginner, simply follow these step-by-step instructions to get the project working on your own local device.

### 1. Get the project files
Open your terminal (or Command Prompt/PowerShell) and navigate to where you extracted the project folder:
```bash
cd path/to/portfolio
```

### 2. Install PHP Dependencies
Run Composer to install all the necessary Laravel core files and packages that power the website:
```bash
composer install
```

### 3. Install Frontend Dependencies
Next, install the required JavaScript and CSS tools, then compile them:
```bash
npm install
npm run build
```

### 4. Create your Environment File
Laravel relies on a `.env` file for configuration (like database passwords). You need to copy the provided example file:
```bash
cp .env.example .env
```
*(Windows users: You can just manually copy `.env.example`, paste it in the same folder, and rename the copy to exactly `.env`)*

### 5. Generate the Application Key
Run this command to generate a unique encryption key for the app's security:
```bash
php artisan key:generate
```

### 6. Configure the Database
Open the `.env` file in any code editor (like VS Code or Notepad).
Find the section that starts with `DB_CONNECTION`.

**Option A: Using SQLite (Easiest for testing)**
Change the database connection to `sqlite` and remove the other DB lines so it looks like this:
```env
DB_CONNECTION=sqlite
```
*(Laravel will automatically create the `database.sqlite` file for you when you run migrations).*

**Option B: Using MySQL**
If you have MySQL installed (via XAMPP, MAMP, etc.), create a new database (e.g., `portfolio_db`) in your database manager, then update the `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=your_password  # (Leave blank if you use XAMPP default)
```

### 7. Run Migrations (Create Database Tables)
Construct the required tables in your database by running:
```bash
php artisan migrate
```
*(If it asks if you want to create the database, type `yes` and hit enter).*

If you want to load default test data, run:
```bash
php artisan migrate --seed
```

### 8. Link Storage (For Uploaded Images)
To ensure that images or files uploaded (like CV PDFs or Profile Pictures) display perfectly on the site, run:
```bash
php artisan storage:link
```

### 9. Start the Development Server
You're entirely ready! Start up the website by running:
```bash
php artisan serve
```

---

## 🎉 View the Website

- **Main Website:** Open your browser and go to: `http://localhost:8000`
- **Admin Panel:** Open your browser and go to: `http://localhost:8000/admin`

*(Log in to the admin panel using the administrator credentials created during the setup or seeding process. Once inside, you can add projects, adjust your CV items, and manage site settings!)*
