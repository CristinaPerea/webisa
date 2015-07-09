<?php     
       include_once('lectorCSV.php');
       $arrayFunding = array();
       $arrayFunding = loadDataFromCSV("funding/Funding.csv");
       print_r($arrayFunding);  

       $nombreProyecto;
       $descripcionProyecto;
       $fechaProyecto;                                 
       $areaProyecto;

       for ($i = 1; $i < sizeof($arrayFunding) ; $i++) {
            $nombreProyecto = $arrayFunding[$i][0];
            $descripcionProyecto = $arrayFunding[$i][1];
            $fechaProyecto = $arrayFunding[$i][2]; 
            $areaProyecto = $arrayFunding[$i][3];

            echo $nombreProyecto.$descripcionProyecto.$fechaProyecto.$areaProyecto;

            $elemento = '<div class="">';
            $elemento .= '<div class="item-list">';
            $elemento .= '  <h3>'.$areaProyecto.'</h3>';
            $elemento .= '  <ul>';
            $elemento .= '      <li>'.$nombreProyecto.'. '.$descripcionProyecto.'. '.$fechaProyecto.'.</li>';
            $elemento .= '  </ul>';
            $elemento .= '</div>';
            $elemento .= '</div>';
            echo $elemento;
        }


       /*<div class="col-xs-12 col-sm-4 all">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p1.jpg" alt="title"/>
                           <div>
                               <a href="#">Skull Awesome</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 GraphicDesign">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p2.jpg" alt="title"/>
                           <div>
                               <a href="#">Photo Frame</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 responsive">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p3.jpg" alt="title"/>
                           <div>
                               <a href="#">Hand Shots</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 webDesign websites">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p4.jpg" alt="title"/>
                           <div>
                               <a href="#">Night Abstract</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 appsDevelopment websites">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p5.jpg" alt="title"/>
                           <div>
                               <a href="#">Joy of Independence</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 GraphicDesign">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p6.jpg" alt="title"/>
                           <div>
                               <a href="#">Night Crawlers</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 responsive">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p7.jpg" alt="title"/>
                           <div>
                               <a href="#">Last Motel</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 GraphicDesign">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p8.jpg" alt="title"/>
                           <div>
                               <a href="#">Dirk Road</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>
                   <div class="col-xs-12 col-sm-4 websites">
                       <div class="portfolio_single_content">
                           <img src="img/portfolio/p9.jpg" alt="title"/>
                           <div>
                               <a href="#">Old is Gold</a>
                               <span>Subtitle</span>
                           </div>
                       </div>
                   </div>*/
?>