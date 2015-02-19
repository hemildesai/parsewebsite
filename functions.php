<?php

require_once ('vendor/autoload.php');



	use Parse\ParseClient;
 use Parse\ParseObject;
 use Parse\ParseQuery;
   ParseClient::initialize('kcbJJHjbBqI8H4N37Mr0IhsOYxcl6E00lAw3Ul0j', 'rrgV2Uwox5wLhM8xt0iCkL01I1LBR58JdEMTbXZA', 'd1MLufWAUF3p6cbNm55aFNM21QX1GGdP1W6WFHOo');
function find($values)
{
	extract($values);
	$query = new ParseQuery("SELL");
	//$query1 = new ParseQuery("SELL");
	$query->equalTo("item",	 $values["buy"]);   
	//$query->equalTo("item", $values["buy"]);
	//$mainQuery = ParseQuery::andQueries($query, $query1);
	//$results1 = $query->ascending("price");
	$results = $query->find();
	//$n = count($query->find());
	$n = count($results);
	
	
	if($n <= 0) {
	apologize("There are no sellers for your product.");
	}
	
	/*else if($n1<=0)
	{
	apologize("There are no sellers for your product in this university.");
	}*/
	else
	{
	$r = ["n"=>n, "resulsts"=>$results];
	return $r;
	}
}   
function add($values) {
   
 
   $i = new ParseObject("SELL");
   $i->set("item", $values["item"]);
   $i->set("price", $values["price"]);
   $i->set("email", $values["email"]);
   $i->set("university", $values["university"]);
   try {
  	$i->save();
  	echo 'New object created with objectId: ' . $i->getObjectId();
   } catch (ParseException $ex) {  
   	// Execute any logic that should take place if the save fails.
  	// error is a ParseException object with an error code and message.
  	echo 'Failed to create new object, with error message: ' + $ex->getMessage();
	}
   
}

function apologize($message)
    {
        render("apology.php", ["message" => $message]);
        exit;
    }	

function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("templates/$template"))
        {
            // extract variables into local scope
            extract($values);
 
            // render header
            require("templates/header1.php");
 
            // render template
            require("templates/$template");
 
            // render footer
            require("templates/footer1.php");
        }
 
        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }
    
function redirect($destination)
    {
        // handle URL
        if (preg_match("/^https?:\/\//", $destination))
        {
            header("Location: " . $destination);
        }
 
        // handle absolute path
        else if (preg_match("/^\//", $destination))
        {
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            header("Location: $protocol://$host$destination");
        }
 
        // handle relative path
        else
        {
            // adapted from http://www.php.net/header
            $protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: $protocol://$host$path/$destination");
        }
 
        // exit immediately since we're redirecting anyway
        exit;
    }
 ?>
