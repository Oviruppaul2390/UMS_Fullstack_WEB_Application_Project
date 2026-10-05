<?php
require_once "../config/db.php";
$accounts=[
["System Administrator","admin@unisphere.com","admin123","admin",NULL,NULL,1],
["Dr. Sarah Rahman","faculty@unisphere.com","faculty123","faculty",NULL,"FAC-001",1],
["Demo Student","student@unisphere.com","student123","student","STU-001",NULL,1]
];
foreach($accounts as $a){
 $hash=password_hash($a[2],PASSWORD_DEFAULT);
 $stmt=$conn->prepare("INSERT INTO users(full_name,email,password,role,student_id,faculty_id,department_id) VALUES(?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE password=VALUES(password),full_name=VALUES(full_name),role=VALUES(role),student_id=VALUES(student_id),faculty_id=VALUES(faculty_id),department_id=VALUES(department_id)");
 $stmt->bind_param("ssssssi",$a[0],$a[1],$hash,$a[3],$a[4],$a[5],$a[6]);$stmt->execute();
}
echo "Demo accounts created/updated. Delete this file after running it.";
?>