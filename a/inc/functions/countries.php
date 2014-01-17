<?
function listCountries($selected) 
{
	$countries = getInfo("countries", "", "", "name", "ASC");
	
	?>
	<option value="CA" <? if ($selected == "CA") {echo 'selected="selected"';} ?> >Canada</option>
	<option value="US" <? if ($selected == "US") {echo 'selected="selected"';} ?> >United States</option>
	<option disabled="disabled">====================</option>
	<?
	
	foreach($countries AS $option)
	{
		if ($option['iso'] != "CA" && $option['iso'] != "US")
		{
			?>
			<option value="<? echo $option['iso']; ?>" <? if ($selected == $option['iso']) {echo 'selected="selected"';} ?> ><? echo stripslashes($option['printable_name']); ?></option>
			<?
		}
	}
	
}









?>