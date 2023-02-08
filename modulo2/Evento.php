<?php

use JetBrains\PhpStorm\ArrayShape;

require_once "Palestra.php";

class Evento
{
    private $nome;
    private $local;
    private $data;
    private $inicio;
    private $fim;
    private  $palestras;

    function __construct($nome, $local, $data, $inicio, $fim)
    {
        $this->nome = $nome;
        $this->local = $local;
        $this->data = $data;
        $this->inicio = $inicio;
        $this->fim = $fim;
        $this->palestras = [];
    }

    function addPalestra(Palestra $palestra)
    {
        $this->palestras[] = $palestra;
    }

    private function getPalestras()
    {
        $msg = '';
        
        if(sizeof($this->palestras) == 0)
        {
            $msg = "\nNenhuma palestra cadastrada";
        }else{
            $msg .= "\nLista de palestras: ";
            foreach($this->palestras as $palestra)
            {
                $msg .= "\n{$palestra->getInformacoesPalestra()}";
            }
        }

        return $msg;
    }

    function getInformacoesEvento()
    {
        return "---- Evento {$this->nome} ----\nLocal: {$this->local}\nData: {$this->data}\nInicio: {$this->inicio}\nFim: {$this->fim}{$this->getPalestras()}";
    }
}