<?php
namespace Chats;

class Mensagens{

    private $idRemetente;
    private $remetente;
    private $mensagem;
    private $data;
   

    function __construct($idRemetente, $remetente, $mensagem,  $data)
    {
        $this->idRemetente;
        $this->remetente;
        $this->mensagem;
        $this->data;
    
    }
    public function get_mensagem() { return $this->mensagem;  }
    public function get_data() { return $this->data; }
    public function get_idRemetente(){ return $this->idRemetente;}
    public function get_remetente(){ return $this->remetente;}

}

?>