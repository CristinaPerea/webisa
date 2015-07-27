<?php     
       include_once('lectorCSV.php');
       $arrayCollaborations = array();
       $arrayCollaborations = loadDataFromCSV("collaborations/collaborationsCSV.csv");
       //$arrayCollaborations = loadDataFromCSV("https://docs.google.com/spreadsheets/d/1DqBiUjIaL0nyPQ89VWP5pt3uqxrszaobeMfD_LyK3qM/pub?output=csv");
       //print_r($arrayCollaborations);

       $group;
       $university;
       $topic;                              

       for ($i = 1; $i < sizeof($arrayCollaborations) ; $i++) {
            
            $group = $arrayCollaborations[$i][0];
            $university = $arrayCollaborations[$i][1];
            $topic = $arrayCollaborations[$i][2];

            $elemento =  '<li>'.$group.', from the '.$university.'. Topic: '.$topic.'.</li>';

            echo $elemento;
      }
        
?>