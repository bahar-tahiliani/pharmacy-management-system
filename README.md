# Pharmacy Management System

A web-based **Pharmacy Management System (PMS)** developed using **PHP, MySQL, Bootstrap, JavaScript, jQuery, and Font Awesome**. The system is designed to simplify and manage day-to-day pharmacy operations, including user management, prescriptions, medicine stock, sales, and receipt generation.

## Features

- Admin management
- Manager management
- Pharmacist management
- Salesman management
- User login and logout
- Password change functionality
- Prescription management
- Medicine stock management
- Sales management
- Receipt generation and printing
- Pharmacy dashboard
- MySQL database integration
- Responsive user interface using Bootstrap

## Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Backend and server-side application logic |
| MySQL | Database management |
| HTML5 | Web page structure |
| CSS3 | Styling |
| JavaScript | Client-side functionality |
| jQuery | DOM manipulation and interactive features |
| Bootstrap | Responsive user interface |
| Font Awesome | Icons |
| XAMPP | Local development environment |

## Project Structure

```text
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
