<?php
include 'class/imp.class.php';
include 'class/hero.class.php';
include 'class/scorch.class.php';
include 'class/griffin.class.php';
include 'class/werewolf.class.php';
include 'class/harpy.class.php';
include 'class/nekker.class.php';
include 'class/arachas.class.php';
session_start();

$teren = Array('Góry','Trawa','Lawa','Lód','Pustynia','Plaża',
				'Jaskinie','Śnieg','Bagna','Woda');

//$log = "";

if(isset($_SESSION['hero'])) {
	$log = $_SESSION['log'];
		$hero = $_SESSION['hero'];
		$imp = $_SESSION['imp'];
	//	$stats = $_SESSION['stats'];
		}
else {
	//Jezeli nie ma w sesji naszego bohatera to tworzymy nowego bohatera i inne postacie
	$log = Array();
	$hero = new Hero();
	$imp = new Imp();
}

if(isset($_SESSION['mapa'])){
	$mapa = $_SESSION['mapa'];
	}
	else{
		$mapa = Array();
		for($y=-20; $y <= 20; $y++){
			for($x=-20; $x <= 20; $x++){
			$mapa[$x][$y]= rand(10,11);
			}
		}
	}

/*
	if(isset($_SESSION['stats'])){
		$stats = $_SESSION['stats'];
		}
		else{
		$stats = $hero->strPerPoint;
		}


/*
$potwory = Array('0' => new Imp(), );
print_r($potwory);

$wylosowanyPotwor = $potwory[rand(0,5)];
*/


if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']) {
		case 'attack': //nacisnieto atakuj
			$hero->attack($imp);
		break;
		case 'defend':
			$hero->increaseDef();
		break;
		case 'heal':
			$hero->heal();
		break;
		case 'mana':
			$hero->restoreMP();
		break;
		case 'fireball':
			$hero->UseFireball($imp);
		break;
		case'move':
		$hero->move($_REQUEST['direction']);
		break;
		default:
		$target->attack($hero);
		break;
	}
}





/*
$imp = new Imp();
$hero->attack($imp);
$imp->attack($hero);
print_r($hero);
$hero->defend(5);
*/



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
	<div class="row">
	<div class="col-xs-12">
		<nav class="navbar navbar-inverse" style="background-color:#337ab7;">
			<ul class="nav navbar-nav">

												<!--Modal 1 -->
				<li style="margin-left:200px">
						<!-- Nazwa Wyświetlana w panelu na layout-->
				<a href="#Stats">
				<button type="button" class="btn btn-primary btn-lg"> Stats	</button>
				</a>
				<div id="Stats" class="modalDialog">
		    <div>
					<a href="#close" title="Close" class="close">X</a>
					<!-- Miejsce na statystyki -->
							<?php
							echo '<table style="width: 100%;">';

								echo '<th>' ;
										echo 'Statistics';
								echo '</th>';
								echo '<th>' ;
										echo 'Points';
								echo '</th>';
								echo '<tr>';
									echo '<td>';
											echo 'Attack Damage';
									echo '</td>';
									echo '<td>';
											echo $hero->strPerPoint();
									echo '</td>';
								echo '</tr>';
								echo '<tr>';
									echo '<td>';
											echo 'Fireball Damage';
									echo '</td>';
									echo '<td>';
											echo $hero->intPerPointSkills();
									echo '</td>';
								echo '</tr>';

							echo '</table>';
							?>
		    </div>
		    </div>
				</li>

												<!--Modal 2 -->
				<li>
					<a href="#Postać" style="color: white; font-size: 15px">
						<button type="button" class="btn btn-primary btn-lg">Postać</button>
					</a>
					<div id="Postać" class="modalDialog">
					<div>
						<a href="#close" title="Close" class="close">X</a>
						Information about character
					</div>
			  	</div>
				</li>
												<!--Modal 3 -->
				<li>
						<!-- Nazwa Wyświetlana w panelu na layout-->
					<a href="#Plecak">
					<button type="button" class="btn btn-primary btn-lg">Plecak </button>
					</a>
					<!-- Modal -->
					<div id="Plecak" class="modalDialog">
			    <div>
						<a href="#close" title="Close" class="close">X</a>
						<!-- Miejsce na itemy -->
						    <?php
						      $plecak = Array();

						      	$helmet1 = Array('name' => 'helmet1', 'type' => 'helmet', 'lvl_required' => '1', 'baseDamage' => '0', 'baseDefend'=>'3');
										array_push($plecak, $helmet1);
										echo '<pre>';
										print_r($plecak);
										echo '</pre>';
						     ?>


			    </div>
			    </div>



				</li>
														<!--Modal 4 -->
				<li>
					<a href="#Bestionariusz" style="color: white; font-size: 15px">
						<button type="button" class="btn btn-primary btn-lg">Bestionariusz</button>
					</a>
					<div id="Bestionariusz" class="modalDialog">
					<div>
						<a href="#close" title="Close" class="close">X</a>
						Informations about opponets
					</div>
					</div>
				</li>
														<!--Modal 5 -->
				<li>
					<a href="#Opcje" style="color: white; font-size: 15px">
							<button type="button" class="btn btn-primary btn-lg">Opcje</button>
							<div id="Opcje" class="modalDialog">
							<div>
								<a href="#close" title="Close" class="close">X</a>
								Settings
							</div>
							</div>
					</a>
				</li>
														<!--Modal 6 -->
				<li>
					<a href="menu.php" style="color: white; font-size: 15px">
							<button type="button" class="btn btn-primary btn-lg">Wyśjcie</button>
					</a>
				</li>
			</ul>
		</nav>
	</div>

	<style>
	.modalDialog {
	        position: fixed;
	        font-family: Arial, Helvetica, sans-serif;
	        top: 0;
	        right: 0;
	        bottom: 0;
	        left: 0;
	        background: rgba(0,0,0,0.8);
	        z-index: 9999;
	        opacity: 0;
	        pointer-events: none;
	    }

	    .modalDialog:target {
	        opacity: 1;
	        pointer-events: auto;
	    }

	    .modalDialog > div {
	        width: 400px;
	        position: relative;
	        margin: 10% auto;
	        padding: 5px 20px 13px 20px;
	        border-radius: 10px;
	        background: #fff;
	        background: -moz-linear-gradient(#fff, #999);
	        background: -webkit-linear-gradient(#fff, #999);
	        background: -o-linear-gradient(#fff, #999);
	    }

	    .close {
	        background: #606061;
	        color: #000;
	        line-height: 20px;
	        position: absolute;
	        right: -12px;
	        text-align: center;
	        top: -10px;
	        width: 24px;
	        text-decoration: none;
	        font-weight: bold;
	        -webkit-border-radius: 12px;
	        -moz-border-radius: 12px;
	        border-radius: 12px;
	        -moz-box-shadow: 1px 1px 3px #000;
	        -webkit-box-shadow: 1px 1px 3px #000;
	        box-shadow: 1px 1px 3px #000;
					text-shadow: none;
					opacity: 0.7;

	    }

	    .close:hover {
				background: #cc3300;
				opacity: 0.8;
			 }
	</style>




	</div> <!-- /row od menu -->

	<div class="row">
	<div class="col-md-12">

	<div class="col-md-3">
		<div>
			<br>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
				<a href="layout.php?action=move&direction=north">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
					</button>
				</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4">
				<a href="layout.php?action=move&direction=west">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
					</button>
				</a>
				</div>
				<div class="col-md-4 col-md-offset-4">
								<a href="layout.php?action=move&direction=east">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					</button>
				</a>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
				<a href="layout.php?action=move&direction=south">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
					</button>
				</a>
				</div>
			</div>
		</div>
			<br>
			<br>
			<br>
		<div>

			<div class="list-group">
				 <button type="button" class="list-group-item"><a href="layout.php?action=attack">Atakuj</a></button>
				 <button type="button" class="list-group-item"><a href="layout.php?action=defend">Zwiększ Obronę</a></button>
				 <button type="button" class="list-group-item"><a href="layout.php?action=heal">Ulecz się</a></button>
				 <button type="button" class="list-group-item"><a href="layout.php?action=mana">Przywróć Manę</a></button>
				 <button type="button" class="list-group-item"><a href="layout.php?action=fireball">Użyj Fireball'a</a></button>
			</div>


		</div>



	</div> <!-- /left div -->

	<div class="col-md-6">
			<div class="row">
			<div class="progress">
				<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					Experience 1/10
				</div>
			</div>
			</div>

			<div class="row">

				<?php
				$heroLocation = $hero->getLocation();

					echo '<table>';
						for($y=$heroLocation[1]+4; $y >= $heroLocation[1]-4; $y--){
							echo'<tr>';
							for($x=$heroLocation[0]-5; $x <= $heroLocation[0]+5; $x++){
								$typTerenu = $mapa[$x][$y];
						echo '<td style="background-image:url(img/' .$typTerenu.'.jpg")>';
						if($hero->posX == $x && $hero->posY == $y){
						echo	'<img src="img/rycesz.png"></td>';
					}else
					echo	'<img src="img/' .$typTerenu.'.jpg">';
							}
						echo '<tr>';
						}
				echo'</table>';
				?>
			</div>
	</div>  <!-- /middle div -->

	<div class="col-md-3">

			<div class="progress">
				<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $hero->getHpPercent(); ?>%">
					HP <?php echo $hero->getHP(); ?>/<?php echo $hero->getBaseHP(); ?>
				</div>
			</div>
			<div class="progress">
				<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $hero->getMpPercent(); ?>%">
					MANA  <?php echo $hero->getMP(); ?>/<?php echo $hero->getBaseMP(); ?>
				</div>
			</div>
			<!--
				<div class="progress col-md-6">
					<div class="progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					VIT<input type="text">
					</div>
				</div>
				<div class="progress col-md-6">
					<div class="progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					INT<input type="text">
					</div>
				</div>
				<div class="progress col-md-6">
					<div class="progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					STR<input type="text">
					</div>
				</div>
				<div class="progress col-md-6">
					<div class="progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					DEX<input type="text">
					</div>
				</div>
			-->
			<script>
			function decrease(id) {
			document.getElementById(id).value = parseInt(document.getElementById(id).value) - 1;
			}
			function increase(id) {
			document.getElementById(id).value = parseInt(document.getElementById(id).value) + 1;
			}
			</script>
		<div>

				<div class="col-md-12">
						<div class="col-md-1">
								<button onclick="decrease('str')">-</button>
						</div>
						<div class="col-md-5">
								<b> Strength</b>
						</div>
						<div class="col-md-1 col-md-offset-1">
								<input style="width: 50px; border:0" type="text" name="att" id="str" value="<?php  echo $hero->stats['strenght']; ?>">
						</div>
						<div class="col-md-1 col-md-offset-1">
								<button onclick="increase('str')">+</button>
						</div>
				</div>

					<div class="col-md-12">
							<div class="col-md-1">
									<button onclick="decrease('int')">-</button>
							</div>
							<div class="col-md-5">
							  	<b>Intelligence</b>
							</div>
							<div class="col-md-1 col-md-offset-1">
									<input style="width: 50px; border:0" type="text" name="int" id="int" value="<?php  echo $hero->getInt(); ?>">
							</div>
							<div class="col-md-1 col-md-offset-1">
									<button onclick="increase('int')">+</button>
							</div>
					</div>

				<div class="col-md-12">
						<div class="col-md-1">
									<button onclick="decrease('vit')">-</button>
						</div>
						<div class="col-md-5">
									<b>Vitality</b>
						</div>
						<div class="col-md-1 col-md-offset-1">
								<input style="width: 50px; border:0" type="text" name="vit" id="vit" value="<?php  echo $hero->getVit(); ?>">
						</div>
						<div class="col-md-1 col-md-offset-1">
							<button onclick="increase('vit')">+</button>
						</div>
				</div>

					<div class="col-md-12">
							<div class="col-md-1">
									<button onclick="decrease('def')">-</button>
							</div>
							<div class="col-md-5">
									<b>Defence</b>
							</div>
						<div class="col-md-1 col-md-offset-1">
									<input style="width: 50px; border:0" type="text" name="def" id="def" value="<?php  echo $hero->getDef(); ?>">
							</div>
							<div class="col-md-1 col-md-offset-1">
									<button onclick="increase('def')">+</button>
						  </div>
					</div>

		</div>



			<div class="row">
				<div class="col-md-1">


							<a href="#Helmet" style=" font-size: 15px">
								<button type="button"><img src="img/helmet.png" width="35" height="35"></button>
							</a>
							<div id="Helmet" class="modalDialog">
							<div>
								<a href="#close" title="Close" class="close">X</a>
								<?php
									$helmets = Array();

										$helmetStats = Array('name' => 'helmet1', 'type' => 'helmet', 'lvl_required' => '1', 'baseHp' => '0', 'baseDefend'=>'3');
										$helmetStats='<button type="button"><img src="img/rycesz.png"></button>';
										echo $helmetStats;
										array_push($helmets, $helmetStats);

								 ?>
							</div>
							</div>

					  <!-- /head -->

				</div>


				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span> <!-- /trinket -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Head</p>
					<p style="float:right; line-height:70%">Trinket</p>
				</div>

			</div>

			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /body -->
					</button>
				</div>
				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /trinket -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Body</p>
					<p style="float:right; line-height:70%">Trinket</p>
				</div>

			</div>

			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /legs -->
					</button>
				</div>
				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /ring -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Legs</p>
					<p style="float:right; line-height:70%">Ring</p>
				</div>

			</div>
			<div class="row">
				<div class="col-md-1">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /boots -->
					</button>
				</div>
				<div class="col-md-1 col-md-offset-8">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /necklace -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="float:left; line-height:70%">Boots</p>
					<p style="float:right; line-height:70%">Necklace</p>
				</div>

			</div>
			<div class="row">
				<div class="col-md-1 col-md-offset-4">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /ranged weapon -->
					</button>
				</div>
				<div class="col-md-1 ">
					<button type="button" class="btn btn-default" aria-label="Left Align">
						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /melee -->
					</button>
				</div>

				<div class="col-md-12">
					<p style="text-align:center; line-height:70%">Range Melee</p>
				</div>
			</div>

			<div class="row">


			</div>

	</div> <!-- /right div -->

	</div> <!-- /div glowny -->

	<div class="row">
	<div class="col-md-12">
		<?php
		foreach($log as $line){
			echo "<p>$line</p>";

		}

		?>
	</div>
	</div>

	</div> <!-- /row glowny -->
</div> <!-- /container -->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<?php
//print_r($hero);
//print_r($_REQUEST);
$_SESSION['hero'] = $hero;
$_SESSION['imp'] = $imp;
$_SESSION['log'] = $log;
$_SESSION['mapa'] = $mapa;
//$_SESSION['stats'] = $stats;
?>
