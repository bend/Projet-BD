<fieldset>
	<legend>Top products</legend>
	<fieldset>
		<legend>Choose date</legend>
		<legend>From</legend>
		<select id="month_from">
			<option> - MONTH - </option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>


		<select id="year_from">
			<option> - YEAR - </option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
		</select>
		<legend>To</legend>

		<select id="month_to">
			<option> - MONTH - </option>
			<option value="1">01</option>
			<option value="2">02</option>
			<option value="3">03</option>
			<option value="4">04</option>
			<option value="5">05</option>
			<option value="6">06</option>
			<option value="7">07</option>
			<option value="8">08</option>
			<option value="9">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>


		<select id="year_to">
			<option> - YEAR - </option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
		</select>
		<input type="button" value="Go" onclick="javascript:load_top_products_chart();"/>
	</fieldset>
	<fieldset>
		<legend>PIE Chart</legend>
		<div id="chart"></div>
	</fieldset>
</fieldset>
