<fieldset>
<legend>Edit a product</legend>
<fieldset>
<legend> Choose a product </legend>
	<?php
		include("../utils/database_connection.php");
		include("../lists/product_list.php");	
	?>
</fieldset>
<ol>
<li>   
<label for="InternalRef">Internal ref:</label>   
<input id="ref" name="ref" class="text" type="text" readonly="readonly"/>   
<span id="available"></span>
</li>   
<li>   
<label for="Brand">Brand</label>   
<input id="brand" name="brand" class="text" type="text" />   
</li>   
<li>   
<label for="Denomination">Denomination:</label>   
<input id="denom" name="denom" class="text" type="text" />   
</li>   
</ol>
<ol>   
<li>   
<label for="Description">Description:</label>   
<input id="description" name="description" class="text"   
type="text" />   
</li>   
<li>   
<label for="">Contenance</label>   
<input id="contenance" name="contenance" class="text"   
type="text" onblur="javascript:check_isnum(this.value,'cont_ok');"/>   
<span id="cont_ok"></span>
</li>   
<li>   
<label for="barcode	">BarCode</label>   
<input id="barcode" name="barcode" class="text"   
type="text" onblur="javascript:check_isnum(this.value,'bar_ok');"/>   
<span id="bar_ok"></span>
</li>   
<li>   
<label for="sellprice">Selling Price</label>   
<input id="sellprice" name="sellprice"   
class="text text" type="text"  onblur="javascript:check_isnum(this.value,'sp_ok');" />   
<span id="sp_ok"></span>
</li>  
<li>   
<label for="buyprice">Buying Price</label>   
<input id="buyprice" name="buyprice" class="text"   
type="text" onblur="javascript:check_isnum(this.value,'bp_ok');" />   
<span id="bp_ok"></span>
</li>   
<li>   
<label for="vatrate">VAT Rate</label>   
<input id="vatrate" name="vatrate" class="text"   
type="text" onblur="javascript:check_isnum(this.value,'vat_ok');" />   
<span id="vat_ok"></span>
</li>   
<li>   
<label for="imgpath">Path To Image</label>  
<a id="zoom_img" href="javascript:;" hidden="true"></a>
<input id="imgpath" name="imgpath" class="text"/>
	<a id="choose" onclick="$.fancybox('<div id=\'gal\'></div><script>load_gallery();</script>',{
		'autoDimensions'	: true,
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic'
	}
);" href="javascript:;"/>Choose a picture</a>
</li>   
<input type="button" id="button_ok" disabled="true" value="Edit" onclick="javascript:update_product();"/>
<div id="loading"></div>
</fieldset>
</ol>   

