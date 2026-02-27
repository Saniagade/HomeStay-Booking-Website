
# 🏡 HomeStays Booking Website

A web-based booking platform developed as my Final Year Project.  
This project allows users to browse homestays, make bookings, and receive email notifications.  
It also includes an admin panel to manage users and bookings.

---

## 🚀 Features
- 👤 User Registration & Login  
- 🏡 Browse & Book Homestays  
- 🛠 Admin Panel (Manage bookings & users)  
- 📧 Email Notifications (SMTP)  
- 📊 Database-driven system  

---

## 🛠 Tech Stack
- Frontend: HTML, CSS, JavaScript  
- Backend: PHP  
- Database: MySQL  
- Email: SMTP (PHPMailer)

---

## 📸 Screenshots / Demo
<img width="1805" height="828" alt="image" src="https://github.com/user-attachments/assets/01e3a601-41c2-4f86-bc5e-d5d24851307e" />
<img width="1816" height="855" alt="image" src="https://github.com/user-attachments/assets/0a6eced8-4887-41ee-b69e-49cac81d2f10" />
<img width="1812" height="771" alt="image" src="https://github.com/user-attachments/assets/25969479-b1d0-41cd-91a0-aa58322033da" />
<img width="1784" height="781" alt="image" src="https://github.com/user-attachments/assets/c067f167-9eac-4848-b98c-1124b5d01336" />
<img width="1794" height="762" alt="image" src="https://github.com/user-attachments/assets/f2dd0132-3a7e-49b2-ba29-b8064d585822" />

## steps for run project
## Move the project folder to your server directory

For XAMPP: C:\xampp\htdocs\

Import the database

Open phpMyAdmin

Create a database (e.g., homestays_db)

Import the .sql file provided in the project

Configure database connection

Update database credentials in config.php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "homestays_db";
Configure Email (SMTP)

Update SMTP settings in mail_config.php

$mail->Host = 'smtp.gmail.com';
$mail->Username = 'your-email@gmail.com';
$mail->Password = 'your-app-password';
Run the project

Open in browser:
http://localhost/homestays-booking-website/
