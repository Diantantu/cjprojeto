<?php
namespace Chats;

class Usuario{
    private $id;
    private $nome;
    private $sobrenome;
    private $conversas;
    private $counter;

    function __construct($id, $nome, $sobrenome, $conversas)
    {
        $this->counter = 0;
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->conversas[$this->counter] = $conversas;
        $this->counter++;
    }
    public function get_id(){ return $this->id; }
    public function get_nome(){ return $this->nome.' '.$this->sobrenome;}
    public function get_conversas(){return $this->conversas;}
    public function add_conversa($mensagem)
    {
        $this->conversas[$this->counter] = $mensagem;
        $this->counter++;
    }

}
