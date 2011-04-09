<fieldset>
<legend>Buy a product</legend>
<fieldset>
<legend>Choose a Product</legend> 
<ol>   
<li>
<?php
	include("../utils/database_connection.php");
	include("../lists/product_list_noload.php");
?>
</li>   
<li>   
<label for="Quantity">Quantity</label>   
<input id="quantity" name="quantity" class="text" type="text" onblur="javascript:check_isnum(this.value,'quantity_ok');"/>   
<span id="quantity_ok"></span>
</li>   
</ol>
</fieldset>   
<fieldset>   
<legend>Choose a Supplier</legend>   
<ol>   
<li>
<?php
	include("../lists/supplier_list_noload.php");
?>	
</li>
</ol>
</fieldset>
<fieldset>   
<legend>Choose a Repository</legend>   
<ol>   
<li>
<?php
	include("../lists/repository_list_noload.php");
?>
</ol>
</fieldset>
<input type="button" value="Submit" onclick="javascript:transaction_buy();"/>
<div id="loading"></div>
</fieldset>
</fieldset>
