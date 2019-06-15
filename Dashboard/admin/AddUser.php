<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<?php
  if (!Session::get('userRole')=='0')
  {
      echo "<script>location.replace('index.php');</script>";
  }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New User</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $username = mysqli_real_escape_string($db->link, $fm->validation($_POST['username']));
            $password = mysqli_real_escape_string($db->link, $fm->validation(md5($_POST['password'])));
            $role = mysqli_real_escape_string($db->link, $fm->validation($_POST['role']));
            $details = mysqli_real_escape_string($db->link, $fm->validation($_POST['details']));
            $email = mysqli_real_escape_string($db->link, $fm->validation($_POST['email']));
            $error = "";
            if (empty($username))
            {
                $error= "username Must not be Empty";
            }elseif(empty($password))
            {
                $error = "password field must not be empty";
            }
            elseif (empty($email))
            {
                $error = "email field must not be empty";
            }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $error = "email invalid!! please put a valid email address";
            } else {
                $mailQuery = "SELECT * FROM `tbl_user` WHERE `email`= '$email' LIMIT 1";
                $mailCheck = $db->select($mailQuery);
                if ($mailCheck != false) {
                    echo "<span class='error'>mail already Exist!!</span>";
                } else {
                    $query = "INSERT INTO `tbl_user`(username,password,email,role,details) VALUES('$username','$password','$email','$role','$details')";
                    $insert = $db->insert($query);
                    if ($insert) {
                        $msg= "User Add successfully!!";
                    } else {
                        $error = "Decline to add user!!";
                    }
                }
            }
        }
        ?>
        <div class="block copyblock">
            <?php
            if (isset($msg))
            {
                echo "<span style='color: greenyellow;'>$msg</span>";
            }
            if (isset($error))
            {
                echo "<span style='color: orangered'>$error</span>";
            }
            ?>
            <form action ="" method="post">
                <table class="form">
                    <tr>
                        <td>
                             <label for="Username">USERNAME</label>
                        </td>
                     <td>
                             <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                     </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Password">Password</label>
                        </td>
                        <td>
                            <input type="text" name="password" placeholder="Enter valid password.." class="medium"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Email">Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Enter valid email address..." class="medium"/>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <label for="Role">Role</label>
                        </td>
                        <td>
                          <select name="role" id="select">
                              <option>Select Role</option>
                              <option value="0">Admin</option>
                              <option value="1">Editor</option>
                              <option value="2">Author</option>
                              <option value="3">Writer</option>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Details">Details</label>
                        </td>
                        <td>
                            <textarea name="details" class="tinymce"></textarea>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Add" name="submit">
                        </td>
                    </tr>
                </table>
            </form>
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
