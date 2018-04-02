<?php
function iniabertura($Nome = ""){
    return '"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"generic",
                    "elements":[
                        {
                            "title":"Ol\u00e1, "'.$Nome.'"! Sou o Atendente Virtual dos Correios.",
                            "item_url":"",
                            "image_url":"https:\/\/botcor.tk\/willsbq\/logo.jpg"
                        }
                    ]
                }
            }
            ';

}
function BtMenuInicial() {
    return '"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                    {
                        "type":"postback",
                        "title":"Verificar Encomendas",
                        "payload":"verificarencomendas"
                    },
                    {
                        "type":"postback",
                        "title":"Reclama\u00e7\u00f5es",
                        "payload":"reclamacoes"
                    },
                    {
                        "type":"postback",
                        "title":"Produtos e Servi\u00e7os",
                        "payload":"produtoseservicos"
                    }
                    ]
                }
            }
            ';
}

function BtMenuVerificarEncomendas() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Nacional",
                            "payload":"nacional"
                        },
                        {
                            "type":"postback",
                            "title":"Internacional",
                            "payload":"internacional"
                        }
                    ]
                }
            }
            }';
}
// Botão Menu Verificar Encomendas Nacional
function BtMenuVENacional() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Rastrear Encomenda",
                            "payload":"rastrearencomendanac"
                        },
                        {
                            "type":"postback",
                            "title":"Pre\u00e7os e Prazos",
                            "payload":"precoseprazos"
                        },
                        {
                            "type":"postback",
                            "title":"Mais Informa\u00e7\u00f5es",
                            "payload":"maisinformacoes"
                        }
                    ]
                }
            }
            }';
}

function BtMenuVEInternacional() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                    {
                        "type":"postback",
                        "title":"Rastrear Encomenda",
                        "payload":"rastrearencomendainter"
                    },
                    {
                        "type":"postback",
                        "title":"Prazos",
                        "payload":"prazos"
                    },
                    {
                        "type":"postback",
                        "title":"Minhas Importa\u00e7\u00f5es+1",
                        "payload":"minhasimportacoes"
                    }
                    ]
                }
            }
            }';
}

function BtMenuReclamacoes() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Consultar Reclama\u00e7\u00e3o",
                            "payload":"consultarreclamacao"
                        },
                        {
                            "type":"postback",
                            "title":"Voltar ao In\u00edcio",
                            "payload":"voltaraoinicio"
                        },
                        {
                            "type":"postback",
                            "title":"Mais Informa\u00e7\u00f5es",
                            "payload":"maisinformacoes"
                        }
                    ]
                }
            }
            }';
}

function BtMenuProdutoseServicos() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Servi\u00e7os Digitais",
                            "payload":"servicosdigitais"
                        },
                        {
                            "type":"postback",
                            "title":"Consultas",
                            "payload":"consultas"
                        },
                        {
                            "type":"postback",
                            "title":"Outras Informa\u00e7\u00f5es",
                            "payload":"outrainformacoes"
                        }
                    ]
                }
            }
            }';
}

function BtMenuPSServicosDigitais() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Enviar Telegrama",
                            "payload":"enviartelegrama"
                        },
                        {
                            "type":"postback",
                            "title":"Correios Celular",
                            "payload":"correioscelular"
                        },
                        {
                            "type":"postback",
                            "title":"Outros Servi\u00e7os",
                            "payload":"outrosservi\u00e7os"
                        }
                    ]
                }
            }
            }';
}

function BtMenuPSConsultas() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Busca Cep",
                            "payload":"buscacep"
                        },
                        {
                            "type":"postback",
                            "title":"Busca Ag\u00eancias",
                            "payload":"buscaagencias"
                        },
                        {
                            "type":"postback",
                            "title":"Pre\u00e7os e Prazos",
                            "payload":"precoseprazos"
                        }
                    ]
                }
            }
            }';
}

function BtMenuPSOutrasInformacoes() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Como Postar",
                            "payload":"comopostar"
                        },
                        {
                            "type":"postback",
                            "title":"Modalidade Envio",
                            "payload":"modalidadeenvio"
                        },
                        {
                            "type":"postback",
                            "title":"Trabalhe Conosco",
                            "payload":"trabalheconosco"
                        }
                    ]
                }
            }
            }';
}

// Botão Menu Nacional Internacional Mais informações
function BtMenuNIMaisInformacoes() {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"Escolha uma das op\u00e7\u00f5es abaixo",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Registrar Reclama\u00e7\u00e3o",
                            "payload":"registrarreclamacao"
                        },
                        {
                            "type":"postback",
                            "title":"Consultar Reclama\u00e7\u00e3o",
                            "payload":"consultarreclamacao"
                        },
                        {
                            "type":"postback",
                            "title":"Tenho Mais D\u00favidas",
                            "payload":"tenhomaisduvidas"
                        }
                    ]
                }
            }
            }';
}

function today1(){
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"list",
                    "elements":[
                        {
                            "title":"Classic T-Shirt Collection",
                            "image_url":"https:\/\/www.cloudways.com\/blog\/wp-content\/uploads\/Migrating-Your-Symfony-Website-To-Cloudways-Banner.jpg",
                            "subtitle":"See all our colors",
                            "default_action":
                                {
                                    "type":"web_url",
                                    "url":"https:\/\/www.cloudways.com\/blog\/migrate-symfony-from-cpanel-to-cloud-hosting\/",
                                    "webview_height_ratio":"tall"
                                },
                            "buttons":[
                                {
                                    "type":"web_url",
                                    "url":"https:\/\/petersfancybrownhats.com",
                                    "title":"View Website"
                                }
                            ]
                        },
                        {
                            "title":"Welcome to Peter\\s Hats",
                            "item_url":"https:\/\/www.cloudways.com\/blog\/migrate-symfony-from-cpanel-to-cloud-hosting\/",
                            "image_url":"https:\/\/www.cloudways.com\/blog\/wp-content\/uploads\/Migrating-Your-Symfony-Website-To-Cloudways-Banner.jpg",
                            "subtitle":"We\\ve got the right hat for everyone.",
                            "buttons":[
                                {
                                    "type":"web_url",
                                    "url":"https:\/\/petersfancybrownhats.com",
                                    "title":"View Website"
                                }
                            ]
                        },
                        {
                            "title":"Welcome to Peter\\s Hats",
                            "item_url":"https:\/\/www.cloudways.com\/blog\/migrate-symfony-from-cpanel-to-cloud-hosting\/",
                            "image_url":"https:\/\/www.cloudways.com\/blog\/wp-content\/uploads\/Migrating-Your-Symfony-Website-To-Cloudways-Banner.jpg",
                            "subtitle":"We\\ve got the right hat for everyone.",
                            "buttons":[
                                {
                                    "type":"web_url",
                                    "url":"https:\/\/petersfancybrownhats.com",
                                    "title":"View Website"
                                }
                            ]
                        }
                    ]
                }
            }
            }';
}

function Botao($text,$Url,$Title,$Payload) {  
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"'.$text.'",
                    "buttons":[
                        {
                            "type":"web_url",
                            "url":"'.$Url.'",
                            "title":"'.$Title.'"
                            
                        },
                        {
                            "type":"postback",
                            "title":"'.$Title.'",
                            "payload":"'.$Payload.'"
                        }
                    ]
                }
            }
            }';
}
function blog($title,$item_url,$image_url,$subtitle,$url,$payload){
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"generic",
                    "elements":[
                        {
                            "title":"$title",
                            "item_url":"$item_url",
                            "image_url":"$image_url",
                            "subtitle":"$subtitle",
                            "buttons":[
                                {
                                    "type":"web_url",
                                    "url":"$url",
                                    "title":"$title"
                                },
                                {
                                    "type":"postback",
                                    "title":"$title",
                                    "payload":"$payload"
                                }
                            ]
                        }
                    ]
                }
            }
            }';
}
function Botoess($text,$Url,$Title,$Payload) {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"$text",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"Rastrear",
                            "payload":"Rastrear"
                            
                        },
                        {
                            "type":"postback",
                            "title":"$Title",
                            "payload":"$Payload"
                        }
                    ]
                }
            }
            }';
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
    return '{"text":"$pergunta",
            "quick_replies":[
                {
                    "content_type":"text",
                    "title":"Sim",
                    "payload":"Texto",
                    "image_url":"https:\/\/botcor.tk\/willsbq\/logo.jpg"
                },
                {
                    "content_type":"text",
                    "title":"N\u00e3o",
                    "payload":"Titulo",
                    "image_url":"https:\/\/botcor.tk\/willsbq\/logo.jpg"
                }
            ]
            }';
}
function Btpostback($valor) {
    return '{"attachment":{
                "type":"template",
                "payload":{
                    "template_type":"button",
                    "text":"'.$valor[0].'",
                    "buttons":[
                        {
                            "type":"postback",
                            "title":"'.$valor[1].'",
                            "payload":"'.$valor[2].'"
                        }
                    ]
                }
            }
            }';
}

