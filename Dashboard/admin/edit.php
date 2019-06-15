<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<?php
if (!isset($_GET['catId'])|| $_GET['catId']==NULL)
{
    echo "<script>
window.location= 'catlist.php';
</script>";
}else
{
    $id = $_GET['catId'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change your Category</h2>
        <div class="block copyblock">
            <?php
            if ($_SERVER['REQUEST_METHOD']=='POST')
            {
                $name = $_POST['name'];
                $name = mysqli_real_escape_string($db->link, $name);
                if(empty($name))
                {
                    echo "<span class='error'>Category Must not be empty!!</span>";
                }
                else
                {
                    $query = "UPDATE `tbl_category` SET `name`='$name' WHERE `id`='$id'";
                    $update= $db->update($query);
                    if ($update)
                    {
                        echo "<span class='success'>Category updated Successfully!!</span>";
                    }else
                    {
                        echo "<span class='error'>Failed to update Category!!</span>";
                    }
                }
            }
            $query = "SELECT * FROM `tbl_category` WHERE `id`='$id' ORDER BY id DESC ";
            $category = $db->select($query);
            while($result = $category->fetch_assoc())
            {
            ?>
            <form action ="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="name" value="<?php echo $result['name'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include __DIR__."/../admin/Inc/adminFooter.php";?>