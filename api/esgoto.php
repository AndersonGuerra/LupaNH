<?php

class Esgoto{

	public static function adicionar($latitude, $longitude, $esgoto){
         try{
            require_once('dados_banco.php');
            $sql = "insert into esgoto (latitude, longitude, esgoto) values (:latitude, :longitude, :esgoto)";
            $p_sql = new PDO ($dados_banco['host'],$dados_banco['usuario'], $dados_banco['senha'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $p_sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $p_sql->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            $call = $p_sql->prepare($sql);
            $call->bindValue(':latitude', $latitude);
            $call->bindValue(':longitude', $longitude);
            $call->bindValue(':esgoto', $esgoto);
            $call->execute();
            $resposta = array(
                "status" => "ok",
                "mensagem" => "Dados enviados com sucesso!"
            );
            echo json_encode($resposta);
         }catch(Exception $e){
             echo $e;
            $resposta = array(
                "status" => "erro",
                "mensagem" => "Ocorreu um erro, tente novamente em instantes!"
            );
            echo json_encode($resposta);
         }
    }
    
    public static function consultar(){
        try{
            $sql = "select * from esgoto";
            $p_sql = new PDO ('mysql:host=localhost;dbname=hiperlocal','root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $p_sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $p_sql->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            $call = $p_sql->prepare($sql);
            $call->execute();
            $dados = array();
            while($row = $call->fetch(PDO::FETCH_ASSOC)){
                $dados[] = Self::montar($row);
            }
            $resposta = array(
                "status" => "ok",
                "dados" => $dados
            );
            echo json_encode($resposta, JSON_UNESCAPED_UNICODE);
            
        }catch (Exception $e){
            $resposta = array(
                "status" => "erro",
                "mensagem" => "Ocorreu um erro, tente novamente em instantes!"
            );
            echo json_encode($resposta);
        }
    }

    public static function montar($row){
        $denuncia = array(
            "id" => $row['id'],
            "latitude" => $row['latitude'],
            "longitude" => $row['longitude'],
            "encanada" => $row['encanada'],
            "poco" => $row['poco'],
            "tipo_poco" => $row['tipo_poco']
        );

        return $denuncia;
    }

}

?>