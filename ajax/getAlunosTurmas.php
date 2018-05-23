<?php

          include_once("classes/conexao.php");
          $con = new Conexao();
          $res = $con->consulta("select ta.nome_aluno, ta.id from aula a inner join turma_aluno ta on (ta.turma_id = a.`turma_id`) where a.id = ".$_GET["aula"]);
          echo "select ta.nome_aluno, ta.id from aula a inner join turma_aluno ta on (ta.turma_id = a.`turma_id`) where a.id = ".$_GET["aula"];
          if (mysql_num_rows($res) > 0) {
          while ($row = mysql_fetch_array($res)) {
            echo "<tr><td><input type='checkbox' name='marcapresenca' value='".$row["id"]."'/></td>";
            echo "<td>".$row["nome_aluno"]."</td></tr>";
           
            }
          }
          ?>