<?php
echo menupersistente();
//echo abertura();
//echo menuiniciar();

function botaoiniciar(){
    $jsonData = '{
        "get_started":{
        "payload":"comecar"
        }
    }';   
    return envia($jsonData);
}
function boasvindas(){
    $jsonData = '{
      "setting_type":"greeting",
      "greeting":{
        "text":"Olá, {{user_first_name}}! Eu sou o Sedexbot. Nos Correios enviamos muito mais que produtos. São carinhos e histórias através do produto. Venha conhecer o que ofertamos. Para que eu possa te ajudar, clique no botão Começar."
      }
    }';   
    return envia($jsonData);
}
//https://developers.facebook.com/docs/messenger-platform/reference/messenger-profile-api/persistent-menu
function menupersistente(){
    $jsonData = 
    '{
      "setting_type": "call_to_actions",
      "thread_state": "existing_thread",
      "call_to_actions": [
        {
          "type": "postback",
          "title": "Voltar ao início",
          "payload": "voltaraoinicio"
        },
        {
          "type": "postback",
          "title": "Chamar um atendente",
          "payload": "chamaratendente"
        },
        {
          "type": "postback",
          "title": "Ajuda",
          "payload": "ajuda"
        }
      ]}';
    envia($jsonData);
}

function envia($jsonData){
    //$url = 'https://graph.facebook.com/v2.6/me/thread_settings?access_token=EAACLenaZAe3gBADt6DovfeymRV2lUZAYxElZB0hHCgQBPo8mzMdJZBEUBpDUVg87nm9Gmp8YsPbZAFKSWKzkGe0nZBRuVGZAswaQ6ph2B1H5f43HQblX5Dc3oWTj91abm59d2kIlISSuDyhxo0ZBpMdUMguRPG1mqyS6owhytjEcDgZDZD';
    $url = 'https://graph.facebook.com/v2.6/176677443112469/thread_settings?access_token=EAACLenaZAe3gBADt6DovfeymRV2lUZAYxElZB0hHCgQBPo8mzMdJZBEUBpDUVg87nm9Gmp8YsPbZAFKSWKzkGe0nZBRuVGZAswaQ6ph2B1H5f43HQblX5Dc3oWTj91abm59d2kIlISSuDyhxo0ZBpMdUMguRPG1mqyS6owhytjEcDgZDZD';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    return curl_exec($ch);
}
