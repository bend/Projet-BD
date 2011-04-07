<fieldset>
<legend>Edit a supplier</legend>
<fieldset>
<legend> Choose a supplier </legend>
	<?php
		include("../lists/supplier_list.php");	
	?>
</fieldset>
<legend> Personnal info</legend> 
<ol>   
<li>   
<label for="name">Name:</label>   
<input id="name" name="name" class="text" type="text" readonly="true"/>   
</li>   
<li>   
<label for="Surname">Surname</label>   
<input id="surname" name="surname" class="text" type="text" readonly="true"/>   
</li>   
<li>   
<label for="">VAT number</label>   
<input id="vatnum" name="vatnum" readonly="true" class="text" type="text" />
</li>   
</ol>
</fieldset>   
<fieldset>   
<legend> Address</legend>   
<ol>   
<li>   
<label for="RoadName">Road name:</label>   
<input id="roadname" name="roadname" class="text" readonly="true"
type="text" />   
</li>   
<li>   
<label for="RoadNumber">Road number</label>   
<input id="roadnumber" name="roadnumber" class="text"   
type="text" readonly="true"/>   
<span id="road_num_ok"></span>
</li>   
<li>   
<label for="suburb">Suburb/Town:</label>   
<input id="suburb" readonly="true" name="suburb" class="text"   
type="text" />   
</li>   
<li>   
<label for="postcode">Postcode:</label>   
<input id="postcode" name="postcode"   
class="text textSmall" type="text" readonly="true"/>   
</li>  
<li>   
<label for="country">Country:</label>   
<input id="country" readonly="true" name="country" class="text"   
type="text" />   
</li>   
<li>   
<label for="banckrupt">Banckrupcy</label>   
<input id="banckrupt" readonly="true" name="banckrupt" class="text"   
type="text" />   
</li>   
</ol>   
</fieldset>
<div id="loading"></div>
</fieldset>

