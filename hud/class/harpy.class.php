<?php

require_once('character.class.php');
class Harpy extends Character
{
	function __construct(){
	$this->att = 4;
	$this->def = 2;
	$this->hp = 77;
	$this->name = '<span style="color:red;"><i> Harpy </i></span>';
	}
	
}



?>