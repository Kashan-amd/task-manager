# Task Manager Application

This is a web-based task management application developed using Laravel, Livewire, and Tailwind CSS. The application allows users to create, manage, and organize their tasks into groups. It offers features such as task grouping, scheduling, and user authentication.

## Table of Contents

- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)

## Features

- **User Authentication:** Secure user authentication and authorization system to protect user data.
- **Task Creation:** Users can create tasks with details such as name, description, due date, and priority.
- **Task Groups:** Tasks can be grouped into categories (e.g., work, personal, shopping) for better organization.
- **Scheduled Tasks:** Schedule tasks to recur daily, weekly, or monthly.
- **Task List:** View and manage tasks in an organized list format.
- **Task Status:** Mark tasks as completed or pending.
- **Responsive Design:** The application is responsive and works on various devices and screen sizes.

## Getting Started

Follow these instructions to set up and run the application on your local machine.

### Prerequisites

Before you begin, make sure you have the following installed:

- [PHP](https://www.php.net/) (>=7.3)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/) or another database of your choice

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Kashan-amd/task-manager.git
   ```

2. Navigate to the project directory:

   ```bash
   cd task-manager
   ```

3. Install PHP dependencies using Composer:

   ```bash
   composer install
   ```

4. Install JavaScript dependencies using NPM:

   ```bash
   npm install
   ```

5. Create a `.env` file by copying `.env.example` and update it with your database configuration:

   ```bash
   cp .env.example .env
   ```

6. Generate a new application key:

   ```bash
   php artisan key:generate
   ```

7. Migrate the database:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

9. Visit `http://localhost:8000` in your web browser to access the application.

## Usage

- Register for a new user account or log in if you already have one.
- Create tasks, assign them to task groups, and set their due dates.
- View and manage your tasks in the task list.
- Use the scheduling feature to create recurring tasks.


## Documentation

Read documentation for solution, tests, implementation instructions and db design.