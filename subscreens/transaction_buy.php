<fieldset>
	<legend>Buy a product</legend>
	<fieldset>
		<legend>Choose a Product</legend> 
		<ol>   
			<li>
			<fieldset>
				<?php
				include("../utils/database_connection.php");
				include("../lists/product_list_noload.php");
				?>
				<li>
				<br/>
				<a class="load" hidden="true" id="fancy" href="javascript:;" >preview product</a>
				</li>
				<label for="Quantity">Quantity</label>
				<input id="quantity" name="quantity" class="text" type="text" onblur="javascript:check_is_notnull_int(this.value,'quantity_ok');"/>
				<span id="quantity_ok"></span>
			</fieldset>
			</li>
			<li>
			<input type="button" value="add"id="add" onclick="javascript:add_to_cart();"/>
			<span id="add_ok"></span>
			<input type="hidden" id="cart"/>
			</li>   
		</ol>
	</fieldset>   
	<fieldset>   
		<legend>Choose a Supplier</legend>   
		<ol>   
			<li>
			<?php
			include("../lists/supplier_list_active_noload.php");
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
	<input type="button" value="Save Transaction" onclick="javascript:transaction_buy();"/>
	<div id="loading"></div>
</fieldset>
