<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$conn = new mysqli('localhost','root','','contact');
if(mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno().' ) '. mysqli_connect_error());
} else{
    $INSERT = "INSERT Into contact_info (name, visitor_email, subject, message) values(?, ?, ?, ?)";
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssss", $name,$visitor_email,$subject,$message);
    $stmt->execute();
    echo "Submitted Successfully...";
    $stmt->close();
    $conn->close();
  header( "refresh:5;url=http://localhost/contact.html" );
  echo '<br>You will be redirected in about 5 secs. If not, please click <a href="http://localhost/contact.html">here</a>.';

}
?>