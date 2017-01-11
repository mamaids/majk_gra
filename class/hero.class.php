<?php
require_once('character.class.php');
class Hero extends Character
{
	function __construct(){
	$this->name = '<span style="color:green;"><i> Bohater </i></span>' ;
	$this->stats = Array('baseDamage' => 3,'baseDefend' => 2, 'hp' => 100,
	 										 'healAmount' => 5, 'mp' => 100, 'mpAmount' => 10,
											 'increaseDefence' => 1, 'bonusDefTurnsLeft' => 0,
											 'bonusDefAmount' => 3, 'fireballDamage' => 5,
											 'fireballMp' => 20, 'strenght' => 3, 'intelligence' => 1,
											 'vitality' => 1, 'defence' => 1, 'dexterity' => 3,);
	$this->baseHp = $this->stats['hp'];
	$this->baseMp = $this->stats['mp'];
	/*   Stary zapis statystyk.
	$this->att = 3;										  zamienione na baseDamage
	$this->def = 2;										  zamienione na baseDefend
	$this->hp = 100;
	$this->baseHp = $this->hp;    			 Brakuje powyzej
	$this->healAmount = 5;
	$this->mp = 100;
	$this->baseMp = $this->mp;           Brakuje powyzej
	$this->mpAmount = 10;
	$this->increaseDefence = 1;
	$this->bonusDefTurnsLeft = 0;
	$this->bonusDefAmount = 3;
	$this->fireballDamage = 5;
	$this->fireballMp = 20;
	$this->strenght = 3;
	$this->intelligence = 1;
	$this->vitality = 1;
	$this->defence = 1;
*/

	}

//	function saveStats ($_att, $_def) {
	//	$this->att = $_att;
		//	}


	function getStr(){
		return $this->stats['strenght'];
	}
	function getInt(){
		return $this->stats['intelligence'];
	}
	function getVit(){
		return $this->stats['vitality'];
	}
	function getDef(){
		return $this->stats['defence'];
	}
	function getDex(){
		return $this->stats['dexterity'];
	}
// Odpowiada za aktualne statusy postaci.
	function strPerPoint(){
	//	if($this->strenght >= 1){
	//	echo	$this->att;
	//	}
	//	else{
	$attackBonus = 	$this->stats['strenght'] * 2;
			$totalDmg	= $this->stats['att'] + $attackBonus;
			echo $totalDmg;
	//		}
	}

	function intPerPointSkills(){
	$fireballBonus = 	$this->stats['intelligence'] * 3;
			$totalDmgFireball	= $this->stats['fireballDamage'] + $fireballBonus;
			echo $totalDmgFireball;
	}
	function intPerPointMana(){
	$manaBonus = 	$this->stats['intelligence'] * 5;
			$totalMana	= $this->mana + $manaBonus;
			echo $totalMana;
	}
	function vitPerPoint(){
	$hpBonus = 	$this->stats['vitality'] * 5;
			$totalHp	= $this->stats['hp'] + $hpBonus;
			echo $totalHp;
	}

//koniec statystyk postaci.

	function getLocation(){
		return Array($this->posX, $this->posY);

	}

	function increaseDef(){
	$this->def += $this->stats['increaseDefence'];
	$this->stats['bonusDefTurnsLeft'] = 3;
	$this->log("$this->name zwiększa obronę o $this->stats['increaseDefence']
	 					  i aktualnie posiada $this->stats['baseDefend'] <br>");
	}

	function defend ($damage){
		// Funkcja odpowiada za otrzymanie obrażeń $damage
		if($this->stats['bonusDefTurnsLeft'] > 0) {
		//aktywna tarcza
		$damage = $damage - ($this->def + $this->stats['increaseDefence']);
		$this->stats['bonusDefTurnsLeft']--;
	}

	else{
		$totalDefend = $this->stats['baseDefend'] + $this->stats['defence'];
		$damage = $damage - $this->totalDefend;
	}
		$trueDamage = $damage - $totalDefend;

	if($trueDamage < 0) $trueDamage = 0;
		$this->hp -= $trueDamage;
		$this->log("$this->name redukuje obrażenia o $totalDefend
		 						i otrzymuje $trueDamage obrazen $this->name zostało
								$this->stats['hp'] Życia <br>");
	}
	function move($direction){
		//$direction = {north, east, south, west}
		switch($direction){
			case 'north':
			$this->posY++;
			break;
			case 'south':
			$this->posY--;
			break;
			case 'east':
			$this->posX++;
			break;
			case 'west':
			$this->posX--;
			break;
		}

	}

	function getHP(){
		return $this->stats['hp'];
	}
	function getBaseHP(){
		return $this->baseHp;
	}
	function getHpPercent(){
		return ($this->stats['hp'] / $this->baseHp)*100;
	}
	function getMP(){
		return $this->stats['mp'];
	}
	function getBaseMP(){
		return $this->baseMp;
	}
	function getMpPercent(){
		return ($this->stats['mp'] / $this->baseMp)*100;
	}

		function UseFireball ($target){
		if($this->stats['mp'] >= $this->stats['fireballMp'])
		{
			$this->stats['mp'] -= $this->stats['fireballMp'];
			$this->log("$this->name zużywa $this->stats['fireballMp'] puntków many,
			zostaje mu $this->stats['mp'] po czym używa Fireball'a i zadaje
			$this->stats['fireballDamage'] punktów obrażen $target->name <br>");
			$target->defend($this->stats['fireballDamage']);


		}
		else {
			$this->log("$this->name nie ma wystarczająco dużo many, aktualnie posiada
									$this->stats['mp']");
		}

	}


}

?>
