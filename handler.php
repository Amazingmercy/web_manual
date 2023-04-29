<?php

require_once __DIR__."/connection.php";

$student_id = $_POST['id_no'];
$f_name =  $_POST['f_name'];
$m_name =  $_POST['m_name'];
$l_name =  $_POST['l_name'];
$dob =  $_POST['dob'];
$contact =  $_POST['contact'];
$mail =  $_POST['mail'];
$tele =  $_POST['tele'];
$nation =  $_POST['nation'];
$state =  $_POST['state'];

$file_name = $_FILES['passport']['name'];
$temp_folder = $_FILES['passport']['tmp_name'];
$destination_folder = __DIR__."/passports/";

if(!is_dir($destination_folder)) {
    mkdir($destination_folder);
}

$rand = str_replace('/', '_', $student_id);

$file_location = $destination_folder . $rand . $file_name;

move_uploaded_file($temp_folder, $file_location);

$file_location = str_replace(__DIR__, '', $file_location);

$query = "INSERT INTO `student_table`(`student_no`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `address`, `email`, `passport`, `phone`, `state`, `nationality`) VALUES ('$student_id', '$f_name', '$m_name', '$l_name', '$dob', '$contact', '$mail', '$file_location', '$tele', '$state', '$nation')";

$conn->query($query);

?>