<?php
include "db_con.php";
$student_id = $_GET['student_id'];
$sql = "DELETE FROM `student_info WHERE student_id = $student_id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: index.php?msg=Record deleted successfully");
}
else{
    echo "Failed: " .mysqli_error( $conn);
}
?>
