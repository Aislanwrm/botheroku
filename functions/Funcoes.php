<?php
include 'functionsbotao.php';
include 'Const.php';
//https://developers.facebook.com/docs/messenger-platform/send-messages/sender-actions
function EnviaMsg($sender,$message_to_reply)
{   return corpo($sender,$message_to_reply);
    /*$jsonData='{"recipient":{"id":"'.$sender.'"},
                "message":{"text":"'.$message_to_reply.'"}
                }';
    //echo $jsonData;
    //$token = "EAACLenaZAe3gBADt6DovfeymRV2lUZAYxElZB0hHCgQBPo8mzMdJZBEUBpDUVg87nm9Gmp8YsPbZAFKSWKzkGe0nZBRuVGZAswaQ6ph2B1H5f43HQblX5Dc3oWTj91abm59d2kIlISSuDyhxo0ZBpMdUMguRPG1mqyS6owhytjEcDgZDZD
    $ch=curl_init(Urlmsg);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$jsonData);
    curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
    $res=curl_exec($ch);
    curl_close($ch);
    return $res;*/
}

function EnviaBotao($senderId,$answer){
    return corpo($senderId,$answer);
    /*$response = ['recipient'=>['id'=>$senderId],
                  'message'=>$answer    
                 ];
    $ch = curl_init(Urlmsg);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $res=curl_exec($ch);
    curl_close($ch);
    return $res;*/
}

function corpo($senderId,$answer){
    if(is_array($answer)){
        $post=['recipient'=>['id'=>$senderId],
                      'message'=>$answer    
                     ];
        $post= json_encode($post);
    }
    else{//"messaging_type": "RESPONSE"
        $post='{
                "recipient":{"id":"'.$senderId.'"},
                "message":{"text":"'.$answer.'"}
                }';
    }
    return envia($post);
}
function envia($post,$url=Urlmsg){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $res=curl_exec($ch);
    curl_close($ch);
    return $res;
}

function TiraAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

function gravArq($aGravar){
    file_put_contents('Resp.html',$aGravar, FILE_APPEND);
}

//Extrai um código de objeto de uma string
function getobjmsg($msg){
    $PadraoObj = '/[[:alpha:]]{2}[[:digit:]]{9}[[:alpha:]]{2}/';
    $msg=str_replace( [' ','-',',','/','.'], [''],$msg);
    if(preg_match($PadraoObj,$msg)){
        preg_match($PadraoObj,$msg,$obj);
        return $obj[0];
    }
    else{
        return "";
    }
}

function rastrosite($objeto){
    $postfields = ['acao' => 'track','objetos' => $objeto];
    // Inicia o cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www2.correios.com.br/sistemas/rastreamento/');
    //habilita o redirecionamento
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    // Habilita o protocolo POST
    curl_setopt ($ch, CURLOPT_POST, 1);
    // Define os parâmetros que serão enviados (acao e objetos)
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $postfields);
    // Imita o comportamento patrão dos navegadores: manipular cookies
    curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    // Define o tipo de transferência (Padrão: 1)
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    // Executa a requisição
    $store = curl_exec ($ch);
    // Define uma nova URL para ser chamada (após o envio dos dados)
    curl_setopt($ch, CURLOPT_URL, 'http://www2.correios.com.br/sistemas/rastreamento/ctrl/ctrlRastreamento.cfm?');
    // Executa a segunda requisição
    $content = curl_exec ($ch);
    curl_close ($ch);
    $DOMDocument = new DOMDocument( '1.0','UTF-8' );
    $DOMDocument->preserveWhiteSpace = false;
    $encontrado = strpos($content,'table');
    if ($encontrado == false){
        $eventos[0] = "Objeto não encontrado...";
    }
    else{
        $DOMDocument->loadhtml($content);
        libxml_clear_errors;
        $tabela = $DOMDocument->getElementsBytagName('table');
        foreach($tabela[0]->childNodes as $evento){
            $eventos[] = $evento->nodeValue;
        }
    }
    //$eventos = $DOMDocument->getElementsBytagName('table')[0]->childNodes;//[0]->nodeValue;
    return preg_replace(['/\t/','/\n/','/\f/','/\r/'], '', $eventos);
}

function gravaobj($dados){
    include 'conexaobd.php';
    $Sql = "INSERT INTO tbusuarios (id, obj, dtmax) VALUES ('".$dados[0]."','" .$dados[1]. "','" .$dados[2]."')";
    $Res = mysqli_query($bd, $Sql);
    if(mysqli_insert_id($bd)){
        return true;
    }else{
        return false;
    }
    mysqli_close($bd);
}


function leobj($id){
    include 'conexaobd.php';
    $Sql = "SELECT obj FROM tbusuarios WHERE id='". $id ."'";
    $Res = mysqli_query($bd, $Sql);
    $row = mysqli_fetch_assoc($Res);
    return $row['obj'];
    mysqli_close($bd);
}

function excluiobj($dados){
    include 'conexaobd.php';
    $Sql = "DELETE FROM tbusuarios WHERE id='". $dados[0] ."' AND obj='". $dados[1] ."'";
    return  mysqli_query($bd, $Sql); 
    mysqli_close($bd);
}
