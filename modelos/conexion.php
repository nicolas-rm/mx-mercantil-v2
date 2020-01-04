<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=mx_mercantil",//saur_mercantil
			            "root",//root
			            "");

		$link->exec("set names utf8");

		return $link;


	}

}