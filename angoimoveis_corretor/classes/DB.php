<?php
class DB 
{
    public static function conecta()
    {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=aluguer_casas;charset=utf8", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function inserir($comando, $parametros = array())
    {
        $comandoSql = self:: conecta()->prepare($comando);
        $comandoSql->execute($parametros);
    //     $dados = $comandoSql->fetchAll();
    //     return $dados;
     }

     public static function pesquisar($comando, $parametros = array())
     {
         $comandoSql = self:: conecta()->prepare($comando);
         $comandoSql->execute($parametros);                                                      
         $resultado = $comandoSql->fetchAll();
         return $resultado;

     }
}