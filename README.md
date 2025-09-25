## 📝 Student Feedback System
A web-based solution for educational institutes to collect, manage, and analyze student feedback efficiently. Built using HTML, CSS, Bootstrap, PHP, and MySQL for a responsive and dynamic experience.

## 🎯 Overview
This website allows students to submit feedback for courses and teachers, while admins and teachers can manage and analyze the feedback. The system streamlines feedback collection, improves course quality, and provides detailed performance evaluation for teachers.

## ✨ Features - 
🔐 User authentication (Login/Signup for Admin, Teacher, and Student)
📝 Students submit feedback for courses/teachers
📊 Teachers view performance evaluation based on feedback
🗂️ Admin manages students, teachers, and subjects
🖥️ Admin can enable/disable feedback for courses (Mid1, Mid2, Final Term)
📋 Admin dashboard to monitor teacher performance and overall feedback
🔍 Search & filter feedback by course, teacher, or student

## 🛠️ Technologies Used

| Category        | Stack                    |
|-----------------|--------------------------|
| Frontend        | HTML, CSS, Bootstrap     |
| Backend         | PHP                      |
| Database        | MySQL (via XAMPP)        |
| Server          | XAMPP Localhost          |
| UI / UX         | Responsive Bootstrap UI  |


## 🚀 Installation

1. Clone this repository:
      - git clone https://github.com/NikhilBarage/Feedback-System

2. Open XAMPP and start Apache and MySQL.

3. Import the provided database.sql into phpMyAdmin.

4. Place the project folder in xampp/htdocs/.

5. Open your browser and navigate to:
     http://localhost/Feedback-System/


## 📖 Usage

1. Admin:

    Add/manage students, teachers, and subjects
    Enable/disable feedback for each course (Mid1, Mid2, Final Term)
    View each teacher’s performance evaluation
    Monitor overall feedback and generate reports

2. Teacher:

    View performance evaluation and feedback summaries
    Analyze course ratings and student comments

3. Student:

    Submit feedback for subjects/courses
    Track submitted feedback history



## 🗄️ Database Schema (Column Names Only)

1. Admin (admin_id, a_username, a_password)
2. Semester List (srNo, semname, status, created_by, active_deactive)
3. Semester Feedback (e.g., winter2023feedback) (f_id, s_id, sub_id, tname, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, term)
4. Students (e.g., winter2023students) (id, username, password, dept, year, name, email)
5. Subjects (e.g., winter2023sub) (id, c_name, c_short, c_code, dept, year, sem, t_name, midstatus, finalstatus)
6. Teachers (e.g., winter2023teacher) (id, username, password, name, email, dept)



## 🔒 Security Features

Input validation on all forms
Password hashing for accounts
Role-based access control (Admin/Teacher/Student)
Localhost deployment minimizes external risks
