<?php

function iniabertura($Nome = ""){
    $answer = ["attachment"=>[
          "type"=>"template",
          "payload"=>[
            "template_type"=>"generic",
            "elements"=>[
              [
                "title"=>"Olá, ".$Nome."! Sou o Atendente Virtual dos Correios.",
                "item_url"=>"",
                "image_url"=>'https://botcor.tk/willsbq/logo.jpg',
              ]       
            ]    
          ]     
        ]];
    return $answer; 
} 

function BtMenuInicial() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Para que eu possa te ajudar escolha uma das opções abaixo',
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>'Verificar Encomendas',
            "payload"=>'verificarencomendas'
          ],
          [
            "type"=>"postback",
            "title"=>'Reclamações',
            "payload"=>'reclamacoes'
          ],
          [
            "type"=>"postback",
            "title"=>'Produtos e Serviços',
            "payload"=>'produtoseservicos'
          ]	
        ]
      ]
      ]];
    return $answer;
}

function BtMenuVerificarEncomendas() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Sua encomenda é Nacional ou Internacional? Clique no botão correspondente.',
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>'Nacional',
            "payload"=>'nacional'
          ],
          [
            "type"=>"postback",
            "title"=>'Internacional',
            "payload"=>'internacional'
          ]
        ]
      ]
      ]];
    return $answer;
}
// Botão Menu Verificar Encomendas Nacional
function BtMenuVENacional() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Descubra primeiro onde está sua encomenda e qual o prazo máximo para chegada ao destino. Confie nos prazos dos Correios e aguarde o tempo informado. Se estiver expirado, clique em Mais informações.',
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>'Rastrear Encomenda',
            "payload"=>'rastrearencomendanac'
          ],
          [
            "type"=>"web_url",
            "url"=>'http://www2.correios.com.br/sistemas/precosPrazos/',
            "title"=>'Preços e Prazos'
          ],
          [
            "type"=>"postback",
            "title"=>'Mais Informações',
            "payload"=>'maisinformacoes'
          ]
        ]
      ]
      ]];
return $answer;
}

function BtMenuVEInternacional() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Descubra primeiro onde está sua encomenda e qual o prazo máximo para chegada ao destino.',
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>'Rastrear Encomenda',
            "payload"=>'rastrearencomendainter'
          ],
          [
            "type"=>"web_url",
            "url"=>'http://www2.correios.com.br/sistemas/efi/consulta/precos/default.cfm',
            "title"=>'Prazos'
          ],
          [
            "type"=>"web_url",
            "url"=>'https://www.correios.com.br/encomendas-logistica/minhas-importacoes',
            "title"=>'Minhas Importações'
          ]
        ]
      ]
      ]];
return $answer;
}
//Botão Menu Verificar Encomendas Internacional Mais Informações
function BtMenuVEImaisinformacoes() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Caso verifique que sua encomenda está fora do prazo, clique no botão abaixo.',
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>'Mais Informações',
            "payload"=>'maisinformacoes'
          ]
        ]
      ]
      ]];
return $answer;
}

function BtMenuReclamacoes() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Sua encomenda está fora do prazo? Essa é uma situação que queremos evitar.',
        "buttons"=>[
          [
            "type"=>"web_url",
            "url"=>'http://www2.correios.com.br/sistemas/falecomoscorreios/acompanharAndamentoManifestacao/dsp/acompanharManifestacao.cfm',
            "title"=>'Consultar Reclamação'
          ],
          [
            "type"=>"postback",
            "title"=>'Voltar ao Início',
            "payload"=>'voltaraoinicio'
          ]
        ]
      ]
      ]];
return $answer;
}

function BtMenuProdutoseServicos() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Escolha uma das opções abaixo',
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>'Serviços Digitais',
            "payload"=>'servicosdigitais'
          ],
          [
            "type"=>"postback",
            "title"=>'Consultas',
            "payload"=>'consultas'
          ],
          [
            "type"=>"postback",
            "title"=>'Outras Informações',
            "payload"=>'outrainformacoes'
          ]
        ]
      ]
      ]];
return $answer;
}

function botao($tipo='postback') {
  /*["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Além das agências, também oferecemos serviços que você pode utilizar através do nosso site. Escolha uma das opções abaixo',
        "buttons"=>[*/
     switch ($tipo) {
         case 'postback':
          $rr=[
            "type"=>"postback",
            "title"=>'Outras Informações',
            "payload"=>'outrainformacoes'
          ];

             break;

         default:
             break;
     }
         $answer =  [
            "type"=>"web_url",
            "url"=>"http://shopping.correios.com.br/wbm/store/script/wbm2400902p01.aspx?cd_company=ErZW8Dm9i54=&cd_department=p5TkKhm55lU=",
            "title"=>'Enviar Telegrama'
          ]/*,
          [
            "type"=>"web_url",
            "url"=>"https://www.correioscelular.com.br/",
            "title"=>'Correios Celular'
          ],
          [
            "type"=>"web_url",
            "url"=>"http://shopping.correios.com.br/wbm/store/script/store.aspx?cd_company=ErZW8Dm9i54=&utm_source=CorreiosNet%20Shopping&utm_medium=Banner%20Ancora&utm_campaign=Logo%20Ancora%20CNS",
            "title"=>'Outros Serviços'
          ]
        ]
      ]
      ]]*/;
return $answer;
}

function BtMenuPSConsultas() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Escolha uma das opções abaixo',
        "buttons"=>[
          [
            "type"=>"web_url",
            "url"=>'http://www.buscacep.correios.com.br/sistemas/buscacep/BuscaCepEndereco.cfm',
            "title"=>'Busca Cep'
          ],
          [
            "type"=>"web_url",
            "url"=>'http://www2.correios.com.br/sistemas/agencias/',
            "title"=>'Busca Agências'
          ],
          [
            "type"=>"web_url",
            "url"=>'http://www2.correios.com.br/sistemas/precosPrazos/',
            "title"=>'Preços e Prazos'
          ]
        ]
      ]
      ]];
return $answer;
}

function BtMenuPSOutrasInformacoes() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Escolha uma das opções abaixo',
        "buttons"=>[
          [
            "type"=>"web_url",
            "url"=>'http://www.correios.com.br/precisa-de-ajuda/',
            "title"=>'Como Postar'
          ],
          [
            "type"=>"web_url",
            "url"=>'http://www.correios.com.br/encomendas-logistica/remessa/encomendas',
            "title"=>'Modalidade Envio'
          ],
          [
            "type"=>"web_url",
            "url"=>'http://www2.correios.com.br/institucional/concursos/correios/default.cfm',
            "title"=>'Trabalhe Conosco'
          ]
        ]
      ]
      ]];
return $answer;
}

// Botão Menu Nacional Internacional Mais informações
function BtMenuNIMaisInformacoes() {
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Sua encomenda está fora do prazo? Essa é uma situação que queremos evitar. Por isso, registre a reclamação para apuração e melhorias dos produtos e serviços dos Correios.',
        "buttons"=>[
          [
            "type"=>"web_url",
            "url"=>"http://www2.correios.com.br/sistemas/falecomoscorreios/",
            "title"=>'Registrar Reclamação'
          ],
          [
            "type"=>"web_url",
            "url"=>"http://www2.correios.com.br/sistemas/falecomoscorreios/acompanharAndamentoManifestacao/dsp/acompanharManifestacao.cfm",
            "title"=>'Consultar Reclamação'
          ],
          [
            "type"=>"postback",
            "title"=>'Tenho Mais Dúvidas',
            "payload"=>'tenhomaisduvidas'
          ]
        ]
      ]
      ]];
return $answer;
}

function BtMenuNIMaisduvidas(){
  $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>'Caso queira novamente as minhas informações, basta digitar “Chamar o Sedexbot” ou clicar abaixo.',
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>'Chamar o Sedexbot',
            "payload"=>'Chamar o Sedexbot'
          ]
        ]
      ]
      ]];
return $answer;
}

function btSimNao($pergunta,$payload){
    $answer = ["text"=> $pergunta, "quick_replies" => 
            [
                [ "content_type" => "text",
                "title" =>"Sim",
                "payload" => $payload[0],
                "image_url"=>"https://botcor.tk/willsbq/logo.jpg"
                ],

                [ "content_type" =>"text",
                "title"=> "Não",
                "payload" => $payload[1],
                "image_url"=>"https://botcor.tk/willsbq/logo.jpg"
                ]
            ]
    ];
return $answer;
}
function Btpostback($valor) {
    return ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"button",
        "text"=>$valor[0],
        "buttons"=>[
          [
            "type"=>"postback",
            "title"=>$valor[1],
            "payload"=>$valor[2]
          ]
                    ]
                ]
                            ]
            ];
}

function digitando($sender){
    return'{
    "recipient":{
      "id":"'.$sender.'"
    },
    "sender_action":"typing_on"
    }';
}