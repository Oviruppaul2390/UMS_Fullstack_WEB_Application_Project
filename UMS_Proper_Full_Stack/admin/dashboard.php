<?php
require_once "../includes/auth.php"; require_login("admin"); require_once "../config/db.php";
$students=$conn->query("SELECT COUNT(*) c FROM users WHERE role='student'")->fetch_assoc()["c"];
$faculty=$conn->query("SELECT COUNT(*) c FROM users WHERE role='faculty'")->fetch_assoc()["c"];
$courses=$conn->query("SELECT COUNT(*) c FROM courses")->fetch_assoc()["c"];
$notices=$conn->query("SELECT COUNT(*) c FROM notices")->fetch_assoc()["c"];
$page_title="Admin Dashboard"; $css_path="../assets/css/style.css"; $js_path="../assets/js/main.js"; require "../includes/header.php";
?>
<div class="dashboard"><aside class="sidebar"><?php include "sidebar.php"; ?></aside>
<main class="dash-main"><div class="dash-top"><div><span class="eyebrow">ADMIN PANEL</span><h1>Good day, <?= e($_SESSION["user"]["name"]) ?>.</h1><p class="muted">Manage your university from one dashboard.</p></div><div class="avatar">A</div></div>
<div class="stat-cards"><div class="dash-stat"><small>Students</small><strong><?= $students ?></strong><span>Registered</span></div><div class="dash-stat"><small>Faculty</small><strong><?= $faculty ?></strong><span>Active accounts</span></div><div class="dash-stat"><small>Courses</small><strong><?= $courses ?></strong><span>Available courses</span></div><div class="dash-stat"><small>Notices</small><strong><?= $notices ?></strong><span>Published</span></div></div>
<div class="panel"><h2>Quick Actions</h2><div class="quick-grid"><a href="students.php">👥 Manage Students →</a><a href="faculty.php">🧑‍🏫 Manage Faculty →</a><a href="courses.php">📚 Manage Courses →</a><a href="notices.php">📢 Publish Notice →</a><a href="results.php">📝 Manage Results →</a><a href="attendance.php">✓ Manage Attendance →</a></div></div>
</main></div><?php require "../includes/footer.php"; ?>