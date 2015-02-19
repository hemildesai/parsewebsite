<?php
    
    require("vendor/autoload.php");
    require 'functions.php' ;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["buy"])) 
    {
    	apologize("Please enter something to buy.");
    	}
    	$list = find($_POST);
    	$results = $list["results"];
    	$final = [];
    	foreach ($results as $result) {
    		if($result->get("university") === $_POST["univ"]) {
    		$final[] = $result;
    		}
    		}
    		if(empty($final)) {
    		apologize("There are no sellers for your product in this university.");
    		}
    	
     redirect("index.php");
    }
    else 
   	 {
    
        render("buy1.php");
   }
   
?>
