<?php

require_once('character.class.php');
class Werewolf extends Character
{
	function __construct(){
	$this->att = 7;
	$this->def = 1;
	$this->hp = 60 ;
	$this->name = '<span style="color:red;"><i> Werewolf </i></span>';
	}
	
}



?>