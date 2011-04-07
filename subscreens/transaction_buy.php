<fieldset>
<legend>Buy a product</legend>
<fieldset>
<legend>Choose a Product</legend> 
<ol>   
<li>
<?php
include("../loads/client_load.php");
?>

</li>   
<li>   
<label for="Quantity">Quantity</label>   
<input id="quantity" name="quantity" class="text" type="text" />   
</li>   
</ol>
</fieldset>   
<fieldset>   
<legend>Choose a Supplier</legend>   
<ol>   
<li>
<input type="text"/>
</li>
</ol>
</fieldset>
<fieldset>   
<legend>Choose a Repository</legend>   
<ol>   
<li>
<input type="text"/>
</li>
</ol>
</fieldset>
<input type="button" value="Submit" onclick="javascript:transaction_buy();"/>
<div id="loading"></div>
</fieldset>
</fieldset>
