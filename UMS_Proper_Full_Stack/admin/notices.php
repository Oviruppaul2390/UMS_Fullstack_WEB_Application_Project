<?php
require_once "../includes/auth.php"; require_login("admin"); require_once "../config/db.php";
if(isset($_POST["publish"])){ $title=trim($_POST["title"]);$body=trim($_POST["body"]);$stmt=$conn->prepare("INSERT INTO notices(title,body,created_by) VALUES(?,?,?)");$uid=$_SESSION["user"]["id"];$stmt->bind_param("ssi",$title,$body,$uid);$stmt->execute(); }
if(isset($_GET["delete"])){ $id=(int)$_GET["delete"];$stmt=$conn->prepare("DELETE FROM notices WHERE id=?");$stmt->bind_param("i",$id);$stmt->execute();header("Location: notices.php");exit;}
$rows=$conn->query("SELECT n.*,u.full_name author FROM notices n LEFT JOIN users u ON n.created_by=u.id ORDER BY n.created_at DESC");
$page_title="Notices";$css_path="../assets/css/style.css";$js_path="../assets/js/main.js";require "../includes/header.php";
?>
<div class="dashboard"><aside class="sidebar"><?php include "sidebar.php"; ?></aside><main class="dash-main"><h1>Notice Management</h1>
<div class="panel"><h2>Publish Notice</h2><form method="POST"><label>Title<input name="title" required></label><label>Message<textarea name="body" rows="4" required></textarea></label><button name="publish" class="btn btn-primary">Publish Notice</button></form></div>
<div class="panel"><h2>Published Notices</h2><?php while($r=$rows->fetch_assoc()):?><div class="notice-item"><div class="notice-title"><h3><?=e($r["title"])?></h3><a class="danger-link" href="?delete=<?=$r["id"]?>" onclick="return confirm('Delete this notice?')">Delete</a></div><p><?=nl2br(e($r["body"]))?></p><small><?=e($r["author"]??"Admin")?> · <?=e($r["created_at"])?></small></div><?php endwhile;?></div></main></div><?php require "../includes/footer.php"; ?>