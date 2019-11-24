<?php
try
{
	$bdd = new pdo("mysql:dbname=saur_mercantil;host=localhost" ,
	"root",
	"");

}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
