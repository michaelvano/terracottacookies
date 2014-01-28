<style>
	label.checkbox {width:auto; line-height:16px; margin-left:110px;}
	input[type="checkbox"] {width:auto; height:auto; line-height:20px; margin-right:10px; }
</style>

<label>Name of School: </label>
<input type="text" name="school" value="<? echo stripslashes($school); ?>" />
<div class="clear"></div>

<label>First Name: *</label>
<input type="text" name="firstName" value="<? echo stripslashes($firstName); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
<div class="clear"></div>

<label>Last Name: *</label>
<input type="text" name="lastName" value="<? echo stripslashes($lastName); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
<div class="clear"></div>

<label>Address: *</label>
<input type="text" name="address" value="<? echo stripslashes($address); ?>" class="<? if ($addressNeeded) {echo 'required';} ?>" />
<div class="clear"></div>

<label>City: *</label>
<input type="text" name="city" value="<? echo stripslashes($city); ?>" class="<? if ($cityNeeded) {echo 'required';} ?>" />
<div class="clear"></div>

<label>Postal Code: *</label>
<input type="text" name="postal_code" value="<? echo stripslashes($postal_code); ?>" class="<? if ($postalCodeNeeded) {echo 'required';} ?>" />
<div class="clear"></div>

<label>Phone 1: *</label>
<input type="text" name="phone" value="<? echo stripslashes($phone); ?>" class="<? if ($phoneNeeded) {echo 'required';} ?>" />
<div class="clear"></div>

<label>Phone 2: </label>
<input type="text" name="mobile" value="<? echo stripslashes($mobile); ?>" />
<div class="clear"></div>

<label>Email: *</label>
<input type="text" name="email" value="<? echo stripslashes($email); ?>" class="<? if ($emailNeeded || $invalidEmail || $alreadyExists) {echo 'required';} ?>" />
<div class="clear"></div>

<label>Password: *</label>
<input type="password" name="password" value="<? echo stripslashes($password); ?>" class="<? if ($passwordNeeded || $dontMatch) {echo 'required';} ?>" />
<div class="clear"></div>

<label>Retype Password: *</label>
<input type="password" name="retype" value="<? echo stripslashes($retype); ?>" class="<? if ($retypeNeeded || $dontMatch) {echo 'required';} ?>" />
<div class="clear"></div>

<label class="checkbox">
	<input type="checkbox" name="subscribe" value="1" <? if ($subscribe == 1) {echo 'checked';} ?>  />
	I would like to sign up for the TCC newsletter
</label>
<div class="clear10"></div>

<label class="checkbox">
	<input type="checkbox" name="do_not_contact" value="1" <? if ($do_not_contact == 1) {echo 'checked';} ?>  />
	Please do not use this email for communications
</label>

<div class="clear30"></div>

<button type="submit" class="redButtonLarge"> Sign Up </button>
<div class="clear"></div>