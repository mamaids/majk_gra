<?php
require_once('character.class.php');
class Imp extends Character
{
	function __construct(){
	$this->name = '<span style="color:red;"><i> Imp </i></span>';
	$this->stats = Array('baseDamage' => 4, 'baseDefend' => 2, 'hp' => 50,
											 'dexterity' => 2);

	/* 							  Stary zapis statystyk impa
	$this->att = 7;
	$this->def = 4;
	$this->hp = 50;
	*/
	}

}


?>
