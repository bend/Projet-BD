<fieldset>
<legend>Edit a Repository</legend>
<fieldset>
<legend> Choose a repository </legend>
	<?php
		include("../lists/repository_list.php");	
	?>
</fieldset>
<fieldset>
<legend>Info</legend> 
<ol>   
<li>   
<label for="name">Name:</label>   
<input id="name" name="name" readonly="true" class="text" type="text"/>   
<span id="available"></span>
</li>   
</ol>
</fieldset>   
<fieldset>   
<legend> Address</legend>   
<ol>   
<li>   
<label for="RoadName">Road name:</label>   
<input id="roadname" name="roadname" readonly="true" class="text"   
type="text" />   
</li>   
<li>   
<label for="RoadNumber">Road number</label>   
<input id="roadnumber" name="roadnumber" class="text"   
type="text" readonly="true"/>   
</li>   
<li>   
<label for="suburb">Suburb/Town:</label>   
<input id="suburb" readonly="true" name="suburb" class="text"   
type="text" />   
</li>   
<li>   
<label for="postcode">Postcode:</label>   
<input id="postcode" name="postcode"   
class="text" type="text" readonly="true" />   
<span id="post_code_ok"></span>
</li>  
  
<li>   
<label for="country">Country:</label>   
<input id="country" name="country" class="text" readonly="true"
type="text" />   
</li>   
</ol>   
</fieldset>   
<div id="loading"></div>
</fieldset>

