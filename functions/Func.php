<?php
function CalcPrecoPrazo($CepO,$CepD,$CdServico='04510',$Peso = '1',$formato = '1',$Comprimento = '30',$Altura = '30',$Largura = '30',$MaoP = 'n',$ValorD = '0',$Ar = 'n',$Diametro = '0'){
    $DOMDocument = new DOMDocument( '1.0', 'UTF-8' );
    $DOMDocument->preserveWhiteSpace = false;
    $DOMDocument->load("http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=09146920&sDsSenha=123456&sCepOrigem=$CepO&sCepDestino=$CepD&nVlPeso=$Peso&nCdFormato=$formato&nVlComprimento=$Comprimento&nVlAltura=$Altura&nVlLargura=$Largura&sCdMaoPropria=$MaoP&nVlValorDeclarado=$ValorD&sCdAvisoRecebimento=$Ar&nCdServico=$CdServico&nVlDiametro=$Diametro&StrRetorno=xml&nIndicaCalculo=3" );
    $Dados = '';
    foreach( $DOMDocument->getElementsByTagName( 'cServico' ) as $content )
    {
        foreach( $content->childNodes as $child )
            {    
                $Dados .= $child->nodeValue."|" ;
            }
    }
    $Dados = explode('|',$Dados);
    $CalcPP = [
            "CodServiço"=>$Dados[0],
            "Valor"=>$Dados[1],
            "ValSAdcional"=>$Dados[2],
            "ValMP"=>$Dados[3],
            "ValAR"=>$Dados[4],
            "ValDeclarado"=>$Dados[5],
            "EntregaDomiciliar"=>$Dados[6],
            "EntSabado"=>$Dados[7],
            "Erro"=>$Dados[8],
            "ValDeclarado"=>$Dados[9],
            "EntregaDomiciliar"=>$Dados[10]
    ];
    return $CalcPP;
}

            $rr = CalcPrazoEntrega('pp394773132br');
            echo $rr['codigo'];
function CalcPrazoEntrega($Objeto){
    $DOMDocument = new DOMDocument( '1.0', 'UTF-8' );
    $DOMDocument->preserveWhiteSpace = false;
    //$DOMDocument->load('http://scppws/calculador/CalcPrecoPrazo.asmx/CalcDataMaxima?codigoObjeto='.$Objeto );
    $DOMDocument->load('http://scppws/calculador/CalcPrecoPrazo.asmx/CalcPrazoObjeto?codigoObjeto='.$Objeto );
    $Dados = '';
    foreach( $DOMDocument->getElementsByTagName( 'cObjeto' ) as $content )
    {
        //var_dump($content) ;
        foreach( $content->childNodes as $child )
            {    
                $Dados .= $child->nodeValue."|" ;//$child->nodeName,
            }
    }
    $Dados = explode('|',$Dados);
    $Calc = [
            "codigo"=>$Dados[0],
            "servico"=>$Dados[1],
            "cepOrigem"=>$Dados[2],
            "cepDestino"=>$Dados[3],
            "prazoEntrega"=>$Dados[4],
            "dataPostagem"=>$Dados[5],
            "dataMaxEntrega"=>$Dados[6],
            "postagemDH"=>$Dados[7],
            "dataUltimoEvento"=>$Dados[8],
            "codigoUltimoEvento"=>$Dados[9],
            "tipoUltimoEvento"=>$Dados[10],
            "descricaoUltimoEvento"=>$Dados[11]
    ];
   return $Calc;
}

?>
