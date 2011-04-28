<fieldset>
	<legend>View a client</legend>
	<fieldset>
		<legend> Choose a client </legend>
		<?php
		include("../utils/database_connection.php");
		include("../lists/client_list_active.php");	
		?>
	</fieldset>

	<fieldset>
		<legend> Personnal info</legend> 
		<ol>   
			<li>   
			<label for="name">Name:</label>   
			<input id="name" name="name" readonly="readonly" class="text" type="text" />   
			</li>   
			<li>   
			<label for="Surname">Surname</label>   
			<input id="surname" name="surname" readonly="readonly" class="text" type="text" />   
			</li>   
			<li>   
			<label for="">VAT number</label>   
			<input id="vatnum" name="vatnum" readonly="readonly" class="text" type="text"/>
			</li>   
		</ol>
	</fieldset>   
	<fieldset>   
		<legend> Address</legend>   
		<ol>   
			<li>   
			<label for="RoadName">Road name:</label>   
			<input id="roadname" readonly="readonly" name="roadname" class="text"   
			type="text" />   
			</li>   
			<li>   
			<label for="RoadNumber">Road number</label>   
			<input id="roadnumber" readonly="readonly" name="roadnumber" class="text"   
			type="text" />   
			</li>   
			<li>   
			<label for="suburb">Suburb/Town:</label>   
			<input id="suburb" readonly="readonly" name="suburb" class="text"   
			type="text" />   
			</li>   
			<li>   
			<label for="postcode">Postcode:</label>   
			<input id="postcode" name="postcode"   
			class="text" type="text"  readonly="readonly" />   
			</li>  

			<li>   
			<label for="country">Country:</label>   
			<input id="country" readonly="readonly" name="country" class="text"   
			type="text" />   
			</li>   
			<li>   
			<label for="date_last_buy">Last purchase date</label>   
			<input id="date_last_buy" readonly="readonly" name="date_last_buy" class="text"   
			type="text" />   
			</li>   
		</ol>   
	</fieldset>
	<div id="loading"></div>
</fieldset>

