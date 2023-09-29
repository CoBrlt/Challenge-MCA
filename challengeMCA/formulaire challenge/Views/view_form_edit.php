<?php require 'view_begin.php'?>

<p>Les caractères de cette liste sont interdits : À,Á,Â,Ã,Ä,Å,Æ,Ç,È,É,Ê,Ë,Ì,Í,Î,Ï,Ð,Ñ,Ò,Ó,Ô,Õ,Ö,Ø,Œ,Š,þ,Ù,Ú,Û,Ü,Ý,Ÿ,à,á,â,ã,ä,å,æ,ç,è,é,ê,ë,ì,í,î,ï,ð,ñ,ò,ó,ô,õ,ö,ø,œ,š,Þ,ù,ú,û,ü,ý,ÿ,@</p>

<form action="?controller=edit&action=edit&id=<?=$id?>&image=<?=$image?>" method="post" enctype="multipart/form-data">

<label>Nom du challenge : <input type="text" name="nom" value="<?=$nom?>"/></label></br></br>
<label>Description : <textarea name="description"><?=$description?></textarea></label></br></br>
<label>Sport<input type="text" name="sport" value="<?=$sport?>"/></label></br></br>
<p>Image actuelle :</br><img src="../img/<?=$image?>"></p>
<label>Placez une image pour modifier : <input type="file" name="img"/></label></br></br>
<?php //verifier si File[truc] est vide si oui on change le nom dans la bdd sinon on laisse comme ça 
//il faut réussir a renvoyer l'image d'avant, mais comment ? $_POST['oldimg']=$image
?>
<label>Séléctionez une morphologie : </label></br>

<?php if($morphologie == null){?>
		<input type="radio" name="morphologie" value="ectomorphe"><label>Ectomorphe</label></br>
		<input type="radio" name="morphologie" value="endomorphe"><label>Endomorphe</label></br>
		<input type="radio" name="morphologie" value="mesomorphe"><label>Mésomorphe</label></br></br>
	<?php }elseif($morphologie == "ectomorphe"){ ?>
		<input type="radio" name="morphologie" value="ectomorphe" checked><label>Ectomorphe</label></br>
		<input type="radio" name="morphologie" value="endomorphe"><label>Endomorphe</label></br>
		<input type="radio" name="morphologie" value="mesomorphe"><label>Mésomorphe</label></br></br>
	<?php }elseif($morphologie == "endomorphe"){ ?>
		<input type="radio" name="morphologie" value="ectomorphe"><label>Ectomorphe</label></br>
		<input type="radio" name="morphologie" value="endomorphe" checked><label>Endomorphe</label></br>
		<input type="radio" name="morphologie" value="mesomorphe"><label>Mésomorphe</label></br></br>
	<?php }elseif($morphologie == "mésomorphe"){ ?>
		<input type="radio" name="morphologie" value="ectomorphe"><label>Ectomorphe</label></br>
		<input type="radio" name="morphologie" value="endomorphe"><label>Endomorphe</label></br>
		<input type="radio" name="morphologie" value="mesomorphe" checked><label>Mésomorphe</label></br></br>
	<?php } ?>




<label>Nombre de répétition : <input type="number" name="repetition" value="<?=$nbrepetition?>"/></label></br></br>
<label>Nombre de série : <input type="number" name="serie" value="<?=$nbserie?>"/></label></br></br>
<label>Temps de repos : <input type="number" name="repos" value="<?=$tmprepos?>"/> seconde(s)</label></br></br>
<label>Temps de la séance complète : <input type="number" name="tmpseance" value="<?=$tempsseanceminutes?>"/> minute(s)</label></br></br>
<label>Materiel à prévoir : <input type="text" name="materiel" value="<?=$materiel?>"/></label></br></br>
<label>Séléctionez le sexe : </label></br>


<?php if($sexe == null){?>
		<input type="radio" name="sexe" value="0"><label>Homme</label></br>
		<input type="radio" name="sexe" value="1"><label>Femme</label></br></br>
	<?php }elseif($sexe == "0"){ ?>
		<input type="radio" name="sexe" value="0" checked><label>Homme</label></br>
		<input type="radio" name="sexe" value="1"><label>Femme</label></br></br>
	<?php }elseif($sexe == "1"){ ?>
		<input type="radio" name="sexe" value="0"><label>Homme</label></br>
		<input type="radio" name="sexe" value="1" checked><label>Femme</label></br></br>
	<?php } ?>





<label>Niveau minimum pour réaliser le challenge : <input type="number" name="difficulte" value="<?=$difficulte?>"/></label></br></br>
<label>Nombre de coéquipier pour réliser le challenge : <input type="number" name="team" value="<?=$nbpartenaires?>"/></label></br></br>


<label>Réaliser le challenge à domicile : </label></br>
<?php if($domicile == null){?>
		<input type="radio" name="domicile" value="0"><label>Non</label></br>
		<input type="radio" name="domicile" value="1"><label>Oui</label></br></br>
	<?php }elseif($domicile == "0"){ ?>
		<input type="radio" name="domicile" value="0" checked><label>Non</label></br>
		<input type="radio" name="domicile" value="1"><label>Oui</label></br></br>
	<?php }elseif($domicile == "1"){ ?>
		<input type="radio" name="domicile" value="0"><label>Non</label></br>
		<input type="radio" name="domicile" value="1" checked><label>Oui</label></br></br>
	<?php } ?>




<label>Récompense en points d'experience :<input type="number" name="xp" value="<?=$recompensexp?>"/></label></br></br>
<label>Récompense en pièces : <input type="number" name="piece" value="<?=$recompensepiece?>"/></label></br></br>



<input type="submit" name="editbouton" value="Modifier le challenge">

</form>
<?php require 'view_end.php'?>