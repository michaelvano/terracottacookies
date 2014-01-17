<?

function getTax($province, $subTotal)
{
	switch($province)
	{
		case "AB": $tax = $subTotal*0.05; break; // ALBERTA TAX
		case "BC": $tax = $subTotal*0.12; break; // BRITISH COLUMBIA TAX
		case "MB": $tax = $subTotal*0.12; break; // MANITOBA TAX
		case "NB": $tax = $subTotal*0.13; break; // NEW BRUNSWICK TAX
		case "NL": $tax = $subTotal*0.13; break; // NEWFOUNDLAND TAX
		case "NT": $tax = $subTotal*0.05; break; // NORTHWEST TERRITORIES TAX
		case "NS": $tax = $subTotal*0.15; break; // NOVA SCOTIA TAX
		case "NU": $tax = $subTotal*0.05; break; // NUNAVUT TAX
		case "ON": $tax = $subTotal*0.13; break; // ONTARIO TAX
		case "PE": $tax = $subTotal*0.15; break; // PRINCE EDWARD ISLAND TAX
		case "QC": $tax = $subTotal*0.145; break; // QUEBEC TAX
		case "SK": $tax = $subTotal*0.10; break; // SASKATCHEWAN TAX
		case "YT": $tax = $subTotal*0.05; break; // YUKON TERRITORIES TAX
		default: $tax = 0.00; break; // OUTSIDE CANADA, NO TAX
	}	
	return number_format($tax, 2);
}

?>