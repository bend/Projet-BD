<fieldset>
	<legend>Profit for the week</legend>
	<fieldset>
		<legend>Choose Week</legend>
		<legend>From</legend>
		<select id="week">
			<option> - WEEK - </option>
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
		</select>
		<select id="month">
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

		<select id="year">
			<option> - YEAR - </option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			<option value="2013">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
		</select>
		<legend>To</legend>

		<input type="button" value="Go" onclick="javascript:load_profit_week_chart();"/>
	</fieldset>
	<fieldset>
		<legend>Chart</legend>
		<div id="chart"></div>
	</fieldset>
</fieldset>
