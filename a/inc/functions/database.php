<?

/* =================================================================
- nobulmedia.ca
- includes/functions/database.php
- Version 1.0 - 2012-01-19
- A bunch of functions that accesses the database
====================================================================*/


/* ==================
- checkUser
- $email: username to check
- $password: password to check

Description: This function checks the database and creates session variables and such based on who is logged in
====================*/ 
function checkUser ($email="", $password="") {
	session_start();
	if ($email == "" && $password == "") {$msg = 100; return $msg;}
	elseif ($email == "") {$msg = 101; return $msg;}
	elseif ($password == "") {$msg = 102; return $msg;}
	else {
		// Create hashed password
		$password = md5($password);
		
		// Check the database for which table the email is in or return an error msg if there is no result
		$checkUsers = getInfo("users", "email", $email);
		$checkOragnizations = getInfo("organizations", "email", $email);
		$checkVolunteers = getInfo("volunteers", "email", $email);
		if (!empty($checkVolunteers)) {$type = "volunteers";}
		elseif (!empty($checkOragnizations)) {$type = "organizations";}
		elseif (!empty($checkUsers)) {$type = "users";}
		else {$msg = 103; return $msg;}	
		
		$query = "SELECT * FROM `".$type."` WHERE `email`='".$email."' AND `password`='".$password."'";
		$checkDatabase = mysql_query($query);
		
		if (mysql_num_rows($checkDatabase) == 0) {$msg = 104; return $msg;}
		else {		
			$info = mysql_fetch_assoc($checkDatabase);
			if ($type == "volunteers") {
				if ($info['passwordReset'] == 1) {
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/password-reset.php?type=volunteers&id='.$info['password'].'&uID='.$info['ID'].'">'; exit;
				} else {
					$_SESSION['name'] = $info['firstName']." ".$info['lastName'];
					$_SESSION['email'] = $info['email'];
					$_SESSION['permission'] = 1;
					$_SESSION['searchPreferences'] = explode(":", $info['searchPreferences']);
					$_SESSION['opportunitiesAppliedTo'] = explode(":", $info['opportunitiesAppliedTo']);
					$_SESSION['type'] = "volunteers";
					$_SESSION['ID'] = $info['ID'];
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/volunteer_dashboard.php">'; exit;
				}
			} 
			elseif ($type == "organizations") {
				if ($info['isPending'] == 1) {$msg = 105; return $msg;}
				elseif ($info['passwordReset'] == 1) {
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/password-reset.php?type=organizations&id='.$info['password'].'&uID='.$info['ID'].'">'; exit;
				} else {
					$_SESSION['name'] = $info['name'];
					$_SESSION['contact'] = $info['contactFirstName'].' '.$info['contactLastName'];
					$_SESSION['permission'] = $info['permissionLevel'];
					$_SESSION['email'] = $info['email'];
					$_SESSION['userID'] = 'o'.$info['ID'];	
					$_SESSION['ID'] = $info['ID'];
					$_SESSION['type'] = "organizations";
					if ($info['type'] == "" || $info['website'] == "") {
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/organizations_edit-profile.php?msg=1">'; exit;
					} else {
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/organizations_login.php">'; exit;
					}
				}
			}
			elseif ($type == "users") {
				if ($info['passwordReset'] == 1) {
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/password-reset.php?type=users&id='.$info['password'].'&uID='.$info['ID'].'">'; exit;
				} else {
					$_SESSION['name'] = $info['firstName']." ".$info['lastName'];
					$_SESSION['permission'] = $info['permissionLevel'];
					$_SESSION['email'] = $info['email'];
					$_SESSION['userID'] = $info['ID'];
					$_SESSION['ID'] = $info['ID'];
					$_SESSION['type'] = "users";
					echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin.php">'; exit;
				}
			}
		}
	}
}






/* ==================
- checkField
- $table: the name of the table in the database
- $column: the column name that is checked

Description: This function is used to check if a field exists in the table specified.
i.e $data = getInfo($table, $column, $value);
====================*/
function checkField($table, $column) {
	$fields = mysql_list_fields(DB_NAME, $table);
	$columns = mysql_num_fields($fields);
	
	for ($i = 0; $i < $columns; $i++) {$field_array[] = mysql_field_name($fields, $i);}

	if (!in_array($column, $field_array)) {return false;}
	else {return true;}
}







/* ==================
- checkTable
- $table: the name of the table in the database

Description: This function is used to check if a table exists.
====================*/
function checkTable($table) {
	$checkTable = @mysql_query("SELECT * FROM ".$table);
	if (!$checkTable) {return false;}
	else {return true;}
}







/* ==================
- getInfo
- $table: the name of the table in the database
- $column: which columen you wish to use as a search parameter
- $value: the string being used to search through the database
- $orderBy: the column(s) in the table in which to organize the information by
- $orderType: order by ASC or DESC. Defaults to ASC if anything else is chosen
- $startFrom: the number in the LIMIT syntax indicating where to start the database query
- $limit: the number in the LIMIT syntax indicating how many results to obtain

Description: This function is used to retrieve information from the
database. 

Example: $data = getInfo("table_name", "name", "Bob", "lastName", "DESC", 0, 15);
====================*/
function getInfo(
	$table="",
	$column="",
	$value="",
	$orderBy="",
	$orderType="",
	$start="",
	$limit=""
) {
	
	$table = mysql_real_escape_string($table);
	if (!is_array($column)) {$column = mysql_real_escape_string($column);}
	if (!is_array($value)) {$value = mysql_real_escape_string($value);}
	$orderBy = mysql_real_escape_string($orderBy);
	$orderType = mysql_real_escape_string($orderType);
	$start = mysql_real_escape_string($start);
	$limit = mysql_real_escape_string($limit);
	
	
	// Needs at least a table name to access some database values
	if ($table == "") {echo 'Table name is at least needed to use the "getInfo" function <br />'; return;}
	elseif (!checkTable($table)) {echo 'That table does not exist in this database. <br />'; return;}
	
	// begins to build the query string to be used
	$query = "SELECT * FROM `".$table."`";
	
		
	if ($column !== "" && $value !== "") {
		if (is_array($column) && is_array($value)) {
			
			if (count($column) != count($value)) {echo 'The two arrays for the field and values to query with multiples conditions must be the same amount.'; return;}
			$total = count($column);
			$query .= " WHERE";
			
			for ($i=0; $i<$total; $i++) {
				if (!checkField($table, $column[$i])) {echo 'The field "'.$column[$i].'" does not exist in the "'.$table.'" table. <br />'; return;}
				$query .= " `".mysql_real_escape_string($column[$i])."`='".mysql_real_escape_string($value[$i])."'";
				if ($i != ($total-1)) {$query .= " AND";}
			}
			
		} elseif (!is_array($column) && is_array($value) || is_array($column) && !is_array($values)) {
			echo 'Both the 2nd and 3rd parameters must be an array if you\'re going to use multiple conditional statements'; return;
		} else {
			$query .= " WHERE `".$column."`='".$value."'";
		}
	}
	
	if ($orderBy !== "" && $orderType !== "") {
		if (checkField($table, $orderBy) && $orderType == "ASC" || $orderType == "DESC") {
			$query .= " ORDER BY `".$orderBy."` ".$orderType;
		} else {
			if (!checkField($table, $orderBy)) {echo "That field does not exist. <br />"; return;}
			elseif ($orderType !== "ASC" && $orderType !== "DESC") {
				echo 'Please use either "ASC" or "DESC" to determine how the information should be organized. <br />';
			}
		}
	}
	
	// Checks to make sure only number values are used for the LIMIT property
	if ($start !== "" && $limit !== "") {
		if (is_numeric($start) && is_numeric($limit)) {
			if ($start >= 0 && $limit >= 0) {$query .= " LIMIT ".floor($start).", ".floor($limit);}
			else {echo 'Please use only positive numbers. <br />'; return;}
		} else {echo 'Please use only number values. <br />'; return;}
	}
	
	$results = mysql_query($query);
	
	// Checks to see if there were results or not. If yes, then assigns variables to $info
	if (mysql_num_rows($results) == 0) {return false;}	
	else {
		for ($i=0; $i<mysql_num_rows($results); $i++) {
			$data = mysql_fetch_assoc($results);
			$info[$i] = $data;
		}
		return $info;
	}
	
	
}







/* ==================
- getSingleValue
- $retrieveColumn: the column field you wish to retrieve the information from
- $table: the name of the table in the database
- $whereColumn: the column you want to use to search. Usually references a column from another table.
- $value: the value used to search and isolate the value.

Description: This functions retrieves a single value only from the database. Used when a column references another table
====================*/
function getSingleValue(
	$retrieveColumn="",
	$table="",
	$whereColumn="",
	$value=""
) {
	$retrieveColumn = mysql_real_escape_string($retrieveColumn);
	$table = mysql_real_escape_string($table);
	$whereColumn = mysql_real_escape_string($whereColumn);
	$value = mysql_real_escape_string($value);
	
	// Needs at least a table name to access some database values
	if ($table == "") {echo 'Table name is at least needed to use the "getInfo" function <br />'; return;}
	elseif (!checkTable($table)) {echo 'That table does not exist in this database. <br />'; return;}
	
	if (
		$retrieveColumn == "" ||
		$table == "" ||
		$whereColumn == "" ||
		$value == ""
	) {
		
		return;
	}
	
	$query = "SELECT `".$retrieveColumn."` FROM `".$table."` WHERE `".$whereColumn."`='".$value."'";
	
	$retrieve = mysql_query($query);
	
	if (mysql_num_rows($retrieve) == 0) {return;}
	
	$value = mysql_fetch_assoc($retrieve);
	
	return $value[$retrieveColumn];
	
}







/* ==================
- getPageNumbers
- $retrieveColumn: the column field you wish to retrieve the information from
- $table: the name of the table in the database
- $whereColumn: the column you want to use to search. Usually references a column from another table.
- $value: the value used to search and isolate the value.

Description: Gets the values needed to display page numbers.
====================*/
function getPageNumbers(
	$limit="",
	$pageNumber=0,
	$table="",
	$column="",
	$value="",
	$link="",
	$linkSeparator=" ",
	$useDropdown=0
) {
	$limit = mysql_real_escape_string($limit);
	$pageNumber = mysql_real_escape_string($pageNumber);
	$table = mysql_real_escape_string($table);
	$column = mysql_real_escape_string($column);
	$value = mysql_real_escape_string($value);
	
	if ($table == "") {echo 'A table name needs to included. <br />'; return;}
	elseif (!checkTable($table)) {echo 'The table "'.$table.'" does not exist in this database.<br />'; return;}
	
	if ($limit !== "") {
		if (is_numeric($limit)) {
			if ($limit <= 0) {echo 'Please use only positive numbers. <br />'; return;}
		} else {echo 'Please use only number values for the limit parameter. <br />'; return;}
	} else {
		echo 'The "limit" parameter is needed to use this function. <br />'; return;
	}
	
	$start = $pageNumber * $limit;
	
	$query = "SELECT * FROM `".$table."`";
	
	if ($column !== "" && $value !== "") {$query .= " WHERE `".$column."`='".$value."'";}
	
	$retrieve = mysql_query($query);
	
	$total = mysql_num_rows($retrieve);
	
	$pages = ceil($total/$limit);
	
	if ($pages >= 29) {$useDropdown = 1;}
	
	if ($total == 0) {echo 'There are no pages. <br />'; return;}
	else {
		if ($useDropdown == 1) {
			echo '<script type="text/javascript" src="/a/js/page-list.js"></script>';
			?>
			<select id="pageList">
				<?
				for ($i=0; $i<$pages; $i++) {
					?> <option value="<? echo $link.$i; ?>" <? if ($pageNumber == $i) {echo 'selected="selected"';} ?>><? echo $i+1; ?></option> <?
				}
				?>
			</select>
			<?
		} else {
			for ($i=0; $i<$pages; $i++) {
				if ($pageNumber !== $i) { ?><a href="<? echo $link.$i; ?>"><? } ?><? if ($pageNumber == $i) {echo '<span class="bold">';} ?><? echo $i+1; ?><? if ($pageNumber == $i) {echo '</span>';} ?><? if ($pageNumber !== $i) { ?></a><? } ?><? if ($i !== $pages) { echo $linkSeparator; }
			}
		}
	}
	
}







/* ==================
- insertInfo
- $table: Name of the table to insert the values to
- $columnsArray: An array made up of the names of the fields to insert the values into. 
- $valuesArray: An array of the value to insert into the table. Must correspond properly with the columns array.

Description: Inserts a new row into the specified table.
====================*/
function insertInfo ($table, $columnsArray, $valuesArray) {
	
	if ($table == "") {echo 'A table name needs to included. <br />'; return;}
	elseif (!checkTable($table)) {echo 'That table does not exist in this database. <br />'; return;}
	
	if (!is_array($columnsArray)) {echo 'The 2nd parameter must be an array of the fields to have values inserted.<br />'; return;}
	if (!is_array($valuesArray)) {echo 'The 3rd parameter must be an array of values to be inserted into the corresponding array of field names. <br />'; return;}
	
	$query = "INSERT INTO `".$table."` (";
	
	$columnsTotal = count($columnsArray);
	$valuesTotal = count($valuesArray);
	
	$c = 0;
	$v = 0;
	
	foreach ($columnsArray as $field) {
		$query .= "`".$field."`";
		$c++;
		if ($c !== $columnsTotal) {$query .= ", ";}
	}
	
	$query .= ") VALUES (";
	
	foreach ($valuesArray as $value) {
		if ($value !== "NOW()") {$query .= "'".mysql_real_escape_string($value)."'";}
		else {$query .= "NOW()";}
		$v++;
		if ($v !== $valuesTotal) {$query .= ", ";}
	}
	
	$query .= ")";
	
	$insert = mysql_query($query);
	
	if ($insert) {return true;}
	else {return false;}
}







/* ==================
- updateInfo
- $table: Name of the table to insert the values to
- $columnsArray: An array made up of the fields to be update. 
- $valuesArray: An array of the value to update the table. Must correspond properly with the columns array.
- $conditionalField: The field used for the "WHERE" syntax in query statement. Usually the ID
- $contitionalValue: The value used in isolate which row to update

Description: Updates information in the database
====================*/
function updateInfo ($table, $columnsArray, $valuesArray, $conditionField, $conditionValue) {
	
	if ($table == "") {echo 'A table name needs to included'; return;}
	elseif (!checkTable($table)) {echo 'The table "'.$table.'" does not exist in this database. <br />'; return;}
	
	if (!is_array($columnsArray)) {echo 'The 2nd parameter must be an array of the fields to have values inserted. <br />'; return;}
	if (!is_array($valuesArray)) {echo 'The 3rd parameter must be an array of values to be inserted into the corresponding array of field names. <br />'; return;}
	
	if ($conditionField == "") {echo 'The 4th parameter, the WHERE condition is required to be the name of the column. <br />'; return;}
	elseif (!checkField($table, $conditionField)) {echo 'That field "'.$conditionField.'" does not exist in the "'.$table.'" table. <br />'; return;}

	if ($conditionValue == "") {echo 'The 5th parameter, the value for the WHERE condition is required. <br />'; return;}	
	
	$columnsTotal = count($columnsArray);
	$valuesTotal = count($valuesArray);
	
	if ($columnsTotal != $valuesTotal) {echo 'The two arrays must have the same amount of values. <br />'; return;}	
		
		
	$query = "UPDATE `".$table."` SET ";
	
	for ($i=0; $i<$columnsTotal; $i++) {
		$query .= "`".$columnsArray[$i]."`='".mysql_real_escape_string($valuesArray[$i])."'";
		if ($i != $columnsTotal-1) {$query .= ", ";}
	}
	
	$query .= " WHERE `".$conditionField."`='".$conditionValue."'";
	
	$update = mysql_query($query);
	
	if ($update) {return true;}
	else {return false;}

}







/* ==================
- deleteInfo
- $table: Name of the table to delete the row from
- $conditionalField: Field to use when determining which row to delete
- $contitionalValue: The value used in isolate which row to delete

Description: Updates information in the database
====================*/
function deleteInfo($table, $conditionField, $conditionValue) {
	
	if ($table == "") {echo 'A table name needs to included. <br />'; return;}
	elseif (!checkTable($table)) {echo 'The table "'.$table.'" does not exist in this database.<br />'; return;}
	
	if ($conditionField == "") {echo 'The 2nd parameter, the WHERE condition is required to be the name of the column. <br />'; return;}
	elseif (!checkField($table, $conditionField)) {echo 'That field "'.$conditionField.'" does not exist in the "'.$table.'" table. <br />'; return;}

	if ($conditionValue == "") {echo 'The 3rd parameter, the value for the WHERE condition is required. <br />'; return;}
	
	
	$query = "DELETE FROM `".$table."` WHERE `".$conditionField."`='".$conditionValue."'";
	
	$delete = mysql_query($query);
	
	if ($delete) {return true;}
	else {return false;}

	
} 
?>