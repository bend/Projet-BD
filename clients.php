
<?php
session_start();
include("header.php");
?>
        <div id="contents">
		<?php
        require("clients_screen.php");
        ?>
        </div>
		<div id="footer">
			<?php
			require("footer.php");
 			?>
        </div>
    </body>

</html>

<script type="text/javascript">
	show_all();
</script>
