<fieldset>
<legend>View a product</legend>
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
</li>   
<li>   
<label for="Brand">Brand</label>   
<input id="brand" readonly="readonly" name="brand" class="text" type="text" />   
</li>   
<li>   
<label for="Denomination">Denomination:</label>   
<input id="denom" readonly="readonly" name="denom" class="text" type="text" />   
</li>   
</ol>
<ol>   
<li>   
<label for="Description">Description:</label>   
<input id="description" readonly="readonly" name="description" class="text"   
type="text" />   
</li>   
<li>   
<label for="">Contenance</label>   
<input id="contenance" readonly="readonly" name="contenance" class="text"   
type="text" />   
</li>   
<li>   
<label for="barcode	">BarCode</label>   
<input id="barcode" readonly="readonly" name="barcode" class="text"   
type="text" />   
</li>   
<li>   
<label for="sellprice">Selling Price</label>   
<input id="sellprice" name="sellprice"   
class="text text" type="text"  readonly="readonly" />   
</li>  
<li>   
<label for="buyprice">Buying Price</label>   
<input id="buyprice" name="buyprice" class="text"   
type="text" readonly="readonly"/>   
</li>   
<li>   
<label for="vatrate">VAT Rate</label>   
<input id="vatrate" name="vatrate" class="text"   
type="text" readonly="readonly" />   
</li>
<li>   
<label for="imgpath">Image</label>
<a id="zoom_img"  href="">
<img id="imgpath"   name="imgpath"  onerror="javascript:this.src='img/empty.png';" width="200" heigth="200" class="text" alt="" />
</a>
</li>   
<div id="loading"></div>
</fieldset>
</ol>   

