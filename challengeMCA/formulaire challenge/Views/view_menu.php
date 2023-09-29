<?php require "view_begin.php" ?>

<table>
	<tr>

		<?php foreach($tabcate as $c => $v){?>
			
			<th><?=e(strtoupper($v))?></th>
			

		 <?php } /*var_dump($tabcate);*/ ?>
	</tr>

	<?php foreach($taball as $c => $v){ ?>
		<tr>
		<?php foreach($tabcate as $c2 => $v2){ ?>
			<?php if($v2 == "id"){
				echo "<td><a href ='?controller=information&action=info_by_id&id=".$v[$v2]."'>".$v[$v2]."</a></td>";
				$tmpid = $v[$v2];
			}else{
				echo "<td>".$v[$v2]."</td>";
			}?>
			
		<?php } ?>

		<td><a href ='?controller=menu&action=delete_by_id&id=<?=$tmpid?>'>Delete</a></td>
		<td><a href ='?controller=edit&action=form_edit&id=<?=$tmpid?>'>Edit</a></td>
		</tr>
	<?php } ?>
</table>

<?php require "view_end.php" ?>