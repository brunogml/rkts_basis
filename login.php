<?php 

session_start();
$pdo = new PDO('mysql:host=mysqlsvr83.world4you.com;dbname=6140636db14', 'sql4629280', 'aku@5mp7');
 
if(isset($_GET['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $statement = $pdo->prepare("SELECT * FROM user WHERE user = :name");
    $result = $statement->execute(array('name' => $name));
    $user = $statement->fetch();
        
    //Überprüfung des passwords
    if ($user !== false && strcmp($password, $user['password'])==0) {
        $_SESSION['userid'] = $user['id']; $_SESSION['login'] = 1;$_SESSION['user'] = $user['user'];
        die('Log in successful. <meta http-equiv="Refresh" content="0; url=index.php" />');
    } else {
        $errorMessage = "failed<br>"; 
    }
    
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title>    
</head> 
<body>
 
<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
 
<form action="?login=1" method="post">
User name:<br>
<input type="text" size="40" maxlength="250" name="name"><br><br>
Password:<br>
<input type="password" size="40"  maxlength="250" name="password"><br>
<br>
<input class="button" type="submit" value="submit">
</form> 
</body>
</html>