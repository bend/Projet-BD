<fieldset>
<legend>Edit a client</legend>
<fieldset>
<legend> Choose a client </legend>
	<?php
		include("../lists/client_list.php");	
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
</ol>   
</fieldset>
<div id="loading"></div>
</fieldset>

