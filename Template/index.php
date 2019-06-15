<?php
include "../vendor/autoload.php";
//include "../lib/Session.php";
include "../Inc/header.php";
?>
	<?php require_once __DIR__ . "/../scripts/meta.php"; ?>
<section id="main">
    <div class="container">
        <?php
		$securePage = mysqli_real_escape_string($db->link,$fm->validation(isset($_GET["page"])));
        if (is_numeric($securePage ))
        {
            $page =$securePage ;
        }else
        {
            $page=1;
        }
        $per_page = 5;
        $start_from = ($page-1)* $per_page;
        $query = "SELECT * FROM `tbl_post` LIMIT $start_from,$per_page";
        $post = $db->select($query);
        ?>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <?php
                  if($post)
                  {
                      while($result= $post->fetch_assoc())
                      {
                ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="link_id">
                    <p class="h2"><a href="Excellent.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></p>
                    <h4>By

                        <a
                            <?php

                     $aboutQuery = "select * from `tbl_page`";
                     $navigation = $db->select($aboutQuery);
                     if ($navigation)
                     {
                         while($aboutResult = $navigation->fetch_assoc())
                         {
                           ?>
                                href="page.php?pageid=<?php echo $aboutResult['id'];?>"

                                <?php
                            }
                            }
                            ?>
                                ><?php echo $result ['author'];?></a> </h4>
                    <p><?php echo $fm->DateFormat($result['date']);?> <span><a
                                    href="Excellent.php?id=<?php echo $result['id']; ?>">

                            </a></span> </p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <a href="Excellent.php?id=<?php echo $result['id'];?>"> <img src="../Dashboard/admin/<?php echo $result['img']?>" alt="" class="img-responsive"></a>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                           <p><?php echo $fm->textShorten($result['body']);?> </p>
                        </div>
                    </div>
                    <p class="text-right">
                        <a href="Excellent.php?id=<?php echo $result['id'];?>" class="btn btn-danger btn_click">Read More...</a>
                    </p>
                </div>
                </div>
                      <?php }
                            ?>
                   <!--pagination start-->
                      <ul class="pagination">
                      <?php
                      $query = "SELECT * from `tbl_post`";
                      $result= $db->select($query);
                      $total_rows = mysqli_num_rows($result);
                      $total_pages = ceil($total_rows/$per_page);
                      echo "<li>
                              <a href='index.php?page=1' aria-label='Previous'>
                                  <span aria-hidden='true'>&laquo</span>
                              </a>
                          </li>";
                      for ($i=1;$i<=$total_pages; $i++)
                          {
                              echo  "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
                          }
                      ?>
                          <?php
						  echo" <li>
                              <a href='index.php?page=$total_pages' aria-label='Next'>
                                  <span aria-hidden='true'>&raquo</span>
                              </a>
                          </li>"; ?>
                      </ul>
                   <!--pagination ends-->
                      <?php
                  }else{ echo "no data found!!";}
                      ?>
            </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		  <?php include "../Inc/sidebar.php";?>
		  
        </div>
    </div>
    </div>
</section>
<?php include "../Inc/footer.php";?>

