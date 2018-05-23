<?php

class Conexao {

    
    
    var $host = "localhost";
    var $usuario = 'root';
    var $senha = "";
    
    var $banco = 'sgp';
    var $conexao = null;
    var $query = null;

//conecta ao banco
    function __construct() {
        $this->conexao = mysql_connect($this->host, $this->usuario, $this->senha);
        $status = mysql_select_db($this->banco, $this->conexao);
        return $status;
    }

//executa a query
    function consulta($query) {
        $this->query = mysql_query($query);
        return $this->query;
    }

//adiciona os dados da query num array
    function resultado() {
        return mysql_fetch_array($this->query);
    }

    function resultAssoc() {
        return mysql_fetch_assoc($this->query);
    }

//conta a quantidade de registros da query
    function quantidade($query) {
        $this->query = mysql_query($query);
        $quantidade = mysql_num_rows($this->query);
        return $quantidade;
    }

    function quantidadePag($query) {
        $quantidade = mysql_num_rows($this->query);
        return $quantidade;
    }
}

?>