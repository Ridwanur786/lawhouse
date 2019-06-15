<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change your Category</h2>
        <div class="block copyblock">
            <?php
            if ($_SERVER['REQUEST_METHOD']=='POST')
            {

                $theme = mysqli_real_escape_string($db->link, $_POST['theme']);
               $themeQuery = "UPDATE `tbl_theme` SET `theme`='$theme' WHERE `id`='1'";
                    $update= $db->update($themeQuery);
                    if ($update)
                    {
                        echo "<span class='success'>Theme updated Successfully!!</span>";
                    }else
                    {
                        echo "<span class='error'>Failed to update theme!!</span>";
                    }
            }
            $query = "SELECT * FROM `tbl_theme` WHERE `id`= '1'";
            $theme= $db->select($query);
            if ($theme)
            {
            while($result = $theme->fetch_assoc())
            {
                ?>
                <form action ="theme.php" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input <?php  if($result['theme']== 'default')
                                {
                                    echo "checked";
                                }?> type="radio" name="theme" value="default" />Default
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input <?php  if($result['theme']== 'change')
                                {
                                    echo "checked";
                                }?> type="radio" name="theme" value="change" />Dark
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Change" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
            }}
            ?>
        </div>
    </div>
</div>
<?php include __DIR__."/../admin/Inc/adminFooter.php";?>
