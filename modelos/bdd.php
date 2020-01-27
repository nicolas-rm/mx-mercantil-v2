<?php
try
{
	$bdd = new pdo("mysql:dbname=bd_merca;host=localhost" ,
	"root",
	"");

}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
