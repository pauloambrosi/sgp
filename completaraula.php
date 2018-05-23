<?php
   session_start();
   if(isset($_SESSION['id']) && !empty($_SESSION['id'])) {
   }
   else {header("location:index.php");}
   include_once("classes/conexao.php");
   
   $con = new Conexao();
   
   if(isset($_POST["atualizaraula"])){

        $ativo = $_POST['marcapresenca'];
        $idaula = $_GET["aula"];
   
         
          
          if($con->quantidade("select * from presenca where aula_id = $idaula") > 0){
           $con->consulta("delete from presenca where aula_id = $idaula");
          }
   
           foreach($ativo as $valor){
             $sql = "INSERT INTO presenca(aula_id, aluno_id) VALUES (".$_GET["aula"].", $valor)";
             $con->consulta($sql);   
         }

     $ativo = $_POST['marcapresenca'];
     $idaula = $_GET["aula"];
$foto = $_FILES["imagem_erro"];
      
      
       
       if($con->quantidade("select * from presenca where aula_id = $idaula") > 0){
        $con->consulta("delete from presenca where aula_id = $idaula");
       }

        foreach($ativo as $valor){
          $sql = "INSERT INTO presenca(aula_id, aluno_id) VALUES (".$_GET["aula"].", $valor)";
          $con->consulta($sql);
      }

  if (isset($_FILES["imagem_erro"])) {

        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

        $nome_imagem = time() . "." . $ext[1];

    // Caminho de onde ficará a imagem
    $caminho_imagem = "imagens_erro/" . $nome_imagem;

    // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem);
$sql = "UPDATE aula SET ocorrencia='".$_POST["ocorrencias"]."', descricao_erro='".$_POST["descricao_erro"]."', data_registro=CURDATE(), imagem_erro ='$caminho_imagem' WHERE id=$idaula";
    }
else {
    $sql = "UPDATE aula SET ocorrencia='".$_POST["ocorrencias"]."', descricao_erro='".$_POST["descricao_erro"]."', data_registro=CURDATE() WHERE id=$idaula";

}
      $res3 = $con->consulta($sql);
      if($res3){
        echo "<script> alert('Aula atualizada com sucesso!')</script>";
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
   <!-- Navbar -->
   <div class="align-items-center d-flex cover section-aquamarine py-5" style="background-image: url(&quot;assets/restaurant/cover_light.jpg&quot;);">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 p-3 p-4 bg-light">
               <h4 class="mb-4 text-center">Atualizar Aula</h4>
               <label>Marcar alunos presentes</label>
               <form method="post" action="#" enctype="multipart/form-data">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Nome aluno</th>
                        </tr>
                     </thead>
                     <tbody id="alunosCheck">
                        <?php
                           include_once("classes/conexao.php");
                           $res = $con->consulta("select ta.nome_aluno, ta.id from aula a inner join turma_aluno ta on (ta.turma_id = a.`turma_id`) where a.id = ".$_GET["aula"]);
                           if (mysql_num_rows($res) > 0) {

                           while ($row = mysql_fetch_array($res)) {
                               echo "<tr><td><input type='checkbox' name='marcapresenca[]' value='".$row["id"]."'/></td>";
                               echo "<td>".$row["nome_aluno"]."</td></tr>";
                          }
                          $res2 = $con->consulta("select aluno_id from presenca where aula_id =".$_GET['aula']);

                          echo "<script> $( \"document\" ).ready(function(){";
                          while ($imagens = mysql_fetch_assoc($res2)) {
                              echo"$(':checkbox[value=" . $imagens["aluno_id"] . "]').prop('checked', true);";
                            
                          }
                          echo "});</script>";
                           }

                           $pegaOcorrError = $con->consulta("select * from aula where id=".$_GET['aula']);
                           
                           while ($cont = mysql_fetch_assoc($pegaOcorrError)) {
                            echo "<script> $( \"document\" ).ready(function(){";

                            echo "$('#ocorrencias').val('".$cont["ocorrencia"]."');";
                            echo "$('#descricao_erro').val('".$cont["descricao_erro"]."');";
                            echo "}); </script>";
                        }
                           ?>
                     </tbody>
                  </table>
                  <div class="form-group">
                     <label>Ocorrencias da aula (se houver)</label><br>
                     <input type="text" class="form-control" name="ocorrencias" id="ocorrencias"></textarea>
                  </div>
                  <div class="form-group">
                     <label>Descrição do erro (se houver)</label><br>
                     <input type="text" class="form-control" name="descricao_erro" id="descricao_erro"></textarea>
                  </div>
                  <div class="form-group">
                     <label>Imagem do erro (se houver)</label><br>
                     <input type="file" class="form-control-file" name="imagem_erro"></textarea>
                  </div>
                  <button type="submit" class="btn mt-4 btn-block p-2 btn-primary" name="atualizaraula" id="atualizaraula"> Atualizar aula </button>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <!-- Script: Smooth scrolling between anchors in the same page -->
   <script src="js/smooth-scroll.js"></script>
</body>