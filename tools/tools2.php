<?php
    include_once("lectorCSV.php");
    //$arrayHerramientas = loadDataFromCSV("https://docs.google.com/spreadsheets/d/1ysrUC9ls0ElV39V1IXXseWubjoQxwC4-uneFRustaKM/pub?gid=0&single=true&output=csv");
    $arrayHerramientas = loadDataFromCSV("tools/tools.csv");
    //print_r($arrayHerramientas);

    $tiposAñadidos = array();
    $urlLogoHerramienta;
    $tituloHerramienta;
    $enlaceHerramienta;
    $descripcionHerramienta;
    $elemento = "";
    
    //$elemento .= '<div class="portfolio_single_content estilo-funding">';
    $contador = 0;
    $clasefondo = 'filapar';
    $registeredTools = array();
    $labTools = array();

    for($j=1; $j<sizeof($arrayHerramientas); $j++)
    {
        $tipo = $arrayHerramientas[$j][0];
        $urlLogoHerramienta = $arrayHerramientas[$j][1];
            
            $tituloHerramienta = $arrayHerramientas[$j][2];
            $enlaceHerramienta = $arrayHerramientas[$j][3];
            $descripcionHerramienta = $arrayHerramientas[$j][4];
            $imagenHerramienta = $arrayHerramientas[$j][5];
        if(strcmp($tipo, "Registered Tool")==0){
            
            $miregisteredtool = array();
            array_push($miregisteredtool, $urlLogoHerramienta);
            array_push($miregisteredtool, $tituloHerramienta);
            array_push($miregisteredtool, $enlaceHerramienta);
            array_push($miregisteredtool, $descripcionHerramienta);
            array_push($miregisteredtool, $imagenHerramienta);
            array_push($registeredTools, $miregisteredtool);
            unset($miregisteredtool);

        }
        else {
            $milabtool = array();
            array_push($milabtool, $urlLogoHerramienta);
            array_push($milabtool, $tituloHerramienta);
            array_push($milabtool, $enlaceHerramienta);
            array_push($milabtool, $descripcionHerramienta);
            array_push($milabtool, $imagenHerramienta);
            array_push($labTools, $milabtool);
            unset($milabtool);
        }
    }

    for($i=0; $i<sizeof($registeredTools); $i++) {
        $elemento .= '<div class="col-xs-12 col-sm-4  registeredtool">';
        $elemento .= '    <div class="portfolio_single_content ">';
        $elemento .= '                                                <img  src='.$registeredTools[$i][4].' alt="title"/><p>Texto de prueba</p>';
        $elemento .= '                                                <div>';
        $elemento .= '                                                    <a class="estilo-hover-tools" href='.$registeredTools[$i][2].'>'.$registeredTools[$i][1].'</a>';
        $elemento .= '                                                    <span  class="estilo-hover-tools">'.$registeredTools[$i][3].'</span>';
        $elemento .= '                                                </div>';
        $elemento .= '                                            </div></div>';
    }
    $elemento .= '';
   
    //$elemento .= '<div class="portfolio_single_content estilo-funding">';
    for($i=0; $i<sizeof($labTools); $i++) {
        $elemento .= '<div class="col-xs-12 col-sm-4  labstool">';
        $elemento .= '    <div class="portfolio_single_content ">';
        $elemento .= '                                                <img  src='.$labTools[$i][4].' alt="title"/>';
        $elemento .= '                                                <div>';
        $elemento .= '                                                    <a  class="estilo-hover-tools" href='.$labTools[$i][2].'>'.$labTools[$i][1].'</a>';
        $elemento .= '                                                    <span  class="estilo-hover-tools" >'.$labTools[$i][3].'</span>';
        $elemento .= '                                                </div>';
        $elemento .= '                                            </div></div>';
    }
    $elemento .= '</div>'; 
    echo $elemento;
?>

