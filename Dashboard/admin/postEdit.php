<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<?php
if (!isset($_GET['editpostid'])|| isset($_GET['editpostid'])==NULL)
{
    echo "<script>
window.location= 'postlist.php';
</script>";
}else
{
    $postId = $_GET['editpostid'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Post</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
            $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
            $author = mysqli_real_escape_string($db->link, $_POST['author']);
            $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
            $userId = mysqli_real_escape_string($db->link, $_POST['userid']);


            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_temp = $_FILES['img']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../upload/".$unique_image;

            if($title== ""|| $body== ""|| $tags == ""|| $author == ""|| $cat == "")
            {
                echo "<span>Field Must Not Be empty!!</span>";
            }else
            {
            if (!empty($file_name))
            {
            if ($file_size >1048567)
            {
                echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
            } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-"
                    .implode(', ', $permited)."</span>";
            } else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query ="UPDATE `tbl_post`
                SET
                `title`='$title',
                `body`='$body',
                `img`='$uploaded_image',
                `tags`='$tags',
                `author`='$author',
                `cat`='$cat',
                `userid`='$userId'
                WHERE `id`='$postId'
                ";
                $updated_row = $db->update($query);
                if ($updated_row ) {
                    echo "<span class='success'>Data Updated Successfully.
     </span>";
                }else {
                    echo "<span class='error'>Data Not Updated!</span>";
                }
            }
            }else
            {
                $query ="UPDATE `tbl_post`
                SET
                `title`='$title',
                `body`='$body',
                `tags`='$tags',
                `author`='$author',
                `cat`='$cat',
                 `userid`='$userId'
                WHERE `id`='$postId'
                ";
                $updated_row = $db->update($query);
                if ($updated_row ) {
                    echo "<span class='success'>Data Updated Successfully.
     </span>";
                }else {
                    echo "<span class='error'>Data Not Updated!</span>";
                }
            }
            }
        }
        ?>
        <div class="block">
            <?php
            $query = "SELECT * FROM `tbl_post` WHERE `id`='$postId' ORDER BY `id` DESC ";
            $getPost = $db->select($query);
            if ($getPost)
            {
                while($postResult = $getPost->fetch_assoc())
                {
                    ?>
            <form action=" " method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $postResult['title'];?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="cat">
                                <option>select category</option>
                                <?php
                                $query = "SELECT * FROM `tbl_category`";
                                $category = $db->select($query);
                                if ($category )
                                {
                                    while($result = $category->fetch_assoc())
                                    {
                                        ?>
                                        <option
                                            <?php
                                            if ($postResult['cat']== $result['id'])
                                            {
                                                ?>
                                                selected = "selected"
                                                <?php
                                            }
                                            ?>
                                            value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>
                                    <?php    }
                                }?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="../admin/<?php echo $postResult['img'];?>" height="100px;" width="200px;"/>
                            <br>
                            <input type="file" name="img" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                                <?php echo $postResult['body'];?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags"  value="<?php echo $postResult['tags'];?>"   class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>author</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="<?php echo Session::get('username');?>"   class="medium" />
                            <input type="hidden" name="userid" value="<?php echo Session::get('userId');?>"   class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
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
       // setDatePicker('date-picker');
       // $('input[type="checkbox"]').fancybutton();
       // $('input[type="radio"]').fancybutton();
    });
</script>

<?php include __DIR__."/../admin/Inc/adminFooter.php";?>

