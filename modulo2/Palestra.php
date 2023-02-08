<?php

require_once "Ministrante.php";

class Palestra
{
    private $nome;
    private $data;
    private $turno;
    private $duracao;
    private $tema;
    private $sala;
    private Ministrante $ministrante;

    function __construct($nome, $data, $turno, $duracao, $tema, $sala)
    {
        $this->nome = $nome;
        $this->data = $data;
        $this->turno = $turno;
        $this->duracao = $duracao;
        $this->tema = $tema;
        $this->sala = $sala;
    }

    function getNome()
    {
        return $this->nome;
    }

    function setMinistrante(Ministrante $ministrante)
    {
        if(isset($this->ministrante))
        {
            $this->ministrante->removePalestraOrador($this->gerarCodigo());
        }
        $this->ministrante = $ministrante;
        $this->ministrante->addPalestrasOrador($this);
    }

    function getMinistrante()
    {
        if(isset($this->ministrante))
        {
            return $this->ministrante->getNome();
        }
        else
        {
            return "Ainda não contratado";
        }
    }


    function gerarCodigo()
    {
        return $this->nome . $this->data . $this->sala;
    }

    function getInformacoesPalestra(){
        return "-{$this->nome}\n--Palestrante: {$this->getMinistrante()}\n--Data: {$this->data}\n--Turno: {$this->turno}\n--Duração: {$this->duracao}\n--Tema: {$this->tema}\n--Sala: {$this->sala}";
    }
}