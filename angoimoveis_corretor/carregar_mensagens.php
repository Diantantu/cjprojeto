<?php
include('classes/DB.php');

//Pegar as mensagens de um usuario e retornar
$mensagens = array();
if(isset($_GET['i'])){
    $id = $_GET['i'];
    $sql = "SELECT conversa.mensagem, conversa.data, conversa.remetente, conversa.visto
    FROM conversa left join usuario on conversa.cliente=usuario.id WHERE corretor=?";
    $conversas = DB::pesquisar($sql, [$id]);
    $counter = 0;
    foreach($conversas as $conversa){
       $mensagem = array('data'=>$conversa['data'], 'mensagem'=>$conversa['mensagem'],
        'saida'=>$conversa['remetente'], 'visualizado'=>$conversa['visto'] );

        $mensagens[$counter] = $mensagem;
        $counter++;
    }
    echo json_encode($mensagens);




}