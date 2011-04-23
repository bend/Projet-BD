<fieldset>
	<legend>Edit a supplier</legend>
	<fieldset>
		<legend> Choose a supplier </legend>
		<?php
		include("../utils/database_connection.php");
		include("../lists/supplier_list.php");	
		?>
	</fieldset>
	<legend> Personnal info</legend> 
	<ol>   
		<li>   
		<label for="name">Name:</label>   
		<input id="name" name="name" class="text" type="text" />   
		</li>   
		<li>   
		<label for="Surname">Surname</label>   
		<input id="surname" name="surname" class="text" type="text" />   
		</li>   
		<li>   
		<label for="">VAT number</label>   
		<input id="vatnum" name="vatnum" readonly="true" class="text" type="text" />
		<span id="available"></span>
		</li>   
	</ol>
</fieldset>   
<fieldset>   
	<legend> Address</legend>   
	<ol>   
		<li>   
		<label for="RoadName">Road name:</label>   
		<input id="roadname" name="roadname" class="text"   
		type="text" />   
		</li>   
		<li>   
		<label for="RoadNumber">Road number</label>   
		<input id="roadnumber" name="roadnumber" class="text"   
		type="text" onblur="javascript:check_isnum(this.value,'road_num_ok');"/>   
		<span id="road_num_ok"></span>
		</li>   
		<li>   
		<label for="suburb">Suburb/Town:</label>   
		<input id="suburb" name="suburb" class="text"   
		type="text" />   
		</li>   
		<li>   
		<label for="postcode">Postcode:</label>   
		<input id="postcode" name="postcode"   
		class="text textSmall" type="text"  onblur="javascript:check_isnum(this.value,'post_code_ok');"/>   
		<span id="post_code_ok"></span>
		</li>  

		<li>   
		<label for="country">Country:</label>   
		<input id="country" name="country" class="text"
		type="text" />   
		</li>   
		<label for="banckrupt">Banckruptcy</label>   
		<input id="banckrupt" name="banckrupt" class="text" onblur="javascript:check_isbool(this.value,'banckrupt_ok');" type="text" />   
		<span id="banckrupt_ok"></span>
		</li>  
	</ol>
</fieldset>
<input type="button" id="button_ok" disabled="true" value="Submit" onclick="javascript:update_supplier();"/>
<div id="loading"></div>
</fieldset>

