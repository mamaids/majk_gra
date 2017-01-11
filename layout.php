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
				<li style="margin-left:350px">

					<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
					<!-- Nazwa Wyświetlana w panelu na layout-->	Stats
					</button>
						<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel"><b> Statystyki</b></h4>
									</div>
									<div class="modal-body">
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
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>

				</li>
				<li>
						<a href="#" style="color: white; font-size: 15px">Postać</a>
				</li>

				<li>
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
					<!-- Nazwa Wyświetlana w panelu na layout-->		Plecak
				</button>
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel"><b> Statystyki</b></h4>
								</div>
								<div class="modal-body">
								<!-- Miejsce na itemsy -->
										<?php
											$plecak = Array();

											//	$hemlet1 = Array('name' => 'helmet1', 'type' => 'helmet', 'lvl_required' => '1')

 											//	$helmet1 = Array('att' => '0', 'def'=>'3')

										 ?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li><a href="#" style="color: white; font-size: 15px">Gildie</a></li>
				<li><a href="#" style="color: white; font-size: 15px">Opcje</a></li>
				<li><a href="layout.php" style="color: white; font-size: 15px">Wyśjcie</a></li>
			</ul>
		</nav>
	</div>
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
						echo '<td><img src="img/' .$typTerenu. '.jpg"><td>';
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
								<input style="width: 50px; border:0" type="text" name="att" id="str" value="<?php  echo $hero->getStr(); ?>">
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
					<button type="button" class="btn btn-default" aria-label="Left Align">

						<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>  <!-- /head -->
					</button>
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
