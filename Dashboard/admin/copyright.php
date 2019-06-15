            <?php include "Inc/adminHeader.php";?>
            <?php include "Inc/adminSidebar.php";?>
                    <div class="grid_10">
                        <div class="box round first grid">
                            <h2>Update Copyright Text</h2>
                            <div class="block copyblock">
            <?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $copyText = mysqli_real_escape_string($db->link,$fm->validation($_POST['text']));


    if (empty($copyText))
    {
        echo "field must not be empty!!";
    }else
        {
            $copyQuery ="UPDATE `tbl_footer`
                SET
                `text`='$copyText'
                WHERE `id`='1'
                ";
            $updated_row = $db->update($copyQuery);
            if ($updated_row ) {
                echo "<span class='success'>Data Updated Successfully.
     </span>";
            }else {
                echo "<span class='error'>Data Not Updated!</span>";
            }
    }
}
            $copyQuery = "SELECT * FROM `tbl_footer` WHERE `id`= '1'";
            $copyright = $db->select($copyQuery);
            if($copyright ) {
                while ($copyResult = $copyright->fetch_assoc()) {
                    ?>
                    <form action=" " method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $copyResult['text']; ?>" name="text" class="large"/>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Update"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                <?php }
            }?>
                            </div>
                        </div>
                    </div>
            <?php include "Inc/adminFooter.php";?>