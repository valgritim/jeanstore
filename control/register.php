<?php

    session_start();
    include("Connect.php");

    $firstname = $lastname = $address = $email = $pwd = $role = "";

    function checkData($data)
    {
        $data = trim($data); // supprime les espaces avant et après la string
        $data = htmlspecialchars($data); // supprime les caractères spéciaux
        $data = stripslashes($data); // supprime les slashes

        return $data;
    };

    // PARTIE GESTION DU FORMULAIRE

    if (isset($_POST) && empty($_POST)) {
        $_SESSION["error"]["empty"] = "Veuillez remplir tous les champs";
    }

    else {
        $firstname = checkData($_POST["firstname"]);
        $lastname = checkData($_POST["lastname"]);
        $address = checkData($_POST["address"]);
        $email = checkData($_POST["email"]);
        $pwd = checkData($_POST["password"]);
        $role = 1;

        //Hachage du password
        $newPass = password_hash($pwd, PASSWORD_DEFAULT);

        // insertion dans la base de données
        $db = Database::connect();
        
        $statement = $db->prepare('INSERT INTO `user` (`firstname`, `lastname`, `email`, `address`, `password`, `role_id`) VALUES (:first,:last,:email,:address,:pwd,:role)');
      
        $statement->bindParam(':first', $firstname, PDO::PARAM_STR);
        $statement->bindParam(':last', $lastname, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':address', $address, PDO::PARAM_STR);
        $statement->bindParam(':pwd', $newPass, PDO::PARAM_STR);
        $statement->bindParam(':role', $role, PDO::PARAM_INT);
           
        $result = $statement->execute();

        if ($result) {
            header("Location:../user/login.php");
        }
        else {
            echo 'erreur: ';
            print_r($statement->errorInfo());
        }

        
        
   }