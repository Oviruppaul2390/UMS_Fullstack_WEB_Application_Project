<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UniSphere UMS | University Management System</title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
<header class="navbar">
<a class="brand" href="index.php"><span class="brand-mark">U</span>UniSphere</a>
<nav><a href="#features">Features</a><a href="#modules">Modules</a><a href="#about">About</a><a href="login.php" class="btn btn-primary small">Login</a></nav>
</header>

<section class="hero">
<div>
<span class="eyebrow">UNIVERSITY MANAGEMENT SYSTEM</span>
<h1>One smart platform for your <span>entire campus.</span></h1>
<p>UniSphere brings student, faculty and administration workflows together with a clean, secure and responsive full-stack system.</p>
<div class="hero-actions"><a href="login.php" class="btn btn-primary">Open Portal</a><a href="#features" class="btn btn-ghost">Explore Features</a></div>
<div class="trust-row"><span>✓ Student Portal</span><span>✓ Faculty Panel</span><span>✓ Admin Control</span></div>
</div>
<div class="hero-card">
<div class="mini-top"><b>Campus Overview</b><span class="live">● System Online</span></div>
<div class="stat-grid">
<div><small>Students</small><strong>2,480</strong><span class="up">+8.2%</span></div>
<div><small>Faculty</small><strong>96</strong><span class="up">+4.3%</span></div>
<div><small>Courses</small><strong>126</strong><span class="up">+6.1%</span></div>
<div><small>Attendance</small><strong>92%</strong><span class="up">+2.4%</span></div>
</div>
<div class="progress-wrap"><div class="progress-label"><span>Semester progress</span><b>72%</b></div><div class="progress"><i style="width:72%"></i></div></div>
<div class="schedule-item"><span class="dot"></span><div><b>Database Systems</b><small>10:00 AM · Room 402</small></div><span>Today</span></div>
<div class="schedule-item"><span class="dot purple"></span><div><b>Web Programming</b><small>01:30 PM · Lab 3</small></div><span>Today</span></div>
</div>
</section>

<section id="features" class="section">
<div class="section-heading"><span class="eyebrow">CORE FEATURES</span><h2>Everything in one place.</h2><p>Built around common university workflows and easy enough for everyday use.</p></div>
<div class="feature-grid">
<article class="feature"><div class="icon">🎓</div><h3>Student Management</h3><p>Profiles, departments, semesters, enrollment and academic records.</p></article>
<article class="feature"><div class="icon">📚</div><h3>Course & Registration</h3><p>Create courses, assign faculty and manage student enrollment.</p></article>
<article class="feature"><div class="icon">📊</div><h3>Attendance & Results</h3><p>Record attendance and publish marks and grades for students.</p></article>
<article class="feature"><div class="icon">📢</div><h3>Notices</h3><p>Share important academic and campus announcements.</p></article>
</div>
</section>

<section id="modules" class="section alt">
<div class="section-heading"><span class="eyebrow">SYSTEM MODULES</span><h2>Three role-based dashboards.</h2></div>
<div class="module-grid">
<div class="module"><b>01</b><div><h3>Admin Panel</h3><p>Manage users, departments, courses, notices, results and attendance.</p></div></div>
<div class="module"><b>02</b><div><h3>Student Portal</h3><p>View profile, courses, registration, attendance, results and notices.</p></div></div>
<div class="module"><b>03</b><div><h3>Faculty Panel</h3><p>View assigned courses and enter attendance and results.</p></div></div>
<div class="module"><b>04</b><div><h3>MySQL Database</h3><p>Structured relational database ready for local or shared hosting.</p></div></div>
</div>
</section>

<section id="about" class="section">
<div class="about-box"><div><span class="eyebrow">FULL STACK</span><h2>PHP + MySQL + HTML + CSS + JavaScript</h2><p>The project is organized so frontend, backend and database files stay inside one deployable folder.</p></div><a href="login.php" class="btn btn-primary">Enter UMS →</a></div>
</section>

<footer><div class="footer-inner"><div class="brand"><span class="brand-mark">U</span>UniSphere</div><p>University Management System · Full Stack Project</p></div></footer>
<script src="assets/js/main.js"></script>
</body></html>