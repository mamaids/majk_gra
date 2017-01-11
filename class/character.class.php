<?php
class Character
{
	// protected private public
  /*	 												// Stary zapis statystyk
	protected $att = 0;                       //zmienione na baseDamage
	protected $def = 0;												//zmienione na baseDefend
	protected $hp = 0;
	protected $healAmount = 0;
	protected $mp = 0;
	protected $mpAmount = 0;
	protected $increaseDefence = 0;
	//protected $pos = array(0,0);
	protected $fireballDamage = 0;
	protected $fireballMp = 0;
*/
	public $name = "";
	public $posX = 0;
	public $posY = 0;
	public $stats;
	protected $baseHp = 0;
	protected $baseMp = 0;


	function __construct(){
		$this->stats = Array( 'baseDamage' => 0, 'baseDefend' => 0, 'hp' => 0,
													'healAmount' => 0, 'mp' => 0, 'mpAmount' => 0,
													'increaseDefence' => 0, 'bonusDefTurnsLeft' => 0,
	 											 'bonusDefAmount' => 0, 'fireballDamage' => 0,
	 											 'fireballMp' => 0, 'strenght' => 0,
												 'intelligence' => 0, 'vitality' => 0, 'defence' => 0,
												  'dexterity' => 0);
	}

	function log($text){
		global $log;
		array_push($log, $text);
	}
/* 											Stara funckcja ataku i obrony.
	function attack ($target){
		// Funkcja odpowiada za zaatakowanie $target przez impa
		$this->log("$this->name atakuje za $this->stats['baseDamage']
								punktów obrażeń.<br>");
		$target->defend($this->stats['baseDamage']);
}
function defend ($damage){
	// Funkcja odpowiada za otrzymanie obrażeń $damage
	$trueDamage = $damage - $this->stats['baseDefend'];
	if($trueDamage < 0) $trueDamage = 0;
	$this->stats['hp'] -= $trueDamage;
	$this->log("$this->name redukuje obrażenia o $this->stats['baseDefend']
						i otrzymuje $trueDamage obrazen $this->name zostało
						$this->stats['hp'] Życia <br>");
}
*/
	function attack($target) {
		$hit = 'miss';
		$dmg = $this->stats['strenght'] * 2;
		$hitChance = 20 * $this->stats['dexterity'];
		$critChance = 2 * $this->stats['dexterity'];
		$r = rand(0,100);
		$this->log("Rzut K100: $r<br>");
		if($r > $hitChance) $hit = 'miss';
		if($r <= $hitChance) $hit = 'hit';
		if($r <= $critChance) $hit = 'crit';
		switch($hit) {
			case 'miss':
				$this->log('Spudłowałeś.<br>');
				break;
			case 'hit':
			//  echo 'Trafiłeś<br>';
			//  echo "Zadajesz $dmg obrazen<br>";
				$target->defend($dmg);
				break;
			case 'crit':
			//  echo "Trafiłeś krtytycznie<br>";
				$dmg *= 1.5;
			//  echo "Zadajesz $dmg obrazen<br>";
				$target->defend($dmg);
				break;
		}
	}

	function defend($dmg) {
		$r = rand(0,100);
		$dodgeChance = $this->stats['dexterity'] * 10;
		if($r <= $dodgeChance){
			$this->log("$this->name wykonał unik!<br>");
		} else {
			$this->log("$this->name otrzymuje $dmg obrazen<br>");
		$this->stats['hp'] -= $dmg;
		}
	}

	function heal (){
		//Funckja odpowiada za leczenie postaci
		$this->stats['hp'] += $this->stats['healAmount'];
		if($this->stats['hp'] > $this->baseHp) $this->stats['hp'] = $this->baseHp;
		$this->log("$this->name leczy się za $this->stats['healAmount']
								punktów życia, ma teraz $this->stats['hp'] życia <br>");
	}
	function restoreMp (){
		//Funckja odpowiada za odnowienie many postaci
		$this->stats['mp'] += $this->stats['mpAmount'];
		if($this->stats['mp'] > $this->baseMp{ $this->stats['mp'] = $this->baseMp;
		$this->log("$this->name przywraca sobie $this->stats['mpAmount']
								punktów many i aktualnie posiada $this->stats['mp']
								punktów many. <br>");
	}

	function isAlive (){
		// true if (hp>0)
		if($this->stats['hp'] >= 0) return true;
		else return false;
	}
}
?>
