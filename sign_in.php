<?php
session_start();
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "itthink"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST['username-login'];
$_SESSION['username'] = $username;
$pass = $_POST['password-login'];
$q =mysqli_query($conn,"SELECT nom_utilisateur,mot_de_passe FROM `utilisateurs` Where nom_utilisateur = '$username' AND mot_de_passe='$pass';");
$sa7i7= 0;

if(mysqli_num_rows($q) == 0){
        $_SESSION['sa7i7'] = 1;
        header("Location: index.php");
        exit();
}else{
    $admin= mysqli_query($conn,"SELECT nom_utilisateur FROM utilisateurs where id_utilisateur = 1;");
    $row = mysqli_fetch_assoc($admin);
    $_SESSION['sa7i7'] = 0;
    if($row["nom_utilisateur"] == $username){
        header("Location: index copy.php");
        exit();
    }else{
        echo "hhey";
    }

// $query =mysqli_query($conn,"SELECT email FROM `utilisateurs` WHERE id_utilisateur = 1;");  
// $row = mysqli_fetch_assoc($query);
// echo "email: " . $row["email"] . " - Name: " . $row["email"] . "<br>";
    }
} 
$conn->close();
?>
