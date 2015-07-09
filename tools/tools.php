<?php
    include_once('../lectorCSV.php');

    $arrayHerramientas = loadDataFromCSV("tools/tools.csv");
    print_r($arrayHerramientas);

    /*$gruposAñadidos = array();
    $nombreHerramienta;
    $enlaceLogoGrupo;
    $enlaceLogoHerramienta;
    $imagenDeHerramienta;
    $descripcion;
    $enlaceWeb;
    $elemento =  '<div class="container lista-herramientas-totales">';
    for($i=1; $i<sizeof($arrayGrupos); $i++)
    {
        $grupo = $arrayGrupos[$i][0];
        if(!in_array($grupo, $gruposAñadidos)){
            array_push($gruposAñadidos, $grupo);
            $logoGrupo = $arrayGrupos[$i][4];
            // Si no hay logo de grupo, se pone el de la universidad
            if($logoGrupo == "") {
                $logoGrupo = $arrayGrupos[$i][8];
            }
            $nombreDelGrupo = $arrayGrupos[$i][1];

            // Si no hay nombre del grupo de investigación, ponemos el nombre de la universidad
            if($nombreDelGrupo == "")
                $nombreDelGrupo = $arrayGrupos[$i][7];

            $siglasDelGrupo = $arrayGrupos[$i][0];
            $elemento .=  '<div id="cabecera'.$grupo.'" class="cabecera-lista-herramientas row">';
            $elemento .=    '<div class="col-md-1 col-sm-2 col-xs-3 logo-institucion-en-cabecera-lista-herramientas">';
            $elemento .=        '<img class="clase-de-imagen-logo-grupo" src="'.$logoGrupo.'"/>';
            $elemento .=    '</div>';
            $elemento .=    '<div class="col-md-11 col-sm-10 col-xs-9 nombre-institucion-en-cabecera-lista-herramientas">';
            $elemento .=        '<h5>'.$nombreDelGrupo.' (<a href="#">'.$siglasDelGrupo.'</a>)</h5>';
            $elemento .=    '</div>';
            $elemento .=  '</div>';
            $elemento .=  '<div id="herramientas'.$grupo.'" class="datos-lista-herramientas">';
            for($j=1; $j < sizeof($arrayHerramientas); $j++) {
                $grupoDeLaHerramienta = $arrayHerramientas[$j][7];
                if(strcmp($grupo,$grupoDeLaHerramienta)==0){
                    $nombreHerramienta = $arrayHerramientas[$j][1];
                    $enlaceLogoGrupo = "";
                    // Logo pequeño.
                    $enlaceLogoHerramienta = $arrayHerramientas[$j][2];
                    $imagenDeHerramienta = $arrayHerramientas[$j][3];
                    $descripcion = $arrayHerramientas[$j][4];
                    $enlaceWeb = $arrayHerramientas[$j][5];
                //echo $nombreHerramienta.$enlaceLogoHerramienta.$enlaceLogoGrupo.$imagenDeHerramienta.$descripcion.$enlaceWeb;
                        $elemento .=  '<div class="row cabecera-de-herramienta-lista">';
                        $elemento .=    '<div class="col-md-1 col-sm-1 col-xs-1 icono-despliegue"><span class="icon-squared-plus"></span></div>';
                        $elemento .=    '<div class="col-md-2 col-sm-2 col-sm-2 col-xs-5 logo-de-herramienta">';
                        $elemento .=        '<img src="'.$enlaceLogoHerramienta.'" class="imagen-logo-herramienta"></img>';
                        $elemento .=    '</div>';
                        $elemento .=    '<div class="col-md-9 col-sm-7 col-sm-offset-1 col-xs-6 nombre-de-herramienta">';
                        $elemento .=        '<p class="texto-herramienta"><b>'.$nombreHerramienta.'</b></p>';
                        $elemento .=    '</div>';
                        $elemento .=  '</div>';
                        $elemento .=  '<div class="row datos-de-herramienta-lista">';
                        $elemento .=    '<div class="col-md-offset-1 col-md-5 col-sm-12 col-xs-12 ">';
                        $elemento .=        '<img src="'.$imagenDeHerramienta.'"class="img-responsive ajuste-imagen"/>';
                        $elemento .=    '</div>';
                        $elemento .=    '<div class="col-md-5 col-sm-12 col-xs-12 texto-descripcion-herramienta">';
                        $elemento .=        '<p>'.$descripcion.'</p>';
                        $elemento .=        '<br>';
                        $elemento .=        '<p><a href="'.$enlaceWeb.'" class="btn btn-default" target="_news">Más información</a></p>';
                        $elemento .=    '</div>';
                        $elemento .=  '</div>';
                }   
            }
            $elemento .= '</div>';
        
        }
    }
    $elemento .= '</div><br>';
    echo $elemento;*/
?>

