
<?php
echo '
<fieldset>
	<div id="gallery">';
		$dir = '../gallery/';
		$abs_dir = 'gallery/';
		// open specified directory
		$dirHandle = opendir($dir);
		while ($file = readdir($dirHandle)) {
		if(!is_dir($file) && (strpos($file, '.jpg') || strpos($file,'.png') ||  strpos($file, '.jpeg') ||  strpos($file, '.gif'))>0) {
		echo '<img  width="100" src="';
		echo $abs_dir;
		echo $file;
		echo '"/>';
		}
		}
		closedir($dirHandle);
		echo '</div>
</fieldset>';
?>
