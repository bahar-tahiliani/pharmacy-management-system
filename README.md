Pharmacy Management System

A web-based Pharmacy Management System (PMS) developed using PHP,MySQL, Bootstrap, JavaScript, jQuery, and Font Awesome. The system helpsmanage pharmacy operations such as administrators, managers,pharmacists, salesmen, prescriptions, stock, and sales.

Features

Admin management

Manager management

Pharmacist management

Salesman management

User login and logout

Password change functionality

Prescription management

Medicine stock management

Sales management

Receipt generation and printing

Dashboard for pharmacy operations

Database integration using MySQL

Responsive user interface using Bootstrap

Technologies Used

Technology     Purpose

PHP            Backend and server-side application logicMySQL          Database managementHTML5          Web page structureCSS3           StylingJavaScript     Client-side functionalityjQuery         DOM manipulation and interactive featuresBootstrap      Responsive UIFont Awesome   IconsXAMPP          Local development environment

Project Structure

pharmacy-management-system/
│
├── bootstrap/                 # Bootstrap CSS and JavaScript files
├── css/                       # Custom CSS
├── database file/             # MySQL database schema
├── fontawesome/               # Font Awesome resources
├── includes/                  # Database connection and shared files
├── jquery/                    # jQuery library
│
├── index.php                  # Login page
├── dashboard.php              # Main dashboard
│
├── addManager.php
├── editManager.php
├── deleteManager.php
├── actionManager.php
│
├── addPharmacist.php
├── editPharmacist.php
├── deletePharmacist.php
├── actionPharmacist.php
│
├── addSalesman.php
├── editSalesman.php
├── deleteSalesman.php
├── actionSalesman.php
│
├── addPrescription.php
├── editPrescription.php
├── deletePrescription.php
├── viewPrescription.php
├── printReceipt.php
│
├── getStock.php
├── updateItem.php
├── updateSale.php
├── changePassword.php
└── logout.php

Database Setup

The project uses MySQL.

1. Create the database

Open phpMyAdmin or MySQL and create a database named:

pms_db

2. Import the database schema

Import:

database file/pms_db.sql

The GitHub version contains the database structure without the originalsample user/patient records.

3. Configure the database connection

Open:

includes/connection.php

Configure the MySQL connection according to your local environment.

Example:

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "pms_db");

Update the username/password if your local MySQL installation usesdifferent credentials.

Running the Project Locally

Requirements

XAMPP

Apache

MySQL

PHP

Web browser

Steps

Install and start XAMPP.

Start Apache and MySQL.

Copy the project into the XAMPP web directory:

htdocs/

For example:

htdocs/pharmacy-management-system/

Create the pms_db database.

Import database file/pms_db.sql.

Check the database settings in:

includes/connection.php

Open the application in a browser:

http://localhost/pharmacy-management-system/

Main Modules

Admin Module

Manage managers

Manage pharmacists

Manage salesmen

Access the pharmacy dashboard

Manager Module

Manage pharmacy operations

Manage stock

Manage sales and prescriptions

Pharmacist Module

Manage prescriptions

View medicine-related information

Handle pharmacy tasks

Salesman Module

Manage sales

Update sales information

Generate receipts

Security Note

The repository does not include the original database backupcontaining sample account credentials and personal/demo records.

The original local database backup is intentionally excluded through.gitignore.

For production deployment, additional security measures should beimplemented, including:

Password hashing

Environment variables for database credentials

Input validation and sanitization

Prepared SQL statements

Session security

Role-based access control

HTTPS

Future Enhancements

Password hashing and stronger authentication

Role-based authorization improvements

Medicine expiry-date alerts

Low-stock notifications

Sales reports and analytics

Search and filtering

PDF invoice generation

Email notifications

Cloud deployment

Improved responsive UI

Learning Outcomes

This project demonstrates practical experience with:

PHP web development

MySQL database integration

CRUD operations

Authentication and sessions

Database-driven application design

Frontend development

Server-side programming

Pharmacy inventory and sales workflows

Author

Bahar Tahiliani

B.Tech Computer Science Engineering

License

This project is intended for educational and academic purposes.
