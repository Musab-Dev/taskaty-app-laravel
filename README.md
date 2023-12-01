# Taskaty - Tasks Management System

Taskaty is a simple tasks management system built using Laravel and Tailwind CSS. It allows users to add, edit, delete tasks, as well as mark them as completed.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

## Features

- **Task Management:** Add, edit, delete tasks effortlessly.
- **Task Completion:** Mark tasks as completed to keep track of your progress.

## Requirements

- PHP 7.4 or higher
- Composer
- Node.js and npm (for compiling assets)
- MySQL or any other database supported by Laravel

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Musab-Dev/taskaty-app-laravel.git
    ```

2. Change into the project directory:

    ```bash
    cd TaskatyApp
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install
    ```

5. Copy the `.env.example` file to `.env` and configure your database connection:

    ```bash
    cp .env.example .env
    ```

6. Generate an application key:

    ```bash
    php artisan key:generate
    ```

7. Run database migrations:

    ```bash
    php artisan migrate
    ```

8. Compile assets:

    ```bash
    npm run dev
    ```

9. Serve the application:

    ```bash
    php artisan serve
    ```

Visit [http://localhost:8000](http://localhost:8000) in your browser to use Taskaty.

## Usage

1. Open the Taskaty application in your web browser.
2. Start managing your tasks by adding, editing, or deleting them.
3. Mark tasks as completed to keep track of your progress.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
