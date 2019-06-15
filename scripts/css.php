<link rel="stylesheet"  href="../css/normalize.css">
<link rel="stylesheet" href="../css/fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php
$query = "SELECT * FROM `tbl_theme` WHERE `id`='1' ";
$theme= $db->select($query);
while($result = $theme->fetch_assoc())
{
    if ($result['theme']== 'default')
    {
        ?>
        <link rel="stylesheet" href="../theme/default.css">
<?php
    }elseif ($result['theme']=='change')
    {
        ?>
        <link rel="stylesheet" href="../theme/change.css">
<?php
    }
}
?>
<link rel="stylesheet" href="../css/style.css">
