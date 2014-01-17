<?
// SHOWS LIST OF SUB CATEGORIES
function getSubCategories($ID, $hierarchy=0)
{
	$getSubCategories = getInfo("category", "parent", $ID);
	
	if (!empty($getSubCategories))
	{	
	 	$hierarchy = $hierarchy + 1;
		
		foreach ($getSubCategories AS $row)
		{
			?>
			<tr valign="top">
				<td><? for ($i=0; $i<$hierarchy; $i++) {echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";} echo ' - '.stripslashes($row['name']); ?></td>	
				<td class="textCenter width100"><a href="<? echo $thisPage; ?>?_action=addSubCat&_id=<? echo $row['id'] ?>">[Add Sub Category]</a></td>
				<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=editCat&_id=<? echo $row['id'] ?>">[EDIT]</a></td>
				<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=deleteCat&_id=<? echo $row['id'] ?>" class="delete">[DELETE]</a></td>
			</tr>
			<?
			getSubCategories($row['id'], $hierarchy);
		}	
	}
}









// SHOWS THE LIST OF CATEGORIES IN THE DROP DOWN LIST
function getCategoryList($ID, $hierarchy=0, $parent=0)
{
	$getSubCategories = getInfo("category", "parent", $ID);
	
	if (!empty($getSubCategories))
	{	
	 	$hierarchy = $hierarchy + 1;
		
		foreach ($getSubCategories AS $row)
		{
			?>
			<option value="<? echo $row['id']; ?>" <? checkSelected($row['id'], $parent); ?>>
				<? for ($i=0; $i<$hierarchy; $i++) {echo "&nbsp;&nbsp;&nbsp;&nbsp;";} ?>
				- <? echo stripslashes($row['name']); ?>
			</option>
			<?
			getCategoryList($row['id'], $hierarchy, $parent);
		}	
	}
}









?>