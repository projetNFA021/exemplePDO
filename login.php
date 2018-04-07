<?php
session_start();
include_once 'PDOConnection.php';
if (isset($_POST['submit'])){
    $login=$_POST['login'];
    $password=$_POST['password'];
    if(empty($login)){
        echo"<div class='erreur'> Veuillez saisir votre login</div>";
    } else if (empty($password)){
        echo "<div class='erreur'> Veuillez saisir votre mot de passe</div>";
    }
    else {
        
        try{
            $bdd=PDOConnection::getInstance();
            $password=sha1($password);
            $reponse = $bdd->prepare("SELECT * FROM utilisateur WHERE mail= :login AND passworda= :password")or exit(print_r($bdd->errorInfo()));
            $reponse->bindParam(':login', $login, PDO::PARAM_STR);
            $reponse->bindParam(':password', $password, PDO::PARAM_STR);
            $reponse->execute();
            
        }catch (Exception $e){
            die('Erreur : ' .$e->getMessage());
        }
        if ($reponse->rowCount()==1){
            $_SESSION['username']=$login;
            $_SESSION['mdp']=$password;
            header('Location:membre.php');
            
        }else {
            echo utf8_encode("<div class='erreur'> Login ou mot de passe erroné !!</div>");
        }
    }
}
?>

<html>
<head>
<title>Formulaire de connexion</title>
<link href="style.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
	<form method="post" action="login.php">
	
		<table>
			<tr>
				<td>Login :</td>
				<td><input type="text" name="login" />
				</td>
			</tr>
			<tr>
				<td>Mot de passe :</td>
				<td><input type="password" name="password" />
				</td>
			</tr>

		</table><br>

		<div class="toto">
			<input type="submit" value="Login" name="submit" /> <input
				type="reset" value="Effacer" /><br> <br> <a href="index.html">Pas
				encore membre ?</a>
		</div>
	</form>
</body>
</html>
