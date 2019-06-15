<?php
require_once __DIR__ ."/../../vendor/autoload.php";
?>
<?php include __DIR__ ."/../admin/Inc/adminHeader.php";
?>
<?php include __DIR__ ."/../admin/Inc/adminSidebar.php";
if (!isset($_GET['editUserId']) || $_GET['editUserId']==NULL)
{
echo "<script>location.replace('userlist.php')</script>";
}else
{
    $view = $_GET['editUserId'];
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>View USER </h2>
            <div class="block">
                <?php
                if ($_SERVER["REQUEST_METHOD"]== 'POST') {
             echo "<script>location.replace('userlist.php')</script>";
                }
                $query = "SELECT * FROM `tbl_user` WHERE  `id`='$view'";
                $viewUser = $db->select($query);
                if ($viewUser)
                {
                    while($userResult = $viewUser->fetch_assoc())
                    {
                        ?>
                        <form action="" method="post">
                            <table class="form">
                                <tr>
                                    <td>
                                        <label for="user Name">User Name</label>
                                    </td>
                                    <td>
                                       <?php echo $userResult['username'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="E mail">Email</label>
                                    </td>
                                    <td>
                                     <?php echo $userResult['email'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                        <label>Content</label>
                                    </td>
                                    <td>
                            <textarea  name="details">
                                <?php echo $userResult['details'];?>
                            </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="Name">name</label>
                                    </td>
                                    <td>
                                        <?php echo $userResult['name'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="OK"/>
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
<?php include __DIR__ ."/../admin/Inc/adminFooter.php";?>