<?php 
// Load the database configuration file 
include_once 'conn.php'; 
 
$filename = "feedback_" . date('Y-m-d') . ".csv"; 
$delimiter = ","; 
  
$f = fopen('php://memory', 'w'); 
 
$fields = array('First', 'Last', 'Email','Rate','Comments','User','Date_Time'); 
fputcsv($f, $fields, $delimiter); 

$result = $con->query("SELECT * FROM feedback"); 
if($result->num_rows > 0){ 
 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['first'], $row['last'], $row['email'],$row['rate'], $row['msg'], $row['user'], $row['date_time']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
} 
 
fseek($f, 0); 
 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
fpassthru($f); 
 
exit();
?>