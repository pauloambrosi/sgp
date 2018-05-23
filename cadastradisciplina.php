<?php
session_start();

if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
}
else {header("location:index.php");}

include_once("classes/conexao.php");
$con = new Conexao();

if(isset($_POST["criadisc"])){


  extract($_POST);

  $res = $con->consulta("insert into turma (nome, professor_id) values ('$nomedisc',". $_SESSION['id'] . ")");

  if ($res){
   echo "<script> alert('Disciplina criada com sucesso!'); </script>";
  }

  
 

}

if(isset($_GET["id"])){
  $resapagou = $con->consulta('delete from turma where id = '. $_GET['id']);

  if ($resapagou){
    echo '<script>alert("Disciplina excluida com sucesso!"); location.href="cadastradisciplina.php"</script>';
  }
  
}
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

<body>
  <script>
 
  </script>
  <!-- Navbar -->
  <div class="align-items-center d-flex cover section-aquamarine py-5" style="background-image: url(&quot;assets/restaurant/cover_light.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-3 p-4 bg-light">
          <h4 class="mb-4 text-center">Cadastrar Disciplina</h4>
          <div class="form-group">

          <table class="table">
          <?php
           $res1 = $con->consulta("select * from turma where professor_id = ".$_SESSION['id']);
           while ($row = mysql_fetch_array($res1)) {
             echo "<tr> <td>". $row['nome'] . "</td> <td> <a href='cadastradisciplina.php?id=". $row['id'] ."' class='btn btn-secondary' role='button'/> x </a></td> </tr>";
           }
          ?>
          
          </table>
          <form method="post" action="#">
            <input class="form-control" id="nomedisc" name="nomedisc" placeholder="Nome da disciplina"> </div>
        
          <input type="submit" name="criadisc" class="btn mt-4 btn-block p-2 btn-primary" value="Criar">
          </form>
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
            <a class="nav-link text-light" href="index.php" src="">Sair
              <br> </a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-light" href="cadastradisciplina.php">Cadastrar disciplina</a>
          </li>
          <li class="nav-item mx-3">
            <a class="nav-link text-light" href="cadastraalunos.php">Cadastrar aluno</a>
          </li>
           <li class="nav-item mx-3">
            <a class="nav-link text-light" href="aulas.php">Aulas</a>
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