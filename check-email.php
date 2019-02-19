<?php
require_once 'config.php';
$db = new Cl_DBclass();





if( isset( $_POST['password'] ) && !empty($_POST['password'])){
	$password =md5( trim( $_POST['password'] ) );
	$email = $_POST['email'];

	if( !empty( $email) && !empty($password) ){

		$query = " select (select count(email) from host where email = '$email' and password = '$password') + (select count(email) from customer where email = '$email' and password = '$password') as cnt ";
		$result = mysqli_query($db->con, $query);
		$data = mysqli_fetch_assoc($result);
		if($data['cnt'] == 1){
			echo 'true';
		}else{
			echo 'false';
		}
	}else{
		echo 'false';
	}
	exit;
}


if( isset( $_POST['email'] ) && !empty($_POST['email'])){
	$email = $_POST['email'];
	$query = " select (select count(email) from host where email = '$email') + (select count(email) from customer where email = '$email') as cnt ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] > 0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}

if( isset( $_GET['email'] ) && !empty($_GET['email'])){
	$email = $_GET['email'];
	$query = " select (select count(email) from host where email = '$email') + (select count(email) from customer where email = '$email') as cnt ";
	$result = mysqli_query($db->con, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] == 1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}
