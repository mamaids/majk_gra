<?php

require_once('character.class.php');
class Nekker extends Character
{
	function __construct(){
	$this->att = 6;
	$this->def = 2;
	$this->hp = 84;
	$this->name = '<span style="color:red;"><i> Nekker </i></span>';
	}
	
}



?>