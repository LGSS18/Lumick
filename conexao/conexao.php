<?php

class BancodeDados {
    private $host = "localhost";
    private $user = "root";
    private $senha = "";
    private $banco = "lumick";
    public $con;

    function conecta(){
        $this -> con = mysqli_connect($this->host,$this->user,$this->senha,$this->banco);
        //$this -> con = @mysqli_connect($this->host,$this->user,$this->senha,$this->banco);

        if(!$this->con){
            die ("problema com a conexao");
        }
    }

    function fechar(){
        mysqli_close($this->con);
        return;
    }
}

?>