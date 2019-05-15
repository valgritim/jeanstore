<?php

    session_start();
    include("Connect.php");

    $email = $pwd = "";

    function checkData($data)
    {
        $data = trim($data); // supprime les espaces avant et après la string
        $data = htmlspecialchars($data); // supprime les caractères spéciaux
        $data = stripslashes($data); // supprime les slashes

        return $data;
    };

    if(isset($_SESSION["errors"]["user_logError"]) && !empty($_SESSION["errors"]["user_logError"])){
    	unset($_SESSION["errors"]["user_logError"]);
    }

    // PARTIE GESTION DU FORMULAIRE

    if (isset($_POST) && empty($_POST)) {
        $_SESSION["errors"]["user_logError"] = "Veuillez remplir tous les champs";
    }

    else {

        $email = checkData($_POST["email"]);
        

        // Récupération dans la base de données
        $db = Database::connect();

        $statement = $db->prepare("SELECT * FROM `user` WHERE email = :email");   
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
		$statement->execute();


      	$result = $statement->rowCount(); 

        if ($result == 1){
        	
        	$userinfo = $statement->fetch(); // va chercher id et email dans la base de données
        	
        	$passCheck = password_verify($_POST["password"], $userinfo["password"]);


        	if ($passCheck){
        		
        		$_SESSION['user']['id'] = $userinfo['id'];
            	$_SESSION['user']['email'] = $userinfo['email'];
            	$_SESSION['user']['firstname'] = $userinfo['firstname'];
                $_SESSION['user']['lastname'] = $userinfo['lastname'];
                $_SESSION['user']['address'] = $userinfo['address'];
                $_SESSION['user']['role'] = $userinfo['role_id'];

            	header("Location:../home/homepage.php");
        	} else {
        		$_SESSION["errors"]["user_logError"] = 'Nom d\'utilisateur ou mot de passe incorrect';
        		header("Location:../user/login.php");
        	}
        }
        else {
            $_SESSION["errors"]["user_logError"] = "Cet email n'existe pas, merci de créer un compte";
            header("Location: ../user/register.php");
    }
        
   }