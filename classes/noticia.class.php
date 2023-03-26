<?php
// Classe para representar uma notícia
class Noticia {
    public $titulo;
    public $resumo;
    public $imagem;
    public $data_publicacao;

    public function __construct($titulo, $resumo, $imagem, $data_publicacao) {
        $this->titulo = $titulo;
        $this->resumo = $resumo;
        $this->imagem = $imagem;
        $this->data_publicacao = $data_publicacao;
    }
}
?>