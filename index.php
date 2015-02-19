<?php
   require 'vendor/autoload.php' ;
   require 'templates/header1.php' ;
   require 'templates/middle1.php' ;
   require 'templates/footer1.php' ;

 use Parse\ParseClient;
 
   ParseClient::initialize('kcbJJHjbBqI8H4N37Mr0IhsOYxcl6E00lAw3Ul0j', 'rrgV2Uwox5wLhM8xt0iCkL01I1LBR58JdEMTbXZA', 'd1MLufWAUF3p6cbNm55aFNM21QX1GGdP1W6WFHOo');
   

   use Parse\ParseObject;
 
 	ParseObject::create("SELL");

?>
