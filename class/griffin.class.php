<?php

require_once('character.class.php');
class Griffin extends Character
{
	function __construct(){
	$this->att = 8;
	$this->def = 4;
	$this->hp = 225;
	$this->name = '<span style="color:red;"><i> Griffin </i></span>';
	}
	
}


?>