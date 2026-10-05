# UMS_Fullstack_WEB_Application_Project
UNISPHERE UMS - PROPER FULL-STACK VERSION
==========================================

Technology
----------
Frontend: HTML5 + CSS3 + JavaScript
Backend: PHP 8+
Database: MySQL/MariaDB
Database client: MySQL Workbench can be used to manage the database.
Hosting target: InfinityFree-compatible PHP/MySQL hosting.

IMPORTANT
---------
MySQL Workbench is NOT the database server. Without XAMPP, you still need MySQL Server/MariaDB running locally, or you can test the project directly on a PHP/MySQL host.

MAIN MODULES
------------
1. Public landing page
2. Login/logout
3. Admin dashboard
4. Student management
5. Faculty management
6. Department data
7. Course management
8. Notice management
9. Result management
10. Attendance management
11. Student dashboard/profile/courses/results/attendance/notices
12. Faculty dashboard/courses/attendance/results
13. JSON notices API
14. Responsive blue/purple UI
15. Password hashing + sessions + prepared SQL statements

LOCAL SETUP WITHOUT XAMPP
-------------------------
1. Install PHP and MySQL Server separately.
2. Create/import database/ums_database.sql in MySQL.
3. Edit config/db.php:
   host = your MySQL host
   user = your MySQL username
   pass = your MySQL password
   db   = ums_database
4. Open Command Prompt in the project folder.
5. Run:
   php -S localhost:8000
6. Visit:
   ## http://localhost:8000/ 
7. Run this once in the browser:
   ## http://localhost:8000/database/setup_demo.php
8. DELETE database/setup_demo.php after it finishes.
   ***for security purpose i am not uploading db.php on my github repository and
    in the above i just give the demo db.php in my repository so that when someone 
    deploy my project code they are going to give their own database information .

DEMO LOGIN
----------
Admin:
admin@unisphere.com
admin123

Faculty:
faculty@unisphere.com
faculty123

Student:
student@unisphere.com
student123

INFINITYFREE SETUP
------------------
1. Create an InfinityFree account and a website.
2. Create a MySQL database from the hosting control panel.
3. Import database/ums_database.sql using the phpMyAdmin/database tool provided by the host.
4. Upload the project files to the correct web root (commonly htdocs).
5. Edit config/db.php using the EXACT database hostname, database name, username and password supplied by the host.
6. Open your domain.
7. Run database/setup_demo.php once if you want the demo accounts.
8. Delete setup_demo.php after setup.

DO NOT USE
----------
Do not upload localhost/root database credentials to live hosting.
Do not leave setup_demo.php on a public production website.

NEXT LEVEL FEATURES
-------------------
The architecture is ready to extend with:
- semester/session management
- course registration/enrollment
- fee/payment module
- transcript/PDF generation
- password reset
- email notifications
- advanced admin CRUD
- search, filters and pagination
- CSRF protection and stricter validation
