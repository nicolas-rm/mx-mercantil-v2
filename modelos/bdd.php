<?php
try
{
	$bdd = new pdo("mysql:dbname=mx_mercantil;host=localhost" ,
	"root",
	"");

}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
