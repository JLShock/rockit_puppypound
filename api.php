<?php


session_start();


if(isset($_SESSION['puppies'])){

	$puppies = $_SESSION['puppies'];
	$puppyID = $_POST['puppyID'];

	array_splice($puppies, $puppyID, 1);

	$_SESSION['puppies'] = $puppies;

}