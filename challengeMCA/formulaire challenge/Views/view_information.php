<?php require 'view_begin.php';
?>


<?php foreach($info as $c => $v){ ?>
	<?php if($c == "image"){ ?>
		<p><?= $c ?> => <br> <img src="../img/<?=$v?>"></p>
	<?php }elseif($c == "tmprepos"){ ?>
		<p><?= $c ?> => <?= $v ?> seconde(s)</p>
	<?php }elseif($c == "tempsseanceminutes"){ ?>
		<p><?= $c ?> => <?= $v ?> minute(s)</p>
	<?php }elseif($c == "sexe"){ ?>
		<?php if($v == "0"){ ?>
			<p><?= $c ?> => Homme</p>
		<?php }else{ ?>
			<p><?= $c ?> => Femme</p>
		<?php } ?>
	<?php }elseif($c == "domicile"){ ?>
		<?php if($v == "0"){ ?>
			<p><?= $c ?> => Oui</p>
		<?php }else{ ?>
			<p><?= $c ?> => Non</p>
		<?php } ?>
	<?php }else{ ?>
		<p><?= $c ?> => <?= $v ?></p>
	<?php } ?>
<?php } ?>

<?php require 'view_end.php'?>