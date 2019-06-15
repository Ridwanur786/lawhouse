<?php
//include "../lib/Session.php";
//require_once __DIR__."/../vendor/autoload.php";
//include "../config/config.php";
//include "../lib/Database.php";
include "../Inc/header.php";
//$db = new Database();
$securePage = mysqli_real_escape_string($db->link,$fm->validation($_GET['pageid']));
if (!isset($securePage)|| isset($securePage)==NULL)
{
    echo "page Not found";
}else
{
    $pageId =$securePage;
}
?>
<?php  require_once __DIR__ . "/../scripts/meta.php";?>
<?php //include __DIR__."/../scripts/js.php";?>
<?php  //include __DIR__.'/../scripts/css.php';?>
<section id="about">
    <div class="container">
        <div class="row">
            <?php
            $query = 'SELECT * FROM `tbl_page` WHERE `id`='.$pageId;
            $aboutAdmin = $db->select($query);
            if ($aboutAdmin)
            {
                while($adminResult = $aboutAdmin->fetch_assoc())
                {
                    ?>
           <p class="h1 text-center"> <?php echo $adminResult['name'];?></p>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <img src="../Dashboard/upload/<?php echo $adminResult['image'];?>" alt="img" class="img-responsive img-circle">
            </div>
                    <?php
                }
            }
            ?>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <?php
             $postQuery ="SELECT * FROM `tbl_post`";
             $post = $db->select($postQuery);
            $postResult= $post->fetch_assoc();
             if ($post)
             {
           ?>
                <p class="h2"><?php echo $postResult['author'];?> </p>
                     <?php
             }
            ?>
<?php
$query = 'SELECT * FROM `tbl_page` WHERE `id`='.$pageId;
$aboutAdmin = $db->select($query);
if ($aboutAdmin)
{
    while($adminResult = $aboutAdmin->fetch_assoc())
    {
        ?>
                <p class="mce_h4"><?php echo $adminResult['body'];?></p>
            </div>
        <?php
        }
        }
        ?>
        </div>
    </div>
</section>
<?php
include "../Inc/footer.php";
?>