<fieldset>
	<legend>Add new Repository</legend>
	<fieldset>
		<legend>Info</legend> 
		<ol>   
			<li>   
			<label for="name">Name:</label>   
			<input id="name" name="name" class="text" type="text" onblur="javascript:check_repo_name(this.value);"/>   
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
			class="text" type="text" onblur="javascript:check_isnum(this.value,'post_code_ok');"/>   
			<span id="post_code_ok"></span>
			</li>  

			<li>   
			<label for="country">Country:</label>   
			<input id="country" name="country" class="text"   
			type="text" />   
			</li>   
		</ol>   
	</fieldset>   
	<input type="button" value="Add" onclick="javascript:add_repo();"/>
	<div id="loading"></div>
</fieldset>

