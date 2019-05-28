<!-- https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css  -->
<?php
session_start();
$bdd= new PDO("mysql:host=localhost;dbname=DBacters","root","");
//----------------------------------------
   if(isset($_POST['submit'])){
    $file=$_FILES["file"];

      $fileName = $_FILES['file']['name'];
      $fileSize =$_FILES['file']['size'];
      $fileTmpName =$_FILES['file']['tmp_name'];
      $fileType=$_FILES['file']['type'];
      $fileError=$_FILES['file']['error'];

      $fileExt=explode('.',$fileName);
      $fileActualExt=strtolower(end($fileExt));

      $allowed = array("jpeg","jpg","png","pdf");
      

      if(in_array($fileActualExt,$allowed)){
         if($fileError === 0){
         if($fileSize < 1000000){
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          $fileDestination = 'uploads/'.$fileNameNew ;
          move_uploaded_file($fileTmpName,$fileDestination);
          //-----------------------------------------------------

          //------------------------------------
          $req=$bdd->query("insert into list (proposal,description,status,acter) values ('".$fileName."','".$fileDestination."','statut1','acter1')");

          
          //-------------------------------
       }else{
       echo "Your file is too big !";
     }
       }else{
       echo "there was an error uploading your file !";
     }
      }else{
      echo "You cannot upload files of this type";
      }
  }
//---------------------------------------
          $reqq=$bdd->query("select * from list");
          $roww=$reqq->fetch();

          $_SESSION['id_proposal']=$roww['id_proposal'];
          $_SESSION['proposal']=$roww['proposal'];
          $_SESSION['description']=$roww['description'];
          $_SESSION['status']=$roww['status'];
          $_SESSION['acter']=$roww['acter'];

if(isset($_POST['logout'])){
  header("Location:logout.php");
}
if(isset($_POST['Contact'])){
    header("Location:home.php");
}
?>



<!DOCTYPE html>
<html>
  <head>
    <script>
      function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
      }
      function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
      }
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="csss.css">
  </head>
  <body  onload="startTime()">
  <div class="login-wr">
  <div class="login-html">
    <form method="POST" action="" enctype="multipart/form-data">
      <h4 align="right" style="padding-right:20px"> <?php echo $_SESSION["pseudoname"];?></h4>
      <h4 align="right">Due time</h4>
      <div align="right" style="padding-right:20px" id="txt"></div>
      <h4 align="center">Proposals Evaluations</h4>

      
      <br>
      <div class="hr"></div>
      <div class='group'>
        <label for="pass" >Upload a file </label><br><br>
         <input type="file" name="file" class='input'><br><br>
         <button  type="submit" name="submit" class='button' >UPLOAD</button>
      </div>


<!-------------------------------------------------------->
    <br><br><br><br>
    <label for="pass" >List </label><br><br>
      <div class="tableFixHead">
  <table>
    <thead class="table table-bordered">
            <tr>
              <th>acter</th>
              <th>Proposal</th>
              <th>Status</th>
              <th>Actors</th>
            </tr>
    </thead>
    <tbody>
      <?php
          $req=$bdd->query("select * from list");

          while($row=$req->fetch()){ 
            $_SESSION['id_proposal']=$row['id_proposal'];
            $_SESSION['id']=$row['id'];
            $_SESSION['proposal']=$row['proposal'];
            $_SESSION['description']=$row['description'];
            $_SESSION['status']=$row['status'];
            $_SESSION['acter']=$row['acter'];
            $id_proposal=$_SESSION['id_proposal'] ; 
            $rem=$bdd->query("select pseudoname from acters where id='".$_SESSION['id']."'");
            $riw=$rem->fetch();
            $pseudoname=$riw['pseudoname'];
            ?>
            <tr>
              <td><p><?php echo $pseudoname ;?></p></td>
              <td>
                <p><input type='submit' id='$id_proposal' name='$id_proposal' value='<?= $row['id_proposal']; ?>' >  <?= $row['proposal']; ?></p></td>
              <td><?php echo $_SESSION['status'] ;?></td>
              <td><?php echo $_SESSION['acter'] ;?></td>
            </tr>
          <?php } ?>
    </tbody>
  </table>
</div>
<!--------------------------------------------------------->
<?php
if(isset( $_POST['$id_proposal'])){
$id1=$_POST['$id_proposal'];
$req=$bdd->query("select * from list where id_proposal='".$id1."'");
$row=$req->fetch();
$_SESSION['proposal']=$row['proposal'];
$_SESSION['description']=$row['description'];
?>
 <div  class="group">
        <br><br><br><br>
        <label for="pass" >Details </label><br><br>
        <div>
            <p>Proposal<strong><?php echo "\t".$_SESSION['proposal'] ;?></strong></p>  
            <p Strong>Description<a href='<?php echo $_SESSION['description'] ; ?>' target="_blank" name=""><?php echo $_SESSION['proposal'] ;?></a></p>
            <p Strong>Initiator<p>initiator1</p></p>
            <button type="submit" name="Contact" class="button">Contact</button>
        </div>      
      </div>
<?php } ?>


<!-------------------------------------------------------------><br><br><br><br>



















        <div class="container">
        <label for="pass" >Comments </label><br><br>  
        <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="false">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel1" data-slide-to="1"></li>
            <li data-target="#myCarousel1" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <textarea  rows="6" cols="120" name="comment" form="usrform" placeholder="Enter text here..." ></textarea>
              <button type="submit" class="button">Contact</button>
            </div>
            <div class="item">
              <textarea rows="6" cols="120" name="comment" form="usrform" placeholder="Enter text here..."></textarea>
              <button type="submit" class="button">Contact</button>
            </div>        
            <div class="item">
              <textarea rows="6" cols="120" name="comment" form="usrform" placeholder="Enter text here..."></textarea>
              <button type="submit" class="button">Contact</button>
            </div>
          </div>
          <!-- Left and right controls -->
         
          <a class="right carousel-control" href="#myCarousel1" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="container">

        <br><br><label for="pass" >Perform Evaluation </label><br><br> 
        <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="false"
>
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel2" data-slide-to="1"></li>
            <li data-target="#myCarousel2" data-slide-to="2"></li>
          </ol>      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <textarea rows="6" cols="120" name="comment" form="usrform" placeholder="Enter text here..."></textarea>
              <button type="submit" class="button">Contact</button>
            </div>
            <div class="item">
              <textarea rows="6" cols="120" name="comment" form="usrform" placeholder="Enter text here..."></textarea>
              <button type="submit" class="button">Contact</button>
            </div>
            <div class="item">
              <textarea rows="6" cols="120" name="comment" form="usrform" placeholder="Enter text here..."></textarea>
              <button type="submit" class="button">Contact</button>
            </div>
          </div>        
          <!-- Left and right controls -->
          
          <a class="right carousel-control" href="#myCarousel2" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>



      <div>
        <br><br><label for="pass" >Perform Evaluation </label><br><br>
        <button type="submit" name="approve" class="button">Approve</button>
        <button type="submit" name="reject" class="button">Reject</button><br>
      </div>






      <br><br>
      <div>
        <button type="submit" class="button" id="button">Save</button>
      </div>
        <br><br>
                  <div class="group">
        <button type="submit" class="button" name="logout">logout</button>
      </div>
    </div>
    <br><br>

  </form>
</div>
</div>
  </body>
</html>