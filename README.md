# periodic-task-manager

## How to Run periodic-task-manager on Production

This guide will walk you through the steps required to set up and run a periodic-task-manager app on a production environment. This app allows users to create periodic tasks and manage them, defining their frequency and duration, and grouping them into task groups. It also displays pending tasks in a list organized by date, allowing users to mark them as completed. The app is built with Laravel, Livewire, and Tailwind.

## Prerequisites
Before you begin, make sure you have the following:

- A web server (e.g., Apache, Nginx)
- PHP 7.3 or later
- Composer
- PostgresQL or another supported database

## Installation

Clone the repository to your web server:

Install dependencies using Composer:
```bash
composer install
```

Copy the .env.example file to .env 
```bash
cp .env.example .env
```
Update the database connection env variables

Generate a new application key:
```bash
php artisan key:generate
```
Run database migrations and seed the database:
```bash
php artisan migrate
```

## Running Unit Tests
Ensure that PHPUnit is installed on your system. If not, you can install it using Composer:
```bash
composer require --dev phpunit/phpunit
```
Run the unit tests:
Run Test for Task Service
```bash
php artisan test --filter TaskTest
```
Test For TaskServiceTest Include:
  - ✓ create task
  - ✓ update task
  - ✓ task find by id
  - ✓ get all tasks
  - ✓ delete task
  - ✓ it determines task time group based on due date
  - ✓ it marks task as completed and recreates task based on frequency
  - ✓ get due date

Run Test for Task Group Service
```bash
php artisan test --filter TaskGroupTest
```
Test For TaskGroupServiceTest Include:
  - ✓ create task group
  - ✓ update task group
  - ✓ delete task group
  - ✓ get all task groups
  - ✓ get task group by id
