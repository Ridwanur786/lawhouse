<?php
require_once __DIR__ ."/../vendor/autoload.php";
?>

<?php

	if(isset($_GET['pageid']))
	{
	$pageId =$_GET['pageid'];
    $titleQuery = "select * from `tbl_page` WHERE `id`='".$pageId."'";
    $navigation = $db->select($titleQuery);
    if ($navigation)
    {
        while($aboutResult = $navigation->fetch_assoc()) {
            ?>
            <title><?php  echo $aboutResult['name'];?>-<?php echo TITLE;?></title>
            <?php
        }
    }
}elseif(isset($_GET['id'])) {
		$postId =isset($_GET['id']);
    //$postTitleId = $postId;
    $titleQuery = "select * from `tbl_post` WHERE `id`= '".$postId ."'";
    $navigation = $db->select($titleQuery);
    if ($navigation) {
        while ($aboutResult = $navigation->fetch_assoc()) {
            ?>
            <title><?php echo $aboutResult['title']; ?>-<?php echo TITLE ?></title>
			<!--<meta name="Description" content="<?php //echo $aboutResult['body'];?>">-->
            <?php
        }
    }
}elseif(isset($_GET['category'])) {
	$categoryId = $_GET['category'];
   // $postCategoryId = $categoryId;
    $titleQuery = "select * from `tbl_category` WHERE `id`='".$categoryId."'";
    $navigation = $db->select($titleQuery);
    if ($navigation) {
        while ($aboutResult = $navigation->fetch_assoc()) {
            ?>
            <title><?php echo $aboutResult['name']; ?>-<?php echo TITLE; ?></title>
            <?php
        }
    }
	}else
{
    ?>
    <title> <?php  echo $fm->title();?>-<?php echo TITLE ;?></title>
    <?php
}
?>
<meta charset="UTF-8">
<?php
if (isset($_GET['id']))
{

    $keyId = $_GET['id'];
    $keywordsQuery = 'SELECT * FROM `tbl_post` WHERE `id`='.$keyId;
    $keyword= $db->select($keywordsQuery);
    if ($keyword)
    {
        while($keywordResult = $keyword->fetch_assoc())
        {
            ?>
            <meta name="keywords" content="<?php echo $keywordResult['tags'];?>">
            <?php
        }
    }
}else
{
    ?>
    <meta name="keywords" content="<?php echo KEYWORDS;?>">
    <?php
}

?>
<!--<meta name="language" content="English"> -->

