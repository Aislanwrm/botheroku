<?php
echo "Teste Heroku de novo";
include 'Functions/Funcoes.php';
//include 'Functions/conexaobd.php';
//gravaobj(['fgff','dfdfd','dfdfd']);
$hub_verify_token=null;

//file_put_contents('Repostaphp.php', $input['object'].PHP_EOL, FILE_APPEND);
if(isset($_REQUEST['hub_mode'])&&$_REQUEST['hub_mode']=='subscribe')
{
	$challenge=$_REQUEST['hub_challenge'];
	$hub_verify_token=$_REQUEST['hub_verify_token'];
	if($hub_verify_token==Token)
		header('HTTP/1.1 200 OK');
		echo $challenge;
		die;}
//Recebe resposta messenger
//$input=json_decode(file_get_contents('php://input'),true);
// Grava no arquivo o que o facebook manda
//file_put_contents('Resp.html',"|".file_get_contents("php://input")."<br><br>".PHP_EOL , FILE_APPEND);
$input=json_decode(file_get_contents('php://input'),true);
file_put_contents('Resp.html',"|".json_encode($input)."<br><br>".PHP_EOL , FILE_APPEND);
//1970
if($input){
    // Pega id de quem enviou 
    $sender=$input['entry'][0]['messaging'][0]['sender']['id'];
    // Pega id de quem recebeu 
    $recipient=$input['entry'][0]['messaging'][0]['recipient']['id'];
    // Atribui à $message a resposta do message
    $message=isset($input['entry'][0]['messaging'][0]['message']['text'])?$input['entry'][0]['messaging'][0]['message']['text']:'';
    // Atribui à $ClickBotao a resposta do message em caso de click de botão
    $postback=$input['entry'][0]['messaging'][0]['postback'];
    $quickreply=$input['entry'][0]['messaging'][0]['message']['quick_reply'];
    //Atribui à $ClickBotao o valor não nulo de  $postback ou $quickreply
    $ClickBotao=isset($postback)?$postback:$quickreply;
    // Atribui à $BotaoClicado o payload do botão clicado
    $BtClicado=$input['entry'][0]['messaging'][0]['postback']['payload'];
    // Atribui à $BtqrClicado o payload do botão quick reply clicado
    $BtqrClicado=$input['entry'][0]['messaging'][0]['message']['quick_reply']['payload'];
    //Atribui à $BotaoClicado o valor não nulo de  $BtClicado ou $BtqrClicado
    $BotaoClicado=isset($BtClicado)?$BtClicado:$BtqrClicado;
    //Informação do botão
    $infobt=explode('|', $BotaoClicado);
    $BotaoClicado = $infobt[0];
    $obj=(COUNT($infobt)>1)?$infobt[1]:''; 
    // Pega os dados do usuário do facebook
    $DadosUsuario = json_decode(file_get_contents(Urlbase.$sender.'?access_token='.Token),true);
}
//file_put_contents('Resp', "$BotaoClicado<br>", FILE_APPEND);
//Verifica se algum botão foi clicado
//envia(digitando($sender));
if($ClickBotao){
    envia(digitando($sender));
    // Verifica qual botão foi clicado pelo payload
    switch ($BotaoClicado) {
        case 'comecar'://Botão iniciar
        case 'Chamar o Sedexbot':
        case 'voltaraoinicio':
            if($BotaoClicado != 'voltaraoinicio'){
                EnviaBotao($sender,iniabertura($DadosUsuario['first_name']));
            }
            //EnviaBotao($sender,BtMenuInicial());
            EnviaBotao($sender,Btpostback(['Enviou ou está aguardando uma encomenda?','Verificar Encomenda','verificarencomendas']));
            EnviaBotao($sender,Btpostback(['Possui alguma manifestação já cadastrada?','Reclamações','reclamacoes']));
            EnviaBotao($sender,Btpostback(['Deseja informações sobre produtos e serviços dos Correios?','Produtos e Serviços','produtoseservicos']));
            break;
        //Menu inicial
        case 'verificarencomendas':
            EnviaBotao($sender,BtMenuVerificarEncomendas());
            //EnviaBotao($sender,Btpostback(['Possui alguma manifestação já cadastrada?','Reclamações','reclamacoes']));
            //EnviaBotao(Botoesquick($sender));
            break;
        case 'reclamacoes':
            EnviaBotao($sender,BtMenuReclamacoes());
            //EnviaMsg($sender,"Possui reclamação já cadastrada, consultou o andamento e ainda continuar com dúvidas? Então clique no botão abaixo");
            //EnviaBotao($sender,Btpostback(['Possui reclamação já cadastrada, consultou o andamento e ainda continuar com dúvidas? Então clique no botão abaixo','Reclamações','reclamacoes']));
            //EnviaBotao($sender,BtMenuVEImaisinformacoes());
            //EnviaBotao($sender,BtMenuNIMaisInformacoes());
            EnviaBotao($sender,Btpostback(['Possui reclamação já cadastrada, consultou o andamento e ainda continua com dúvidas? Então clique no botão abaixo','Tenho Mais Dúvidas','tenhomaisduvidas']));
            //EnviaBotao($sender,BtMenuRDuvidas());
            break;
        case 'produtoseservicos':
            EnviaBotao($sender,BtMenuProdutoseServicos());
            break;
        // Fim Menu inicial
        //Menu Verifica encomendas
        case 'nacional':
            EnviaBotao($sender,BtMenuVENacional());
            break;
        // Botão Menu Verificar Encomendas Nacional
        case 'rastrearencomendanac':
            EnviaMsg($sender,"Por favor, digite o seu codigo de rastreamento");
            break;
        case 'precoseprazos':
            //EnviaBotao($sender,BtMenuVENacional());
            break;
        case 'maisinformacoes':
            EnviaBotao($sender,BtMenuNIMaisInformacoes());
            break;
        // Fim Botão Menu Verificar Encomendas Nacional
        case 'internacional':
            EnviaBotao($sender,BtMenuVEInternacional());
            EnviaBotao($sender,BtMenuVEImaisinformacoes());
            break;
        // Botão Menu Verificar Encomendas Internacional
        case 'rastrearencomendainter':
            EnviaMsg($sender,"Por favor, digite o seu codigo de rastreamento");
            break;
        case 'prazos':
            //EnviaBotao($sender,BtMenuVENacional());
            break;
        case 'minhasimportacoes':
            //EnviaBotao($sender,BtMenuVENacional());
            break;
        case 'maisinformacoes':
            EnviaBotao($sender,BtMenuNIMaisInformacoes());
            break;
        case 'tenhomaisduvidas':
            EnviaMsg($sender,'Lamento não poder ajudar em todas as suas dúvidas. Sendo assim, deixo você com nosso atendimento humano. É só escrever como podemos te ajudar que será analisado e respondido em breve. Ah! Já deixe seu código de rastreamento ou descreva a situação de uma vez. Isso agiliza a resposta.');
            EnviaBotao($sender,BtMenuNIMaisduvidas());
            break;
        // Fim Botão Menu Verificar Encomendas Internacional
        //Fim Menu Verifica encomendas
        //Menu Produtos e Serviços
        case 'servicosdigitais':
            EnviaBotao($sender,BtMenuPSServicosDigitais());
            break;
        case 'consultas':
            EnviaBotao($sender,BtMenuPSConsultas());
            break;
        case 'outrainformacoes':
            EnviaBotao($sender,BtMenuPSOutrasInformacoes());
            break;
        //Fim Menu Produtos e Serviços
        //Menu Mais Informações
        case 'registrarreclamacao':
            
            break;
        case 'consultarreclamacao':
            
            break;
        //Fim Menu Mais Informações
        //Menu verifica se o objeto está correto
        case 'simobjc':
            EnviaMsg($sender,'Um momento enquanto verifico');
            //$obj = leobj($sender);
            $res=rastrosite($obj);//OF109829129BR
            //gravArq($res[0]);
            EnviaMsg($sender,$res[0]);
            break;
        case 'naoobjc':
            EnviaMsg($sender,'Por favor, digite o código correto');
            //excluiobj([$sender,$obj]);
            break;
    }
}//if($ClickBotao)

// Verifica se foi enviada mensagem
if($message && !$quickreply){ //&& $sender !== "176677443112469"
    envia(digitando($sender));
    //enviamsg($sender,"Quem mandou um $message?");
    //gravarq("Sender= $sender |  mensagem= $message<BR>");
    //Separa a mensagem em palavras e tira acentos e coloca tudo em minúscula
    
    //$words = explode(" ", strtolower(TiraAcentos(strtolower($message))));
    $words = TiraAcentos(strtolower($message));
    switch($words){
        case 'oi':
        case 'ola':
        case 'chamar o sedexbot':
            EnviaBotao($sender,iniabertura($DadosUsuario['first_name']));
            EnviaBotao($sender,Btpostback(['Enviou ou está aguardando uma encomenda?','Verificar Encomenda','verificarencomendas']));
            EnviaBotao($sender,Btpostback(['Deseja informações sobre produtos e serviços dos Correios?','Produtos e Serviços','produtoseservicos']));
            EnviaBotao($sender,Btpostback(['Possui alguma manifestação já cadastrada?','Reclamações','reclamacoes']));
            //enviamsg($sender,'oi');
            //Enviabotao($sender,iniabertura($DadosUsuario['first_name']));
            //Enviabotao($sender,BtMenuInicial());
            break;
    	case 'tchau':
        case 'ate mais':
            //if(($words[0] == 'ate' && $words[1] == 'mais') || $words[0] == 'tchau'){
                EnviaMsg($sender, "Tchau, ".$DadosUsuario['first_name']."! Até a próxima.");
            //}
            break;
	default:
            // Verifica se foi enviado algum código de objeto
            if(strlen($message) > 13){
                $obj = getobjmsg($message);
                if ($obj !== ""){
                    //gravaobj([$sender,$obj]);
                    EnviaBotao($sender,btSimNao("O código ".$obj." está correto?",["simobjc|$obj","naoobjc"]));
                }
                else{
                    if (strlen($message) == 13){
                        enviamsg($sender,'Por favor, digite o código corretamente');
                    }
                }
            }
            else{
                EnviaMsg($sender,'Um momento enquanto verifico');
                //$obj = leobj($sender);
                $res=rastrosite($message);//OF109829129BR
                //gravArq($res[0]);
                EnviaMsg($sender,$res[0]);
            }
            break;
    }
}// if($message)*/
