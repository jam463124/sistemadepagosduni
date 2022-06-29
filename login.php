<?php
include("php/dbconnect.php");

$error = '';
if(isset($_POST['login']))
{

$username =  mysqli_real_escape_string($conn,trim($_POST['username']));
$password =  mysqli_real_escape_string($conn,$_POST['password']);

if($username=='' || $password=='')
{
$error='All fields are required';
}

$sql = "select * from user where username='".$username."' and password = '".md5($password)."'";

$q = $conn->query($sql);
if($q->num_rows==1)
{
$res = $q->fetch_assoc();
$_SESSION['rainbow_username']=$res['username'];
$_SESSION['rainbow_uid']=$res['id'];
$_SESSION['rainbow_name']=$res['name'];
echo '<script type="text/javascript">window.location="index.php"; </script>';

}else
{
$error = 'Invalid Username or Password';
}

}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema de Control de Pago y Matrículas de la IEP D'UNI</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
}

h1{
    font-family:"Cambria Bold";
    text-align:center;
    font-size: 70px;
    text-shadow: 3px  0px 0px black,
               0px  1px 0px black,
              -1px  0px 0px black,
               0px -1px 0px black;
}

body {
  height: 800px;
  background-image: url("/img/logo3.jpeg");
  background-size: cover;
  background-size: 200rem;
  background-repeat: no-repeat;
  background-position: center center;
  background-attachment: fixed;
}
</style>
<h1 style="color:#FF0000">I.E.P D'UNI <img src="/img/logo2.jpeg" alt="DUNI" style="width: 90px; height:100px"></h1>
<hr>
</head>
<body>
    

    <div class="container">
        
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                          
                            <div class="panel-body" style="background-color: #E2E2E2; margin-top:50px; border:solid 3px #0e0e0e;">
							  <h3 class="myhead">Sistema de Control de Pago y Matrículas de la IEP D'UNI</h3>
                                <form role="form" action="login.php" method="post">
                                    <hr />
									<?php
									if($error!='')
									{									
									echo '<h5 class="text-danger text-center">'.$error.'</h5>';
									}
									?>
									
                                   
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Tu Usuario " name="username" required />
                                        </div>
                                        
									<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Tu Contraseña " name="password" required />
                                        </div>
										
                                     <button class="btn btn-primary" type= "submit" name="login">Ingresar</button>
                                   
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
<h3 style="text-align: center;"><strong>Todos los derechos reservados System Encoder Senior -  <span id="actual"></span></strong></h3>
<script>
    document.getElementById("actual").innerText = new Date().getFullYear();
</script>
</footer>
</html>
