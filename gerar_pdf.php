<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<?php    include_once("classes/conexao.php");

 include("mpdf60/mpdf.php");
$con = new Conexao();

$sqlaula = "select a.data_aula, a.data_registro, a.assunto_aula, a.imagem_erro, a.descricao_erro, a.ocorrencia, 
t.nome nometurma, 
p.nome nomeprofessor, p.email
from aula a
inner join turma t on (t.id = a.turma_id)
inner join professor p on (t.professor_id = p.id)
where a.id = ". $_GET["idaula"];

$sqlpresenca = "select nome_aluno from presenca p 
inner join turma_aluno a on (p.aluno_id = a.id)
where aula_id = ". $_GET["idaula"];
//echo $sql ;

$dadosAula = $con->consulta($sqlaula);
$arrayDadosAula = $con->resultAssoc($dadosAula);

$dadosPresenca = $con->consulta($sqlpresenca);
$arrayDadosPresenca = array();

while ($cont  = $con->resultAssoc($dadosPresenca)){
    array_push($arrayDadosPresenca, $cont);
}


 $html= "<center>
 <div id='conteudocompleto'>
<h1>
Registro da aula do dia ". date("d/m/Y", strtotime($arrayDadosAula["data_aula"]))." </h1>
<h3> Professor: </h3>".$arrayDadosAula["nomeprofessor"]."<br> <h3>Disciplina:</h3> ".$arrayDadosAula["nometurma"]."
<h3>Assunto da aula:</h3> " .$arrayDadosAula["assunto_aula"]."
<h3>Alunos Presentes</h3>
<table class='table table-hover'>
";

foreach($arrayDadosPresenca as $aluno){
$html .= "<tr><td>".$aluno["nome_aluno"]."</td></tr>";

}

$html .= "
</table>
";

if($arrayDadosAula["descricao_erro"] != ""){
    $html .="
<h3>Erro ocorrido: </h3>
".$arrayDadosAula["descricao_erro"]."<br>";
}
if($arrayDadosAula["imagem_erro"] != ""){
$html .= "<h3>Imagem do erro ocorrido: </h3>
<img src='".$arrayDadosAula["imagem_erro"]."' height='100'/>";

}
$html .="<br><br><br>
</div>

</center>
";


$mpdf=new mPDF(); 
 $mpdf->SetDisplayMode('fullpage');
 $css = file_get_contents("css/geradorpdf.css");
 $mpdf->WriteHTML($css,1);
 $mpdf->WriteHTML($html);
 $mpdf->WriteFixedPosHTML('
 __________________________________________________
', 67, 260, 150, 90, 'auto');
$mpdf->WriteFixedPosHTML('
 Assinatura do professor
', 90, 270, 150, 90, 'auto');
 $mpdf->Output();

 exit;
?>