CREATE TABLE departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL UNIQUE,
    code VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(120) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','student','faculty') NOT NULL DEFAULT 'student',
    student_id VARCHAR(50) UNIQUE NULL,
    faculty_id VARCHAR(50) UNIQUE NULL,
    department_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(department_id) REFERENCES departments(id) ON DELETE SET NULL
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(30) NOT NULL UNIQUE,
    course_name VARCHAR(160) NOT NULL,
    credit DECIMAL(3,1) NOT NULL,
    department_id INT NULL,
    faculty_id INT NULL,
    FOREIGN KEY(department_id) REFERENCES departments(id) ON DELETE SET NULL,
    FOREIGN KEY(faculty_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE notices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    body TEXT NOT NULL,
    created_by INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(created_by) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    marks DECIMAL(5,2) NOT NULL DEFAULT 0,
    grade VARCHAR(5) NOT NULL,
    UNIQUE KEY student_course_result(student_id, course_id),
    FOREIGN KEY(student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY(course_id) REFERENCES courses(id) ON DELETE CASCADE
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    attendance_date DATE NOT NULL,
    status ENUM('Present','Absent','Late') NOT NULL,
    UNIQUE KEY student_course_date(student_id, course_id, attendance_date),
    FOREIGN KEY(student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY(course_id) REFERENCES courses(id) ON DELETE CASCADE
);

INSERT INTO departments(name, code) VALUES
('Computer Science and Engineering', 'CSE'),
('Electrical and Electronic Engineering', 'EEE'),
('Business Administration', 'BBA'),
('English', 'ENG');

-- Demo password hashes:
-- admin123, faculty123, student123

INSERT INTO users(
    full_name,
    email,
    password,
    role,
    student_id,
    faculty_id,
    department_id
) VALUES
(
    'System Administrator',
    'admin@unisphere.com',
    '$2y$12$k4wtWr6O6Zc9QZKJrrmEgO6OqAfzqNQleJvNsADKObQIyJPjwrpDO',
    'admin',
    NULL,
    NULL,
    1
),
(
    'Dr. Sarah Rahman',
    'faculty@unisphere.com',
    '$2y$12$k4wtWr6O6Zc9QZKJrrmEgO6OqAfzqNQleJvNsADKObQIyJPjwrpDO',
    'faculty',
    NULL,
    'FAC-001',
    1
),
(
    'Demo Student',
    'student@unisphere.com',
    '$2y$12$S.TE9vTRzO6tXOGBKjkPheyHPk0YcnEYJup7D01/S46f27Qfwt9uW',
    'student',
    'STU-001',
    NULL,
    1
);

INSERT INTO courses(
    course_code,
    course_name,
    credit,
    department_id,
    faculty_id
) VALUES
('CSE101', 'Introduction to Programming', 3.0, 1, 2),
('CSE202', 'Database Management Systems', 3.0, 1, 2),
('CSE305', 'Web and Internet Programming', 3.0, 1, 2),
('CSE401', 'Software Engineering', 3.0, 1, 2);

INSERT INTO notices(
    title,
    body,
    created_by
) VALUES
(
    'Welcome to UniSphere',
    'The new semester portal is now available for students.',
    1
),
(
    'Course Registration',
    'Please check your course list and contact the department if you find any issue.',
    1
);