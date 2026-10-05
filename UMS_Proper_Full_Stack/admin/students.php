<?php
require_once "../includes/auth.php"; require_login("admin"); require_once "../config/db.php";
$msg="";
if(isset($_POST["add_student"])){
 $name=trim($_POST["name"]);$email=trim($_POST["email"]);$dept=(int)$_POST["department_id"];$sid=trim($_POST["student_id"]);$pass=password_hash($_POST["password"],PASSWORD_DEFAULT);
 $stmt=$conn->prepare("INSERT INTO users(full_name,email,password,role,student_id,department_id) VALUES(?,?,?,'student',?,?)");$stmt->bind_param("ssssi",$name,$email,$pass,$sid,$dept);
 $msg=$stmt->execute()?"Student added successfully.":"Could not add student. Email/ID may already exist.";
}
if(isset($_GET["delete"])){ $id=(int)$_GET["delete"]; $stmt=$conn->prepare("DELETE FROM users WHERE id=? AND role='student'");$stmt->bind_param("i",$id);$stmt->execute(); header("Location: students.php");exit; }
$deps=$conn->query("SELECT * FROM departments ORDER BY name");$rows=$conn->query("SELECT u.*,d.name department FROM users u LEFT JOIN departments d ON u.department_id=d.id WHERE u.role='student' ORDER BY u.id DESC");
$page_title="Students";$css_path="../assets/css/style.css";$js_path="../assets/js/main.js";require "../includes/header.php";
?>
<div class="dashboard"><aside class="sidebar"><?php include "sidebar.php"; ?></aside><main class="dash-main"><h1>Student Management</h1><?php if($msg):?><div class="alert success"><?=e($msg)?></div><?php endif;?>
<div class="panel"><h2>Add Student</h2><form method="POST" class="form-grid"><input name="name" placeholder="Full name" required><input name="student_id" placeholder="Student ID" required><input type="email" name="email" placeholder="Email" required><select name="department_id" required><option value="">Select department</option><?php while($d=$deps->fetch_assoc()):?><option value="<?=$d["id"]?>"><?=e($d["name"])?></option><?php endwhile;?></select><input type="password" name="password" placeholder="Initial password" required><button name="add_student" class="btn btn-primary">Add Student</button></form></div>
<div class="panel"><h2>Student List</h2><div class="table-wrap"><table><tr><th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Action</th></tr><?php while($r=$rows->fetch_assoc()):?><tr><td><?=e($r["student_id"])?></td><td><?=e($r["full_name"])?></td><td><?=e($r["email"])?></td><td><?=e($r["department"]??"—")?></td><td><a class="danger-link" href="?delete=<?=$r["id"]?>" onclick="return confirm('Delete this student?')">Delete</a></td></tr><?php endwhile;?></table></div></div></main></div><?php require "../includes/footer.php"; ?>