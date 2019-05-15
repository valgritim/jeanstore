<?php
	session_start();
// Destruction de la session
session_destroy();
//Redirection vers Homepage
header('Location: ../home/homepage.php');