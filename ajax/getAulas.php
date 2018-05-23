<?php

include("../classes/conexao.php");
extract($_REQUEST);

$con = new Conexao();
$sql = "SELECT  aula.id, aula.assunto_aula, turma.nome, data_aula, turma_id FROM aula inner join turma on turma.id = aula.turma_id WHERE turma_id = $id_turma";


$res = $con->consulta($sql);
if (mysql_num_rows($res) > 0) {
    while ($row = mysql_fetch_assoc($res)) {
        echo '<tr><td><a href="completaraula.php?aula='.$row["id"].'">'.date('d/m/Y', strtotime($row["data_aula"])).'</a></td>';
        echo '<td>'.$row["assunto_aula"].'</td>';
        echo '<td><a href="gerar_pdf.php?idaula='.$row["id"].'" target="_blank">Baixar PDF</a></td>';
        echo '<td><a href="?exc='.$row["id"].'">x</a></td></tr>';
        
    }
} else if (mysql_num_rows($res) <= 0) {
    echo '<option value=""></option>';
}

?>