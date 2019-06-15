<?php
include "../vendor/autoload.php";
$path = $_SERVER['SCRIPT_FILENAME'];
    $currentPage = basename($path,'.php');
	if($currentPage == 'index')
	{
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/scroll.js"></script>
<script src="../js/btn.js"></script>
<?php
	}elseif($id = mysqli_real_escape_string($db->link,isset($_GET['id'])))
	{
		if($currentPage=='Excellent')
		{
			$urlQuery = "SELECT * FROM `tbl_post` WHERE `id`= '".$id."'";
			$url = $db->select($urlQuery);
			if($url)
			{
				?>
				<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/scroll.js"></script>
				<?php
			}
		}
	}elseif($currentPage== 'Template')
	{
		if($catId = mysqli_real_escape_string($db->link,isset($_GET['category'])))
		{
		$catQuery = "SELECT * FROM `tbl_category` WHERE `id`= '".$catId."'";
		$cat = $db->select($catQuery);
		if($cat)
		{
			?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/scroll.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/btn.js"></script>
			<?php
		}
	}
	}elseif($currentPage=='page')
	{		
			?>
			<script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/scroll.js"></script>
			<?php
		
	
	}elseif($currentPage=='contact' )
	{
		?>
		<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUPwqz5HEm-P_AQsZDEPEQLE9jJ7AxfyU&callback=initialize"></script>
<script src="../js/maps.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/ajax_form.js"></script>
<script src="../js/scroll.js"></script>
		<?php
	}

?>

