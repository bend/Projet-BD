<fieldset>
	<legend>Sell a product</legend>
	<fieldset>
		<legend>Choose a Product</legend> 
		<ol>   
			<li>
				<label for="Product">Product</label>
				<?php
					include("../utils/database_connection.php");
					include("../lists/product_list_load_union.php");
				?>
				<li>
				<a class="load" hidden="true" id="fancy" href="javascript:;" >preview product</a>
				</li>
				<li>
					<label for="repo">Repository</label>
					<span id="repo"><select id=repo_list><option>-----</option></select></span>
				</li>
				<li>
					<label for="Quantity">Quantity</label>
					<span id="quantity"><Select id="quantity_list"><option>-----</option></select></span>
					<span id="quantity_ok"></span>
				</li>
				<li>
					<input type="button" value="add"id="add" onclick="javascript:add_to_cart_sell();"/>
					<span id="add_ok"></span>
					<input type="hidden" id="cart"/>
				</li>
			</li>   
		</ol>
	</fieldset>   
	<fieldset>   
		<legend>Choose a Client</legend>   
		<ol>   
			<li>
				<?php
					include("../lists/client_list_noload.php");
				?>	
			</li>
		</ol>
		</fieldset>
		<input type="button" value="Save Transaction" onclick="javascript:transaction_sell();"/>
		<div id="loading"></div>
	</fieldset>
</fieldset>
