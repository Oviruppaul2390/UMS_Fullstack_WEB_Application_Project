<?php
session_start();
require_once "config/db.php";
$message="";
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $email=trim($_POST["email"]??"");
    $password=$_POST["password"]??"";
    $stmt=$conn->prepare("SELECT id,full_name,email,password,role FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s",$email); $stmt->execute();
    $u=$stmt->get_result()->fetch_assoc();
    if($u && password_verify($password,$u["password"])) {
        $_SESSION["user"]=["id"=>$u["id"],"name"=>$u["full_name"],"email"=>$u["email"],"role"=>$u["role"]];
        if($u["role"]==="admin") header("Location: admin/dashboard.php");
        elseif($u["role"]==="faculty") header("Location: faculty/dashboard.php");
        else header("Location: student/dashboard.php");
        exit;
    }
    $message="Invalid email or password.";
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Login | UniSphere</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body class="auth-page"><div class="auth-card">
<a class="brand" href="index.php"><span class="brand-mark">U</span>UniSphere</a>
<h1>Welcome back</h1><p class="muted">Sign in to your university portal.</p>
<?php if($message): ?><div class="alert danger"><?= e($message) ?></div><?php endif; ?>
<form method="POST">
<label>Email<input type="email" name="email" required placeholder="you@example.com"></label>
<label>Password<input type="password" name="password" required placeholder="••••••••"></label>
<button class="btn btn-primary full">Sign In</button>
</form>
<div class="demo-box"><b>Demo Accounts</b><br>Admin: admin@unisphere.com / admin123<br>Faculty: faculty@unisphere.com / faculty123<br>Student: student@unisphere.com / student123</div>
<a class="back-link" href="index.php">← Back to home</a>
</div></body></html>