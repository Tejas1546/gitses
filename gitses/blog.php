<?php
$name = $_POST['n1'];
$visitor_email = $_POST['e1'];
$message = $_POST['m1'];

$conn = new mysqli('localhost','root','','contact');
if(mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno().' ) '. mysqli_connect_error());
} else{
    $INSERT = "INSERT Into blog (name, visitor_email, message) values(?, ?, ?)";
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("sss", $name,$visitor_email,$message);
    $stmt->execute();
    echo "Submitted Successfully...";
    $stmt->close();
    $conn->close();
    header( "refresh:5;url=http://localhost/blog.html" );
    echo '<br>You will be redirected in about 5 secs. If not, please click <a href="http://localhost/blog.html">here</a>.';
}
?>