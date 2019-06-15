<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<?php
if (!isset($_GET['viewPostid'])|| isset($_GET['viewPostid'])==NULL)
{
    echo "<script>
window.location= 'postlist.php';
</script>";
}else
{
    $postId = $_GET['viewPostid'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Post</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            echo "<script>location.replace('postlist.php')</script>";
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
                                   <?php echo $postResult['title'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Category</label>
                                </td>
                                <td>
                                        <?php
                                        $query = "SELECT * FROM `tbl_category`";
                                        $category = $db->select($query);
                                        $result = $category->fetch_assoc();
                                        if ($result) {
                                            if ($postResult['cat'] == $result['id']) {
                                                echo $result['name'];
                                            }
                                        }
                                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label> Image</label>
                                    </td>
                                <td>
                                    <img src="../admin/<?php echo $postResult['img'];?>" height="100px;" width="300px;"/>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Content</label>
                                </td>
                                <td>
                            <textarea col="10" row="40">
                                <?php echo $postResult['body'];?>
                            </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Tags</label>
                                </td>
                                <td>
                                   <?php echo $postResult['tags'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>author</label>
                                </td>
                                <td>
                                  <?php echo Session::get('username');?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="OK" />
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

