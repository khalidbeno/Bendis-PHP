# Bendis (PHP E-commerce)

> Lightweight e-commerce web application built with PHP and MySQL, focused on clean architecture and core backend logic

## Overview

Bendis is a simple e-commerce application designed to demonstrate backend development fundamentals using PHP and MySQL.

The project focuses on building a clean and functional system including product browsing, cart management, and order flow.

It was developed as part of my backend portfolio to showcase real-world web development concepts such as MVC structure, database design, and session handling.

## Features

* Product catalog display
* Add to cart functionality
* Basic checkout flow
* Session-based cart management
* MySQL database integration
* MVC-inspired structure

## Project Structure

```bash
Bendis-PHP/
├── docs/
│   ├── requirements.pdf
│   ├── mvc-diagram.png
│   ├── er-diagram.png
│   └── database.sql 
├── README.md
```

## Tech Stack

* PHP
* MySQL
* HTML / CSS
* JavaScript
* Laravel

## How to Run

1. Start your local server (XAMPP / Apache)
2. Import the database:

   * Open phpMyAdmin
   * Import `docs/database.sql`
3. Place the project in your server directory (e.g. `htdocs`)
4. Open in browser:

```bash
http://localhost/Bendis-PHP
```

## Core Concepts Demonstrated

* MVC pattern (Model-View-Controller)
* Relational database design
* Session management
* Form handling and validation
* Basic backend architecture

## Why I Built This

This project represents my foundation in backend development before transitioning into more advanced technologies like:

* FastAPI
* PostgreSQL
* Docker
* AWS

It helped me understand how real web applications handle data, user interaction, and business logic.

## Next Improvements

* Migrate backend to FastAPI
* Implement authentication (JWT)
* Improve UI/UX
* Deploy on AWS

## Disclaimer

This project is for educational purposes and does not include production-ready security features.
