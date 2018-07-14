<?php 


function checkexist($email,$password){
	$pdo =new PDO('mysql:host=localhost;dbname=login;charset=utf8mb4','root','root');
	$stmt=$pdo->prepare("SELECT * from user where email = :email");
	$stmt->execute(array(
		'email'=>$email));
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
	if($result){
		return false;
	}else{
		return true;
	}
}




function signup($email,$password){
		$pdo =new PDO('mysql:host=localhost;dbname=login;charset=utf8mb4','root','root');
		if(checkexist($email,$password)){
			$stmt=$pdo->prepare("INSERT into user (email,password) Values (:email,:password)");
			$stmt->execute(array(
				":email"=>$email,
				":password"=>md5($password)
				)
			);
			return  true;

		}else{
			return  false;

		}
	}




?>