<?php
require_once "Participante.php";
require_once "Palestra.php";

class Ministrante extends Participante
{
    private $palestrasOrador;


    function __construct($nome, $fone, $endereco, $email)
    {
        $this->nome = $nome;
        $this->fone = $fone;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->palestrasObservador = [];
        $this->palestrasOrador = [];
    }

    function addPalestrasOrador(Palestra $palestra)
    {
        $this->palestrasOrador[] = $palestra->gerarCodigo();
    }

    function listPalestraOrador()
    {
        return $this->palestrasOrador;
    }

    function removePalestraOrador(string $codigoPalestra)
    {
        $key = array_search($codigoPalestra, $this->palestrasOrador);
        unset($this->palestrasOrador[$key]);
    }
}