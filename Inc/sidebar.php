<?php
include "../vendor/autoload.php";
//include __DIR__."/../scripts/disqus.php";

?>
<?php  //include "../scripts/js.php";?>

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <p class="h3">RECENT POST</p>
    <?php

    $query ='SELECT * FROM `tbl_post`';
    $post = $db->select($query);

    if (  $post)
    {
        while($result = $post->fetch_assoc())
        {
            ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="link_id">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <a href="../Template/Excellent.php?id=<?php echo $result['id'];?>"><img src="../Dashboard/admin/<?php echo $result['img'];?>" alt="" class="img-responsive"> </a>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <h4><a href="../Template/Excellent.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?>  </a> </h4>
                    <p><a href="../Template/Excellent.php?id=<?php echo $result['id'];?>"><?php echo $fm->textShorten($result['body'],130);?>   </a> </p>
                </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

    <p class="h3">CATEGORIES</p>
    <?php
    $query = 'SELECT * FROM `tbl_category`';
    $category = $db->select($query);
     if ($category)
     {
         while($catResult = $category->fetch_assoc())
         {
             ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="link_id">
      <!--  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <img src="Dashboard/admin/<?php echo $catResult['img'];?>" alt="" class="img-responsive">
        </div>-->
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <p><a href="../Template/Template.php?category=<?php echo $catResult['id'];?>"><?php echo $catResult['name'];?>  </a> </p>
        </div>
    </div>
    </div>
             <?php
         }
     }
    ?>



