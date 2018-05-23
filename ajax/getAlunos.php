<?php

include("../classes/conexao.php");
extract($_REQUEST);

$con = new Conexao();
$sql = "SELECT id, nome_aluno
				FROM turma_aluno
                                WHERE turma_id = $id_turma";


$res = $con->consulta($sql);
if (mysql_num_rows($res) > 0) {
    while ($row = mysql_fetch_assoc($res)) {
        echo '<tr><td>'.$row["nome_aluno"].'</td>';
        echo '<td><a href="?exc='.$row["id"].'" class="btn btn-secondary">x</a></td></tr>';
        
    }
} else if (mysql_num_rows($res) <= 0) {
    echo '<option value=""></option>';
}

?>

