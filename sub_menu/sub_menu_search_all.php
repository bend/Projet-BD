<div id="sub_menu_title">
	Search all options
</div>

<?php
$search = $_POST['search'];
?>
<div id="sub_menu_contents">
<?php
echo '<li><a href="javascript:;" onclick="javascript:load_search_page(\'search/search_products.php\',\'';
echo $search;
echo '\');">Products</a></li><br/>';

echo '<li><a href="javascript:;" onclick="javascript:load_search_page(\'search/search_clients.php\',\'';
echo $search;
echo '\');">Clients</a></li><br/>';

echo '<li><a href="javascript:;" onclick="javascript:load_search_page(\'search/search_suppliers.php\',\'';
echo $search;
echo '\');">Suppliers</a></li><br/>';
?>
</div>
