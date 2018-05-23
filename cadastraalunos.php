<?php
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
}
else {header("location:index.php");}
include_once("classes/conexao.php");
$con = new Conexao();

if(isset($_GET["exc"])){
echo "<script>var confirmaexclusao = confirm('Deseja realmente excluir esse(a) aluno(a)?'); if(confirmaexclusao == true){";
  $con->consulta("delete from turma_aluno where id=" . $_GET["exc"]);
  $con->consulta("delete from presenca where aluno_id=" . $_GET["exc"]);
  echo "window.location = 'cadastraalunos.php'}</script>";
}

if(isset($_POST["btnCadastraAluno"])){
  
  if ($_POST["selTurma"] == ""){
    echo "<script>alert('Selecione uma turma');</alert>";
  }
  else {
    $res = $con->consulta("insert into turma_aluno (nome_aluno, turma_id) values ('".$_POST['nomealuno']."', ".$_POST['selTurma'].")");
      if ($res){
      echo "<script> alert('Aluno cadastrado com sucesso!'); </script>";
     }
  }
}
?>

<head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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
$(document).ready(function() {

  $("#selTurma").change(function() {

    var idturma = $("#selTurma").val();
    $.ajax({
        url: "ajax/getAlunos.php",
        data: "id_turma=" + idturma,
        type: "post",
        success: function(retorno) {

            $("tbody").html(retorno);

        },
        error: function() {
            alert("falhou!");

        }

    })
  })
});
  </script>
  <!-- Navbar -->
  <div class="align-items-center d-flex cover section-aquamarine py-5" style="background-image: url(&quot;assets/restaurant/cover_light.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-3 p-4 bg-light">
          <h4 class="mb-4 text-center">Cadastrar Alunos</h4>

          <div class="btn-group btn-group-lg">
          <form method="post" action="#" >
          <select class="btn btn-outline-primary dropdown-toggle" id="selTurma" name="selTurma">
                <option value="0">Selecione a disciplina</option>
                <?php
                  $con = new Conexao();
                  $query = "select * from turma where professor_id = ".$_SESSION['id'];
                  $res = $con->consulta($query);
                  while ($row = mysql_fetch_array($res)) {
                    echo "<option value='".$row["id"]."'>".$row["nome"]."</option>";
                  }
                ?>
              </select> </div>
          <br>
          <br>
          <div id="alunos">
            <table class="table">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                
                
              </tbody>
            </table>
          </div>
          
          <div class="form-group"> <label>Inserir Aluno<br></label>
            <input type="text" name="nomealuno" id="nomealuno" class="form-control" placeholder="Nome do aluno"> </div>
          <button type="submit" id="btnCadastraAluno" name="btnCadastraAluno" class="btn mt-4 btn-block p-2 btn-primary" onclick=""><b>Inserir aluno</b></button>
        
        </div>
        </form>
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
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js"></script>
</body>

</php>