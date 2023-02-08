<?php
require_once "Palestra.php";

class Participante
{
    protected $nome;
    protected $fone;
    protected $endereco;
    protected $email;
    protected $palestrasObservador;


    function __construct($nome, $fone, $endereco, $email)
    {
        $this->nome = $nome;
        $this->fone = $fone;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->palestrasObservador = [];
    }

    function addPalestrasObservador(Palestra $palestra)
    {
        $this->palestrasObservador[] = $palestra;
    }

    function getNome()
    {
        return $this->nome;
    }
}