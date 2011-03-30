<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Stock Admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" media="screen" href="style_sheet.css" />
		<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=API_KEY"></script>
<script type="text/javascript" src="javascript/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="javascript/jquery.gmap-1.1.0.js"></script>
    </head>
    <body>
        <div id="header">
            <?php
            require("header.php");
            ?>
        </div>
        <div id="menu">
            <?php
            include("menu.php");
            ?>
        </div>
        <div id="contents">
		<?php
        require("suppliers_screen.php");
        ?>
        </div>
		<div id="footer">
			<?php
			require("footer.php");
 			?>
        </div>
    </body>

</html>
