<php>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE settings -->
    <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
    <title>SGP
    </title>
    <meta name="description" content="Free Bootstrap 4 Pingendo Aquamarine template for restaurant and food">
    <meta name="keywords" content="Pingendo restaurant food aquamarine free template bootstrap 4">
    <!-- CSS dependencies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="aquamarine.css" type="text/css">
    <!-- Script: Make my navbar transparent when the document is scrolled to top -->
    <script src="js/navbar-ontop.js">
    </script>
    <!-- Script: Animated entrance -->
    <script src="js/animate-in.js">
    </script>
  </head>
  <body>
    <!-- Navbar -->
    <div class="align-items-center d-flex cover section-aquamarine py-5" style="background-image: url(&quot;assets/restaurant/cover_light.jpg&quot;);">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-3 p-4 bg-light">
            <h4 class="mb-4 text-center">Cadastrar
            </h4>
            <?php
include_once("classes/conexao.php");
if (isset($_POST["cadastraProf"])) {
$con = new Conexao();
extract($_POST);
$res = $con->consulta("select * from professor where email = '$email@unifacs.br'");
if (mysql_num_rows($res) == 0){
$res2 = $con->consulta("insert into professor (nome, email, matricula, senha) values ('$nome', '$email@unifacs.br', '$matricula','". md5($senha)."')");
if ($res2 == true) {
echo '<script>alert("Cadastro realizado com sucesso. Faça seu login!"); location.href="index.php";</script>';
}
else {
echo '<script>alert("Algo de errado aconteceu no cadastro, tente novamente!");</script>';
}
}
else {
echo '<script>alert("Já existe um cadastro com esse email!!"); location.href="cadastrar.php"</script>' ;
}
}
?>
            <form method="post" action="">
              <div class="form-group"> 
                <label>Nome
                </label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome"> 
              </div>
              <div class="form-group"> 
                <label>Matricula
                </label>
                <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Matricula"> 
              </div>
              <div class="form-group"> 
                <label>E-mail
                </label>
                <div class="input-group">
                  <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" required="">
                  <div class="input-group-prepend"> 
                    <span class="input-group-text" id="inputGroupPrepend2">@unifacs.br
                    </span> 
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <label>Senha
                </label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha"> 
              </div>
              <input type="submit" name="cadastraProf" id="cadastraProf" class="btn mt-4 btn-block p-2 btn-primary" value="Enviar" />
              </div>
            </form>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
          <span class="navbar-toggler-icon">
          </span> 
        </button>
        <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item mx-3">
              <a class="nav-link text-light" href="index.php" src="">Sair
                <br> 
              </a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-light" href="cadastradisciplina.php">Cadastrar disciplina
              </a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-light" href="cadastraalunos.php">Cadastrar aluno
              </a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-light" href="aulas.php">Aulas
              </a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#venue">
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Cover -->
    <!-- Intro -->
    <!-- Gallery -->
    <div class="">
      <div class="container-fluid">
      </div>
    </div>
    <!-- Menu -->
    <!-- Carousel reviews -->
    <!-- Carousel venue -->
    <!-- Events -->
    <!-- Parallax section -->
    <!-- Footer -->
    <!-- JavaScript dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- Script: Smooth scrolling between anchors in the same page -->
    <script src="js/smooth-scroll.js">
    </script>
  </body>
</php>
