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
        echo '<tr><td><input type="checkbox" name="idaluno" value="'.$row["id"].'"></td>';
        echo '<td>'.$row["nome_aluno"].'</td></tr>';
        
    }
} else if (mysql_num_rows($res) <= 0) {
    echo '<option value=""></option>';
}

?>