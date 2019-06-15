<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $fb = mysqli_real_escape_string($db->link,$fm->validation($_POST['fb']));
    $tw = mysqli_real_escape_string($db->link,$fm->validation($_POST['tw']));
    $pin = mysqli_real_escape_string($db->link,$fm->validation($_POST['pin']));
    $gplus = mysqli_real_escape_string($db->link,$fm->validation($_POST['gplus']));
    $ln = mysqli_real_escape_string($db->link,$fm->validation($_POST['ln']));

    if (empty($fb && $tw && $pin && $gplus && $ln))
    {
        echo "link must not be empty!!";
    }else
        {
            $query = "UPDATE `tbl_social`
                SET
                `fb`='$fb',
                `tw`='$tw',
                `pin`='$pin',
                `gplus`='$gplus',
                `ln`='$ln'
                WHERE `id`='1'
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
$slgQuery = "SELECT * FROM `tbl_social` WHERE `id`= '1'";
$socialMedia = $db->select($slgQuery);
if($socialMedia )
{
    while($socialResult = $socialMedia->fetch_assoc()) {
        ?>
        <form action="social.php" method="post">
            <table class="form">
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="fb" value="<?php echo $socialResult['fb']; ?>" placeholder="Facebook link.." class="medium"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="tw" value="<?php echo $socialResult['tw']; ?>" class="medium"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>LinkedIn</label>
                    </td>
                    <td>
                        <input type="text" name="pin" value="<?php echo $socialResult['pin']; ?>" class="medium"/>
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="gplus" value="<?php echo $socialResult['gplus']; ?>" class="medium"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Google Plus</label>
                    </td>
                    <td>
                        <input type="text" name="ln" value="<?php echo $socialResult['ln']; ?>" class="medium"/>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update"/>
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
<?php include __DIR__."/../admin/Inc/adminFooter.php";?>