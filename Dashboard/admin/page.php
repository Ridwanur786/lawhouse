<?php //require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
  <?php
  if (!isset($_GET['pageid'])|| isset($_GET['pageid'])==NULL)
  {
  if (!headers_sent())
  {
      header('Location : index.php');
  }
  }else
  {
      $pageId = $_GET['pageid'];
  }
        ?>
<style>
    .actionDelete
    {
        margin-left: 20px;
    }
    .actionDelete a {
        border: 1px solid #FF0000;
        color: #444;
        cursor: pointer;
        font-size: 20px;
        padding: 2px 10px;
        font-weight: normal;
        background: #e3dfe3;

    }

</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update page</h2>
      <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
$name =  $fm->validation($_POST['name']);
$body =  $fm->validation($_POST['body']);
            $name = mysqli_real_escape_string($db->link,$name);
            $body = mysqli_real_escape_string($db->link,$body);

             $permited =array('jpg', 'jpeg', 'png', 'gif');
             $file_name=$_FILES['image']['name'];
             $file_size=$_FILES['image']['size'];
             $file_temp=$_FILES['image']['tmp_name'];
             $div=explode('.',$file_name);
             $file_ext=strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
             $uploaded_image="../upload/".$unique_image;

            if(($name=="" || $body==""))
            {
                echo "<span>Field Must Not Be empty!!</span>";
            }else
            {
            if (!empty($file_name))
            {
              if ($file_size >1048567) {
                  echo "<span class='error'>Image Size should be less then 1MB!
       </span>";
              } elseif (in_array($file_ext, $permited) === false) {
                  echo "<span class='error'>You can upload only:-"
                      .implode(', ', $permited)."</span>";
              } else{
                 move_uploaded_file($file_temp,$uploaded_image);
                $query ="UPDATE `tbl_page`
                SET
                `name`= '$name',
                `image`= '$uploaded_image',
                `body`= '$body'
                WHERE `id`='$pageId'
                ";
                $updated_row = $db->update($query);
                if ($updated_row) {
                    echo "<span class='success'>page updated Successfully.
     </span>";
                }else {
                    echo "<span class='error'>Page Not updated !</span>";
                }
            }
            }else
            {
                $query ="UPDATE `tbl_page`
                SET
                `name`='$name',
                `body`='$body'
                WHERE `id`='$pageId'
                ";
                $updated_row = $db->update($query);
                if ($updated_row) {
                    echo "<span class='success'>page updated Successfully.
     </span>";
                }else {
                    echo "<span class='error'>Page Not updated !</span>";
                }
            }
            }
        }
        ?>
        <div class="block">
            <?php
             $updateQuery = "SELECT * FROM `tbl_page` WHERE `id`='$pageId' ORDER BY `id` DESC";
             $pageUpdate = $db->select($updateQuery);
             if ($pageUpdate)
             {
                 while($updateResult= $pageUpdate->fetch_assoc())
                 {
                     ?>
            <form action=" " method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $updateResult['name'];?>" class="medium" />
                        </td>
                    </tr>
                    <!--   <tr>
                        <td>
                            <label>Category</label>
                        </td>
                       <td>
                            <select id="select" name="cat">
                                <option>select category</option>

                               // $query = "SELECT * FROM `tbl_category`";
                              //  $category = $db->select($query);
                              /*  if ($category )
                                {
                                    while($result = $category->fetch_assoc())
                                    {
                                        ?>
                                        <option value="</option>
                                       }
                                }*/
                            </select>
                        </td>
                    </tr>-->
              <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="../admin/<?php echo $updateResult['image'];?>" alt="updatedImage" width="100px;" height="70px;">
                            <br>
                            <input type="file" name="image"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                                <?php echo $updateResult['body'];?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                            <span class="actionDelete"><a onclick="return confirm('ARE YOU SURE TO DELETE THIS Page?')" href="deletePage.php?deleteid=<?php echo $updateResult['id'];?> ">Delete</a></span>
                        </td>
                    </tr>
                </table>
            </form>
                     <?php
                 }
             }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
      //  setDatePicker('date-picker');
       // $('input[type="checkbox"]').fancybutton();
       // $('input[type="radio"]').fancybutton();
    });
</script>
<?php include __DIR__."/../admin/Inc/adminFooter.php";?>

