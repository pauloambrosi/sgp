<?php
      session_start();

?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>SGP</title>
  <meta name="description" content="Free Bootstrap 4 Pingendo Aquamarine template for restaurant and food">
  <meta name="keywords" content="Pingendo restaurant food aquamarine free template bootstrap 4">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="aquamarine.css" type="text/css">
  <!-- Script: Make my navbar transparent when the document is scrolled to top -->
  <script src="js/navbar-ontop.js"></script>
  <!-- Script: Animated entrance -->
  <script src="js/animate-in.js"></script>
</head>
<?php


include_once("classes/conexao.php");
if (isset($_POST["logar"])) {
    $con = new Conexao();
    extract($_POST);
    $res = $con->consulta("select * from professor where email = '$user' and senha ='".md5($pass)."'");
    
    if (mysql_num_rows($res) > 0) {

      while ($row = mysql_fetch_array($res)) {      
       $_SESSION['email'] = $row['email'];
       $_SESSION['id'] = $row['id'];
       $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
       
      
       header("location:cadastradisciplina.php");
    
      }
    } else {
      unset ($_SESSION['email']);
      unset ($_SESSION['id']);
        echo '<script>alert("Cadastro não encontrado. Tente novamente ou cadastre-se"); location.href="index.php"</script>';
    }
}


?>
<body>
  <!-- Navbar -->
  <div class="align-items-center d-flex cover section-aquamarine py-5" style="background-image: url(&quot;assets/restaurant/cover_light.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 align-self-center text-lg-left text-center">
          <h1 class="mb-0 mt-5 display-4">Sistema de Gerenciamento de Presença</h1>
        </div>
        <div class="col-lg-5 p-3 p-4 bg-light">
          <form method="post" action="">
          <h4 class="mb-4 text-center">Login</h4>
          <div class="form-group"> <label>Email</label>
            <input type="text" id="user" name="user" class="form-control" placeholder="Login"> </div>
          <div class="form-group"> <label>Senha</label>
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Senha"> </div>
          <input type="submit" name="logar" id="logar" class="btn mt-4 btn-block p-2 btn-primary" value="Entrar">
        </form>
          <button type="submit" class="btn mt-1 btn-block p-2 btn-secondary" onclick="javascript:window.location.href ='cadastrar.php'"><b>Cadastrar</b></button>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item mx-3">
            <a class="nav-link text-light" href="#" src="cadastrar.php"></a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#menu"></a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#venue"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Cover -->
  <!-- Intro -->
  <!-- Gallery -->
  <div class="">
    <div class="container-fluid"></div>
  </div>
  <!-- Menu -->
  <!-- Carousel reviews -->
  <!-- Carousel venue -->
  <!-- Events -->
  <!-- Parallax section -->
  <!-- Footer -->
  <!-- JavaScript dependencies -->
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js"></script>
</body>

</php>