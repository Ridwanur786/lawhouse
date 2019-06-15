<?php
require_once __DIR__."/../../vendor/autoload.php";
?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";
$userId = Session::get('userId');
$userRole = Session::get('userRole');
?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>UPDATE USER ROLE</h2>
        <div class="block">
            <?php
            if ($_SERVER["REQUEST_METHOD"]== 'POST') {
                $title = mysqli_real_escape_string($db->link, $fm->validation($_POST['username']));
                $email = mysqli_real_escape_string($db->link, $fm->validation($_POST['email']));
                $body = mysqli_real_escape_string($db->link, $fm->validation($_POST['details']));
               // $tags = mysqli_real_escape_string($db->link, $fm->validation($_POST['role']));
                $name = mysqli_real_escape_string($db->link, $fm->validation($_POST['name']));
                if (!empty($title) || !empty($email) || !empty($body) || !empty($name)) {
                    $profileQuery = "UPDATE `tbl_user`
                SET
                `username`='$title',
                `email`='$email',
                `details`='$body',
                `name`='$name'
                WHERE `id`='$userId'
                ";
                    $update_row = $db->update($profileQuery);
                    if ($update_row) {
                        echo "<span class='success'>Data Updated Successfully.
     </span>";
                    } else {
                        echo "<span class='error'>Data Not Updated!</span>";
                    }
                }
            }
     $query = "SELECT * FROM `tbl_user` WHERE `role`='$userRole' AND `id`= '$userId'";
            $getUser = $db->select($query);
            if ($getUser)
            {
                while($userResult = $getUser->fetch_assoc())
                {
                    ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <label for="user Name">User Name</label>
                                </td>
                                <td>
                                    <input type="text" name="username" value="<?php echo $userResult['username'];?>"  class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="E mail">Email</label>
                                </td>
                                <td>
                                    <input type="text" name="email" value="<?php echo $userResult['email'];?>"  class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Content</label>
                                </td>
                                <td>
                            <textarea class="tinymce" name="details">
                                <?php echo $userResult['details'];?>
                            </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="Name">name</label>
                                </td>
                                <td>
                                    <input type="text" name="name" value="<?php echo $userResult['name'];?>"  class="medium"/>
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