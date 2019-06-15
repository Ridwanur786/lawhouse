<?php
include "../lib/Database.php";
include "../config/config.php";
include "../helpers/Format.php";
$fm= new Format();
$db = new Database();
?>

<!DOCTYPE html>
        <html lang="en">

        <head>
<!--<meta name="language" content="English"> -->
<?php
              include __DIR__ .'/../scripts/css.php';
			  require_once __DIR__ . "/../scripts/exceptionHeader.php";
			  ?>				
			 <style>
            .row{
                margin:0;
            }
        </style>
        </head> 
<?php
$query ="SELECT * FROM `tbl_post` ORDER BY `id` DESC";
$post = $db->select($query);
        ?>
				
        <body>
        <header>
            <section id="smedia">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 navbar-left">
                            <p><a href="../Template/contact.php"><i class="fas fa-mobile"></i>  01971982959</a> </p>
                        </div>
                        <div class="col-sm-4">
                            <?php
                            $slgQuery = "SELECT * FROM `tbl_social` WHERE `id`= '1'";
                            $socialMedia = $db->select($slgQuery);
                            if($socialMedia )
                            {
                            while($socialResult = $socialMedia->fetch_assoc()) {
                            ?>
                            <a href="<?php echo $socialResult['fb']; ?>" target = "_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="<?php echo $socialResult['tw']; ?>" target = "_blank"><i class="fab fa-twitter"></i></a>
                            <a href="<?php echo $socialResult['pin']; ?>" target = "_blank"><i class="fab fa-pinterest-p"></i></a>
                            <a href="<?php echo $socialResult['gplus']; ?>" target = "_blank"> <i class="fab fa-google-plus-g"></i></a>
                            <a href="<?php echo $socialResult['ln']; ?>" target = "_blank"> <i class="fab fa-linkedin-in"></i></a>
                            <?php
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Navbar Starts -->
            <div class="row">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="../Template/index.php">
                        <?php
                        $slgQuery = "SELECT * FROM `title_slogan` WHERE `id`= '1'";
                        $getTitle = $db->select($slgQuery);
                        if($getTitle)
                        {
                            while($slgResult = $getTitle->fetch_assoc())
                            {
                        ?>
                      <img src="../Dashboard/admin/<?php echo $slgResult['logo'];?>" alt="logo" class="img-responsive">
                                <?php
                            }
                        }
                        ?>
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right nav_link">
                            <?php
                            $path = $_SERVER['SCRIPT_FILENAME'];
                            $currentPage = basename($path,'.php');
                            ?>
                            <li <?php if($currentPage == 'index'){echo 'class ="active"';}?>><a  href="../Template/index.php">Home <span class="sr-only">(current)</span></a></li>

                            <li class="dropdown" <?php if($currentPage == 'Excellent'){echo 'class ="active"';}?>>

                                <a  href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true">Post<span class="caret"></span></a>
                                <ul class="dropdown-menu nav_link"  aria-labelled-by="dLabel">
                                    <?php
                                    if ($post){
                                    while($result = $post->fetch_assoc())
                                    {
                                    ?>
                                    <li>
									<a  href="../Template/Excellent.php?id=<?php echo $result['id'];?>">
									<p>
									<?php echo $result['title'];?>
									</p>
									</a>
									</li>
                                    <?php }
                                    }else{
                                        echo "data not Found!!";
                                    }?>
                                </ul>

                            </li>
                              <?php
                             $aboutQuery = "select * from `tbl_page`";
                             $navigation = $db->select($aboutQuery);
                             if ($navigation)
                             {
                                 while($aboutResult = $navigation->fetch_assoc())
                                 {
                                     ?>

                            <li
                                <?php if (isset($_GET['pageid'])&& $_GET['pageid']== $aboutResult['id'])
                                {
                                    echo 'class ="active"';
                                }
                                ?>
                            > <a href="../Template/page.php?pageid=<?php  echo $aboutResult['id'];?>"><?php  echo $aboutResult['name'];?>
                                </a>
                            </li>
                                     <?php
                                 }
                             }
                            ?>
                            <li <?php if($currentPage == 'contact'){echo 'class ="active"';}?> ><a href="../Template/contact.php">Contact</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            </div>
            <!-- Navbar Ends -->
        </header>
        <!-- header ended -->