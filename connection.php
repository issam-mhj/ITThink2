<?php
$dbh = new PDO('mysql:host=localhost;dbname=itthink', 'root', '');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// echo "good";
?>