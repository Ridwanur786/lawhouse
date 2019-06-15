<?php
include __DIR__ . "/../vendor/autoload.php";
include __DIR__ ."/../Inc/header.php";
require_once __DIR__ . "/../scripts/meta.php";
$securePost = mysqli_real_escape_string($db->link,$fm->validation($_GET['id']));
 if(!isset($securePost)|| ($securePost)== NULL)
                    {
                        echo"No post found";
                    }else
                    {
                    $id = $securePost;
					}
?>
<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			
                <div class="row">
                    <?php
                    $query = "SELECT *  FROM `tbl_post` WHERE `id`='$id'";
                    $post = $db->select($query);
                    if ($post)
                    {
                    while ($result = $post->fetch_assoc()) {
                    ?>
                    <p class="h1 text-center"><?php echo $result['title']; ?>  </p>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img src="../Dashboard/admin/<?php echo $result['img']; ?>" alt="img"
                             class="img-responsive center-block">
                        <p><?php echo $result['body']; ?> </p>
                    </div>

                <h4>By <?php echo $result ['author']; ?> </h4>
                <p><?php echo $fm->DateFormat($result['date']); ?> </p>
                <?php
                }

                } else {
                    echo "no post found";
                }            
                ?>
                </div>
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <!--disqus-->		   
<?php 
 //include "../scripts/disqus.php";
?>
                </div>
              </div>                                
            </div>
           
		   <?php include "../Inc/sidebar.php";?>
       </div>

    </div>
	
</section>
<?php
include "../Inc/footer.php";
?>
