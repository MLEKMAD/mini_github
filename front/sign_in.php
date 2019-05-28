<?php
session_start();
$bdd= new PDO("mysql:host=localhost;dbname=DBacters","root","");
$password_error="";
if(isset($_POST['register_confirm'])){
  if(isset($_POST["email"]) AND isset($_POST["pseudoname"]) AND isset($_POST["password"]) AND isset($_POST["system"]) AND isset($_POST["viewpoint"]) AND isset($_POST["model"])){
    $email=trim(htmlspecialchars($_POST['email']));
    $pseudoname=trim(htmlspecialchars($_POST['pseudoname']));
    $password=trim(htmlspecialchars($_POST['password']));
    $system=trim(htmlspecialchars($_POST['system']));
    $viewpoint=trim(htmlspecialchars($_POST['viewpoint']));
    $model=trim(htmlspecialchars($_POST['model']));
    if(strlen($password) >= 8){
      $password_crypted=sha1($password);
      $req=$bdd->prepare("insert into acters (email,pseudoname,password,system,viewpoint,model,connect) values (?,?,?,?,?,?,?)");
      $req->execute(array($email,$pseudoname,$password_crypted,$system,$viewpoint,$model,1));
      header('Location:Authentification.php');
    }else{
      $password_error="your password must include more than 8 characters !";
    }
  }
}

?>




<!DOCTYPE html>

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Connection et Inscription</title>
 
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="csss.css">
      

  
</head>

<body>

  <div class="login-wra">
  <div class="login-html">
    <input id="tab-1"  type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"></label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">





      <form class="sign-up-htm" action="./api/user/signup.php" method="POST">




        <div class="group">
          <label for="user" class="label">Email</label>
          <input type="email" class="input" id="email" name="email" placeholder="you@example.com" required>  
        </div>





        <div class="group">
          <label for="user" class="label">Pseudoname</label>
          <input id="pseudoname" name="pseudoname" type="text" class="input" placeholder="" value="" required>
        </div>




                




        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="password" name="password" type="password" class="input"  placeholder="" value="" required>
          <p style="color:red"><?php echo $password_error ;?></p>
        </div>


        <div class="group">
                <label for="pass" class="label">System</label>
                <select class="input custom-select d-block w-100" name="system" required>
                  <option value="">Choose One System ... </option>
                  <option>a</option>
                  <option>b</option>
                  <option>c</option>
                  <option>d</option>
                </select>
                <br>
                <label for="pass" class="label">Viewpoint </label>
                <input class="input" list="Viewpoint" name="viewpoint" required>
                  <datalist id="Viewpoint">
                    <option>a</option>
                    <option>b</option>
                    <option>c</option>
                    <option>d</option>
                  </datalist>
                  <br>
                <label for="pass" class="label">Model</label>
                <input class="input plus" list="Model" name="model" required>
                  <datalist id="Model">
                    <option>a</option>
                    <option>b</option>
                    <option>c</option>
                    <option>d</option>
                  </datalist>

        </div>




        <div class="group">
          <button name="register_confirm" type="submit" class="button" >Sign Up</button>
        </div>







        <div class="hr"></div>






      </form>
    </div>
  </div>
</div>


  
  

</body>
</html>