# Learning Management System (LMS) Module

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange.svg)](https://www.mysql.com/)

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Acknowledgments](#acknowledgments)

## Introduction

The Learning Management System (LMS) module is a comprehensive platform designed to cater to both students and administrators, facilitating effective learning management. Built with PHP and MySQL, it provides a user-friendly interface for course management, assignments, announcements, and user administration. This project aims to streamline educational processes by centralizing essential functionalities for admins and students alike.

## Features

### Admin Functionalities
- **User Management:** Delete registered users from the system.
- **Course Management:** Display, add, delete, and edit courses.
- **Assignment Management:** View, edit, and delete assignments; review submitted assignments.
- **Announcements:** Create and manage system-wide announcements.

### Student Functionalities
- **Course Access:** View available courses and enroll.
- **Assignments:** View and submit assignments for enrolled courses.
- **Resources:** Download course policies.
- **Announcements:** Access admin announcements.
- **Authentication:** Login, logout, and registration capabilities.

## Tech Stack

- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Frontend:** HTML, CSS, JavaScript
- **Server:** Apache (via XAMPP)
- **Version Control:** Git

## Project Structure

```
LMS-Using-PHP-MySQL/
├── add_announcement.php          # Add new announcements
├── add_course.php                # Add new courses
├── add.php                       # General add functionality
├── admin_announcement.php        # Admin announcement management
├── admin_assignment.php          # Admin assignment management
├── admin_cources.php             # Admin course management
├── admin_login.php               # Admin login page
├── admin_start (1).php           # Admin dashboard
├── admin_submitted.php           # View submitted assignments
├── admin_upcoming.php            # Upcoming activities for admin
├── admin_user.php                # Admin user management
├── announcement.php              # View announcements
├── assignment.php                # View assignments
├── cources.php                   # View courses
├── db.php                        # Database connection
├── delete_assignment.php         # Delete assignments
├── delete_course.php             # Delete courses
├── edit_assignment.php           # Edit assignments
├── edit_course.php               # Edit courses
├── edit_submit.php               # Edit submissions
├── final_style.css               # Main stylesheet
├── footer.php                    # Footer component
├── header.php                    # Header component
├── LICENSE                       # MIT License
├── login.php                     # User login
├── logout.php                    # Logout functionality
├── README.md                     # Project documentation
├── register.php                  # User registration
├── start.php                     # Main landing page
├── style.css                     # Additional styles
├── style2.css                    # Secondary styles
├── submit.php                    # Submit assignments
├── upcoming_activities.php       # Upcoming activities
├── upload.php                    # File upload functionality
├── user_data.php                 # User data handling
├── user_data.sql                 # Database schema
└── cp/                          # Course policies directory
    ├── 2CSDE56-GT Course Policy.pdf
    ├── 2CSDE69_Course Policy.pdf
    ├── CC_course_policy_2023.pdf
    ├── CoursePolicy-CATOdd2022.pdf
    └── FM Approved CO-Jan2023.pdf
```

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (includes Apache, MySQL, PHP)
- Git

### Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/Shreyp087/LMS-Using-PHP-MySQL.git
   cd LMS-Using-PHP-MySQL
   ```

2. **Set up XAMPP:**
   - Install and start XAMPP.
   - Start Apache and MySQL modules.

3. **Database Setup:**
   - Open phpMyAdmin (http://localhost/phpmyadmin).
   - Create a new database named `user_data`.
   - Import the `user_data.sql` file to set up tables and initial data.

4. **Configure Database Connection:**
   - Update `db.php` with your MySQL credentials if different from defaults.

5. **Run the Application:**
   - Place the project folder in `htdocs` directory (e.g., `C:\xampp\htdocs\` on Windows).
   - Access the application at `http://localhost/LMS-Using-PHP-MySQL/`.

## Usage

- **Admin Access:** Navigate to admin login and manage users, courses, assignments, and announcements.
- **Student Access:** Register or login to view courses, submit assignments, and access resources.
- **Video Tutorial:** [Watch on YouTube](https://youtu.be/-ReGkiLnmn0?feature=shared)

## Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-feature`.
3. Commit changes: `git commit -m 'Add some feature'`.
4. Push to the branch: `git push origin feature/your-feature`.
5. Open a Pull Request.

Ensure code follows PHP standards and includes appropriate comments.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

Special thanks to our co-authors and contributors for their dedication to this project. We appreciate the support from the academic community in developing this LMS module.
