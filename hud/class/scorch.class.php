<?php

require_once('character.class.php');
class Scorch extends Character
{
	function __construct(){
	$this->att = 4;
	$this->def = 3;
	$this->hp = 120;
	$this->name = '<span style="color:red;"><i> Scorch </i></span>';
	}
	
}



?>