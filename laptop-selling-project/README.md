# Laravel Laptop Store with Admin Panel

Welcome to the Laravel Laptop Project – a fully-featured web application built with PHP Laravel for managing a laptop store. This project includes an intuitive admin panel for easy management of products, categories, and user data.

## Features

- **User-Friendly Frontend**: A sleek and responsive frontend allowing users to browse and purchase laptops effortlessly.

- **Admin Panel**: An easy-to-use admin dashboard with authentication for managing products, categories, and users.

- **Product Management**: Add, edit, and delete laptop products with details such as name, description, price, and specifications.

- **Category Management**: Create and manage laptop categories with names and descriptions.

- **User Authentication**: Secure authentication system for both users and admin with Laravel's built-in authentication features.

- **Database Integration**: Utilizes Laravel Eloquent ORM for seamless database interactions.

- **Responsive Design**: Ensures a seamless experience across various devices.

## Technologies Used

- **Laravel**: A powerful PHP framework for building modern web applications.

- **MySQL**: A relational database management system for storing and retrieving data efficiently.

- **Bootstrap**: A front-end framework for building responsive and visually appealing user interfaces.

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/PhyoZayHtike/aptop-selling-website.git

   cd laptop-selling-project

   cp .env.example .env

   php artisan migrate --seed

   php artisan storage:link

    for admin dashboard
   **Email:** admin@gmail.com
   **Password:** password
