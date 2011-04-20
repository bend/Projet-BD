<fieldset>
	<legend>View a Transaction</legend>
	<fieldset>
		<legend> Select a Transaction</legend>
				<input type="text" value="Enter an id, VAT num or date" id="tr_search" name="search" size=40 onfocus=javascript:this.value="" onblur="javascript:if(this.value=='')this.value='Enter an id, VAT num or date'"/>
				<input type="button" value="Search" onclick="javascript:search_transaction();"/>
				<div id="loading1"></div>
	</fieldset>

	<fieldset>
		<legend>Results Found</legend>
		<div id="result_found">
			No Results Found
		</div>
	</fieldset>
</fieldset>
