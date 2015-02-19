<?php
    require("vendor/autoload.php");
    require("functions.php");
    
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["item"])) 
    {
    	apologize("Please enter something to sell.");
    	}
    	else if(empty($_POST["price"])) 
    	{
    	apologize("Please enter a valid value for amount.");
    	}
    	else if(empty($_POST["university"])) 
    	{
    	apologize("Please enter correct location.");
    	}
    	else if(empty($_POST["email"]))
    	{
    	apologize("Please enter an e-mail address.");
    	}
    add($_POST);
     redirect("index.php");
    }
    else 
   	 {
    
        render("sell1.php");
   }
    
?>
