<?php 
    require_once 'connection.php';
    if (isset($_POST['sub'])){
        $name = $_POST['username-sign-up'];
        $password = $_POST['password-sign-up'];
        $email = $_POST['email-sign-up'];

        if(!empty($name) && !empty($password) && !empty($email) ){
            $insert = $dbh->prepare("INSERT INTO utilisateurs(nom_utilisateur,mot_de_passe,email) VALUES (:name, :password, :email );");
            $insert->bindValue('name',$name);
            $insert->bindValue('password',$password);
            $insert->bindValue('email',$email);
            $insert-> execute();
            echo "your data has been saved successfuly";
            header('Location: index.php');
        }else {
            echo "not done";
        }

    }





?>