<?php
require_once('class/imp.class.php');
require_once ('class/scorch.class.php');
require_once ('class/griffin.class.php');
require_once ('class/werewolf.class.php');
require_once ('class/harpy.class.php');
require_once ('class/nekker.class.php');
require_once ('class/arachas.class.php');
session_start();

if(isset($_SESSION['monsters'])){
  $monsters = $_SESSION['monsters'];
}
else $monsters = Array();

//tworzymy losowo 3 potwory w zakresie mapy -5,5;

$x = rand(-5,5);
$y = rand(-5,5);

$imp = new Imp();
$imp->posX = $x;
$imp->posY = $y;
if(!isset($monsters[$x][$y])) $monsters[$x][$y] = $imp;
/*$placeFree = true;
foreach($monsters as $monster){
  if($monster->posX == $x && $monster->posY == $y){
    $placeFree = false;
  }
}
if($placeFree) array_push($monsters, $imp);
*/



$_SESSION['monsters'] = $monsters;
 ?>
 <!--
 <pre>
<?php
 //print_r($imp);
 //print_r($_SESSION);
 ?>
 </pre>
