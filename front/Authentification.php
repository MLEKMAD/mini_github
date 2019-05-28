<?php 
session_start();
$bdd= new PDO("mysql:host=localhost;dbname=DBacters","root","");
$mot_de_passe_oublie="";
if(isset($_POST['sign_in'])){
  $inputEmail=trim(htmlspecialchars($_POST['inputEmail']));
  $inputPassword=trim(htmlspecialchars($_POST['inputPassword']));
  $inputPassword_cryped=sha1($inputPassword);

  $req =$bdd->query("select * from acters where email='".$inputEmail."' and password='".$inputPassword_cryped."'");

  $acters = $req->fetchAll();

    if (count($acters) == 1) {
    $_SESSION["id"] = $acters[0]["id"];
    $id=$_SESSION["id"];
    $_SESSION["pseudoname"]=$acters[0]["pseudoname"];
    $_SESSION["email"]=$acters[0]["email"];
    $email=$_SESSION['email'];
    $pseudoname=$_SESSION["pseudoname"];
    $req=$bdd->query("UPDATE acters SET connect = 1 WHERE id='".$_SESSION["id"]."'");
    if($_SESSION["id"]==16){
      header("Location:Proposals_Evaluationsadmin.php");
    }else{
      header("Location:Proposals_Evaluations.php");
    }
  } else {
    $mot_de_passe_oublie="Le mot de passe est incorrect !";
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
      <link rel="stylesheet" href="app.css">

  
</head>

<body>

  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1"  type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
    <div class="login-form">
      <form class="sign-in-htm" action=" " method="POST">
        <div class="group">
          <label for="inputEmail" class="label">Email</label>
          <input id="inputEmail" name="inputEmail" type="email" class="input" placeholder="Email address" required autofocus>
        </div>
        <div class="group">
          <label for="inputPassword" class="label">Password</label>
          <input id="password" name="inputPassword" type="password" class="input" data-type="password"placeholder="Password" required>
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <div class="group">
          <button type="submit" name="sign_in" class="button" value="">Sign In</button>
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div><br><br>
        <div class="foot-lnk">
          <a href="sign_in.php">You don't have an account?</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>