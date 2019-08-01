<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "bgdom";
@$conn = mysqli_connect($servername, $username, $password, $database);
//check if connected
if(!$conn){
    //we have error in connect
    $error .="Проблем при свързване с базата! Вашата поръчка не е приета! ";
    exit("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");


if (isset($_POST['user']) AND strlen($_POST['user'])>0){
    $user = $_POST['user'];
    $mail = $_POST['mail'];
    $message = $_POST['message'];
}
$sql = "INSERT INTO messages (name,mail,message) VALUES (\"$user\", \"$mail\",\"$message\")";
$query = mysqli_query($conn,$sql);
?>
