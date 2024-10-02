# Payment Manager Project - README

## Overview

This Laravel-based project manages payment methods for events. It provides functionalities like assigning payment methods to events, managing provider requests, and sending notifications to the finance team. The system follows the MVC pattern, leveraging Laravel's powerful features.

## Prerequisites

- PHP 7.4+
- Composer
- MySQL
- Laravel 8+

## Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-repo/payment-manager.git
   cd payment-manager

2. **Install Dependencies**
    ```bash
    composer install

3. **Environment setup: Copy .env.example to .env, and configure database credentials:**
   ```bash
   cp .env.example .env

4. **Generate application key:**
    ```bash
    php artisan key:generate

5. **Migrate and seed database**
   ```bash
    php artisan migrate --seed

6. **Run the application: Start the local development server:**
   ```bash
    php artisan serve

7. **Access the application: Navigate to http://127.0.0.1:8000 in your browser.**


## Design Decisions

### MVC Architecture
I leveraged Laravel’s MVC architecture to separate concerns between models, views, and controllers, ensuring a clear structure and maintainability.

### Eloquent ORM
Utilised for clean interaction with the database, simplifying query building.

### Notifications
Laravel’s built-in notification system is used for notifying the finance team on key events, providing a straightforward and reliable solution.

### RESTful Routing
Routes were built following REST principles for clarity and scalability.

## Trade-offs

### Framework Choice
Laravel offers simplicity and built-in tools (auth, notifications) but can be heavier compared to lightweight alternatives.

### Eloquent vs Raw SQL
Eloquent ORM was chosen for rapid development over the fine control provided by raw SQL.

## Future Improvements
- **Admin Dashboard**: Adding a dashboard for better management of events and payments.
- **API Integration**: Expanding the system to integrate with external payment gateways.
- **Advanced Reporting**: Implementing detailed financial reports for event managers.
