<fieldset>
<div id="gallery">
<?php
   $dir = 'gallery/';
   // open specified directory
   $dirHandle = opendir($dir);
   while ($file = readdir($dirHandle)) {
	   if(!is_dir($file) && (strpos($file, '.jpg') || strpos($file,'.png') ||  strpos($file, '.jpeg') ||  strpos($file, '.gif'))>0) {
		   echo '<a href="javascript:;"><img onclick="javascript:choose(this.src);" class="fright" width="100" src="';
		   echo $dir;
		   echo $file;
		   echo '"/></a>';
		}
   }
   closedir($dirHandle);
?>
</div>
</fieldset>
