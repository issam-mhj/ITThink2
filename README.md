<div align="center">

<h3 align="center">ITThink2</h3>

  <p align="center">
    A web application for user authentication and quiz management with admin dashboard.
    <br />
     <a href="https://github.com/issam-mhj/itthink2">github.com/issam-mhj/itthink2</a>
  </p>
</div>
## Table of Contents

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#key-features">Key Features</a></li>
      </ul>
    </li>
    <li><a href="#architecture">Architecture</a></li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

## About The Project

ITThink2 is a web application developed for user authentication and quiz management. It features a login/signup system and an admin dashboard for managing users, questions, and generating reports.

### Key Features

- **User Authentication:** Secure login and signup functionality using PHP and MySQL.
- **Admin Dashboard:** A dedicated interface for administrators to manage users, questions, categories, and generate reports.
- **Quiz Management:** Tools for adding, editing, and managing quiz questions with different levels and categories.
- **User Score Tracking:** Tracks user scores and provides general statistics on user performance.
- **PDF Report Generation:** Allows administrators to generate PDF reports of user data.
The project utilizes a front-end built with HTML, CSS, and JavaScript, incorporating Tailwind CSS for styling in the admin dashboard. The back-end is powered by PHP, which handles user authentication, data management, and database interactions with MySQL. PDO is used for secure database connections.

## Getting Started

### Prerequisites

- PHP 7.0 or higher
- MySQL
- Web server (e.g., Apache, Nginx)

### Installation

1.  Clone the repository:
    ```sh
    git clone https://github.com/issam-mhj/itthink2.git
    ```
2.  Set up the MySQL database:
    - Create a database named `itthink`.
    - Import the necessary tables (users table at least).
3.  Configure the database connection:
    - Edit `connection.php` with your MySQL credentials:
      ```php
      <?php
      $dbh = new PDO('mysql:host=localhost;dbname=itthink', 'root', '');
      $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      ?>
      ```
4.  Set up your web server:
    - Configure your web server to point to the project directory.
5.  Access the application through your web browser.
