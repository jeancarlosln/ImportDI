<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////ITEM 1/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

$vmld = $localDescargaTotalDolares;                      #Valor total da importação no local de embarque

#Tabela de valores Siscomex
$ValorUnitariotb = array(29.50, 29.50, 23.60, 23.60, 23.60, 17.70, 17.70, 17.70, 17.70, 17.70, 11.80, 11.80, 11.80, 11.80, 11.80, 11.80, 11.80, 11.80, 11.80, 11.80);
$ValorDasAdicoes = array(29.50, 59.0, 23.0, 47.20, 70.80, 17.70, 35.40, 53.10, 70.80, 88.50, 11.80, 23.60, 35.50, 47.20, 59.00, 70.80, 82.60, 94.40, 106.20, 118.00);
$ValorFixo       = array(185.00, 185.00, 244.00, 244.00, 244.00, 244.00, 314.80, 314.80, 314.80, 314.80, 314.80, 403.30, 403.30, 403.30, 403.30, 403.30, 403.30, 403.30, 403.30, 403.30);
$ValorTotal      = array(214.50, 244.00, 267.60, 291.20, 314.80, 332.50, 350.20, 367.90, 385.60, 403.30, 415.10, 426.90, 438.70, 450.50, 462.30, 474.10, 485.90, 497.70, 509.50, 521.30);

//CALCULO DA II
if($a2numeroSequencialItem = 03) {
    if ($d1numeroSequencialItem > 0) {
        $qp = round(($quantidade2 / 100000), 2);                     #Quantidade de Produtos
        $vud = round(($valorUnitario2 / 100000), 2);                   #Valor unitário em dólares
        $vt = $vud * $qp;                                         #Valor total da compra em dólar
        $tdd = $dolarValue;                                            #Taxa de conversão de Dólar no dia do registro da D.I.
        $aii = $iiAliquotaAdValorem;                              #Alíquota do Imposto de Importação
        $vii = ($vt * $tdd) * $aii;                                #valor total do imposto de importação
        $vii = round(($vii / 1000000), 2);
//echo "II = ($vt * $tdd) * $aii = $vii    <br>";
        $vpd = $vud * $qp;                                      #vpd = Valor unitário do produto em dólar (valor unitárop * quantidade )
        $viiu = $vpd * $aii;                                    #Valor unitario do imposto de importação
        $viiu = round(($viiu / 000001), 2);
//echo "<br><table><tr>Valor unitario (II)<th></th><tr><td>$viiu</td></tr></table>";

        echo '<table><tr><th id="thCalcPequeno">Calculos:</th>';
        echo '<th id="thCalcMedio">VU II<br><br><input id="inputCalcPequeno"type="text" value="' . $viiu . '"></th>';
        $vur = ($vud * $tdd) + $viiu;                           #Valor unitário produto convertido para R$
        echo '<th id="thCalcMedio">VU Produto (R$)<br><br><input id="inputCalcMedio" type="text" value="' . $vur . '"></th>';
//echo "<table><tr>Valor unitário produto convertido para real (R$)<th></th><tr><td>$vur</td></tr></table>";
        $vtcr = $qp * $vur;                                       #valor total da compra de um tipo de produto convertido para real (R$).
        echo '<th id="thCalcMedio">VT Produto<br><br><input id="inputCalcMedio" type="text" value="' . $vtcr . '"></th>';
//echo "<table><tr>valor total da compra de um tipo de produto convertido para real (R$).<th></th><tr><td>$vtcr</td></tr></table>";
//3.2.2.1  Calculo de Imposto (II)
        $vpd = $vud * $tdd;                                      #vpd = Valor unitário do produto em dólar (valor unitárop * quantidade )
        $viiu = $vpd * $aii;                                     #Valor unitario do imposto de importação
        $viiu = round(($viiu / 10), 2);
        echo '<th id="thCalcMedio">Valor Unitário II<br><br><input id="inputCalcMedio" type="text" value="' . $viiu . '"></th>';
//echo "<table><tr>Valor unitario do imposto de importação<th></th><tr><td>$viiu</td></tr></table>";
//3.2.3 IPI
        $vbipi = $vpd + $vii;                                    #valor base IPI (valor base unitario da ii + valor total da ii)
        $ipi = $ipiAliquotaAdValorem;                           #Alíquota do IPI
        $vipi = $vbipi * $ipi;                                 #valor da IPI
        $vipi = round(($vipi / 10000), 2);
        echo '<th id="thCalcMedio">IPI<br><br><input id="inputCalcPequeno" type="text" value="' . $vipi . '"></th>';
//echo "<table><tr>valor da IPI<th></th><tr><td>$vipi</td></tr></table>";
//3.2.4 PIS
        $vbpis = $vud * $tdd;                                      #Valor base do PIS
        $pis = $pisPasepAliquotaAdValorem / 10000;              #Aliquota do PIS
        $vpis = $vbpis * $pis;                                   #Valor do PIS
        $vpis = round(($vpis / 00001), 2);
        echo '<th id="thCalcMedio">PIS (R$)<br><br><input id="inputCalcPequeno" type="text" value="' . $vpis . '"></th>';
//echo "<table><tr>Valor do PIS<th></th><tr><td>$vpis</td></tr></table>";
//3.2.5 COFINS
        $cof = $cofinsAliquotaAdValorem / 10000;                #Alíquota do COFINS
        $vbcf = $vud * $tdd;                                      #Valor base para calculo COFINS
        $vcf = $vbcf * $cof;                                    #Calculo COFINS
        $vcf = round(($vcf / 00001), 2);
        echo '<th id="thCalcMedio">COFINS<br><br><input id="inputCalcPequeno" type="text" value="' . $vcf . '"></th>';
//echo "<table><tr>Calculo COFINS<th></th><tr><td>$vcf</td></tr></table>";
//3.2.7 ICMS Base primaria

        if ($vtsp == 1) {
            $vtsp = $ValorTotal[0];
        }
        if ($vtsp == 2) {
            $vtsp = $ValorTotal[1];
        }
        if ($vtsp == 3) {
            $vtsp = $ValorTotal[2];
        }
        if ($vtsp == 4) {
            $vtsp = $ValorTotal[3];
        }
        if ($vtsp == 5) {
            $vtsp = $ValorTotal[4];
        }
        if ($vtsp == 6) {
            $vtsp = $ValorTotal[5];
        }
        if ($vtsp == 7) {
            $vtsp = $ValorTotal[6];
        }
        if ($vtsp == 8) {
            $vtsp = $ValorTotal[7];
        }
        if ($vtsp == 9) {
            $vtsp = $ValorTotal[8];
        }
        if ($vtsp == 10) {
            $vtsp = $ValorTotal[9];
        }
        if ($vtsp == 11) {
            $vtsp = $ValorTotal[10];
        }
        if ($vtsp == 12) {
            $vtsp = $ValorTotal[11];
        }
        if ($vtsp == 13) {
            $vtsp = $ValorTotal[12];
        }
        if ($vtsp == 14) {
            $vtsp = $ValorTotal[13];
        }
        if ($vtsp == 15) {
            $vtsp = $ValorTotal[14];
        }
        if ($vtsp == 16) {
            $vtsp = $ValorTotal[15];
        }
        if ($vtsp == 17) {
            $vtsp = $ValorTotal[16];
        }
        if ($vtsp == 18) {
            $vtsp = $ValorTotal[17];
        }
        if ($vtsp == 19) {
            $vtsp = $ValorTotal[18];
        }
        if ($vtsp == 20) {
            $vtsp = $ValorTotal[19];
        }

        $vtspad = $vtsp / $vmld * $vt;
        $vtspad = round(($vtspad / 100000), 2);
        $vbic = ($vud * $tdd) + $vii + $vipi + $vpis + $vcf + $vtsp;     #Calculo ICMS Primario
        $vbic = round(($vbic / 000001), 2);

//echo "<table><tr>Calculo ICMSS Primário<th></th><tr><td>$vbic</td></tr></table>";
//3.2.7 ICMS Base Secundaria
        $vbics = $vbic / (88 / 100);
        $vbics = round(($vbics / 000001), 2);
//echo "<table><tr>Calculo ICMS Secundário<th></th><tr><td>$vbics</td></tr></table>";
        $icms = '0.12';
        $vicms = $vbics * $icms;
        $vicms = round(($vicms / 000001), 2);
//echo "<BR>Valor ICMS<BR>" .$vicms;
        echo '<th id="thCalcMedio0">ICMS <br><br><input id="inputCalcPequeno" type="text" value="' . $vicms . '"></th>';
//Taxa siscomex
        echo '<th id="thCalcMedio0">SISCOMEX <br><br><input id="inputCalcPequeno" type="text" value=""></th></tr></table>';
    }
}
?>