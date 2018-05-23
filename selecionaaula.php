<?php
session_start();

if(isset($_SESSION["id"]) && !empty($_SESSION['id'])) {
}
else {header("location:index.php");}
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
  <link rel="stylesheet" href="css/theme.css" type="text/css">
  <link rel="stylesheet" href="css/fileinput.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="aquamarine.css" type="text/css">
  <!-- Script: Make my navbar transparent when the document is scrolled to top -->
  <script src="js/navbar-ontop.js"></script>
  <!-- Script: Animated entrance -->
  <script src="js/animate-in.js"></script>
  <!-- Modernizer -->
</head>

<body>
  <!-- Navbar -->
  <div class="align-items-center d-flex cover section-aquamarine py-5" style="background-image: url(&quot;assets/restaurant/cover_light.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-3">
          <form class="p-4 bg-light" method="post" action="">
            <h4 class="mb-4 text-center">Selecione a disciplina</h4>
            <div class="btn-group btn-group-lg"> <select class="btn btn-outline-primary dropdown-toggle" onchange="javascript:document.getElementById('alunos').style.display='block'">
                <option value="">Selecione uma opção</option>
                <option value="Labproj">Laboratório de Projetos</option>
                <option value="eng">Engenharia de Software</option>
                <option value="bd">Banco de Dados</option>
                <option value="mtdis">Matemática Discreta</option>
                <option value="ltp2">Linguagem e Técnicas de Programação II</option>
              </select> </div>
            <p> </p>
            <div id="alunos">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <input type="checkbox" value="on"> </td>
                    <td>Paulo</td>
                  </tr>
                  <tr>
                    <td>
                      <input type="checkbox" value="on"> </td>
                    <td>Licio</td>
                  </tr>
                  <tr>
                    <td>
                      <input type="checkbox" value="on"> </td>
                    <td>Vitor</td>
                  </tr>
                  <tr>
                    <td>
                      <input type="checkbox" value="on"> </td>
                    <td>André</td>
                  </tr>
                  <tr>
                    <td>
                      <input type="checkbox" value="on"> </td>
                    <td>Luis</td>
                  </tr>
                  <tr>
                    <td>
                      <input type="checkbox" value="on"> </td>
                    <td>Alex</td>
                  </tr>
                  
                  
                </tbody>
              </table>
             
             
             <div class="form-group"> <label>Assunto da Aula<br></label>
            <input class="form-control" placeholder="Nome da disciplina"> </div>
            <br>
            <div class="form-group"> <label>Ocorrencias da Aula<br></label>
            <input class="form-control" placeholder="Nome da disciplina"> </div>
            <br>
             
             <div class="form-group"> <label>Ocorrencia do erro<br></label>
            <input class="form-control" placeholder="Nome da disciplina"> </div>
            <br>
             <div class="form-group"> <label>Imagem do erro<br></label>
              <input id="input-b1" name="input-b1" type="file" class="file">
              </div>
              <br>
              
              <br>
              <br>
              <div class="alert alert-success" role="alert" id="popupOK" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                <h4 class="alert-heading">Presenças computadas no sistema!</h4>
                <p>Caso deseje imprimir um documento comprobatório para entrega na coordenação de curso. Clique no botão abaixo.</p>
                <button type="button" class="btn btn-sm" onclick="javascript:abrePDF();"> Imprimir </button>
              </div>
              <center>
                <script>
                  function abrePDF(){
                  window.open("doc/printpdf.pdf", '_blank')
                  }
                  
                function abrePopupPDF(){
                  $("#submeter").hide();
                  $("#popupOK").show();
                  
                }
                </script>
                <button type="button" class="btn mt-4 btn-block p-2 btn-primary" onclick="javascript:abrePopupPDF()" id="submeter"> Submeter </button>
              </center>
            </div>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js"></script>
  <script src="js/fileinput.js"></script>
  <script>
    $(document).on('ready', function() {
            $("#input-b1").fileinput({
              language: "pt-BR",
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                showUpload: false

            });
        });
  </script>
</body>

</php>