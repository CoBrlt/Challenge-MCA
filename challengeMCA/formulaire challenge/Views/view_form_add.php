<?php require 'view_begin.php'?>
<?php if($fail == 1){
	echo "<p>Les caractères de cette liste sont interdits : À,Á,Â,Ã,Ä,Å,Æ,Ç,È,É,Ê,Ë,Ì,Í,Î,Ï,Ð,Ñ,Ò,Ó,Ô,Õ,Ö,Ø,Œ,Š,þ,Ù,Ú,Û,Ü,Ý,Ÿ,à,á,â,ã,ä,å,æ,ç,è,é,ê,ë,ì,í,î,ï,ð,ñ,ò,ó,ô,õ,ö,ø,œ,š,Þ,ù,ú,û,ü,ý,ÿ,@</p>";
} ?>

<form action="?controller=add&action=add" method="post" enctype="multipart/form-data">

<label>Nom du challenge : <input type="text" name="nom"/></label></br></br>
<label>Description : <textarea name="description"></textarea></label></br></br>
<label>Sport : <input type="text" name="sport"/></label></br></br>
<label>Image : <input type="file" name="img"/></label></br></br>
<label>Séléctionez une morphologie : </label></br>
<input type="radio" name="morphologie" value="ectomorphe"><label>Ectomorphe</label></br>
<input type="radio" name="morphologie" value="endomorphe"><label>Endomorphe</label></br>
<input type="radio" name="morphologie" value="mesomorphe"><label>Mésomorphe</label></br></br>
<label>Nombre de répétition : <input type="number" name="repetition"/></label></br></br>
<label>Nombre de série : <input type="number" name="serie"/></label></br></br>
<label>Temps de repos : <input type="number" name="repos"/> seconde(s)</label></br></br>
<label>Temps de la séance complète : <input type="number" name="tmpseance"/> minute(s)</label></br></br>
<label>Materiel à prévoir : <input type="text" name="materiel"/></label></br></br>
<label>Séléctionez le sexe : </label></br>
<input type="radio" name="sexe" value="0"><label>Homme</label></br>
<input type="radio" name="sexe" value="1"><label>Femme</label></br></br>
<label>Niveau minimum pour réaliser le challenge : <input type="number" name="difficulte"/></label></br></br>
<label>Nombre de coéquipier pour réliser le challenge : <input type="number" name="team"/></label></br></br>

<label>Réaliser le challenge à domicile : </label></br>
<input type="radio" name="domicile" value="0"><label>Oui</label></br>
<input type="radio" name="domicile" value="1"><label>Non</label></br></br>

<label>Récompense en points d'experience :<input type="number" name="xp"/></label></br></br>
<label>Récompense en pièces : <input type="number" name="piece"/></label></br></br>



<input type="submit" name="addbouton" value="Ajouter le challenge">

</form>
<?php require 'view_end.php'?>