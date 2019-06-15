<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<?php
if (!isset($_GET['replayid']) || $_GET['replayid']==NULL)
{
    if (!headers_sent())
    {
        header('Location : inbox.php');
    }
}else
{
    $replayId = $_GET['replayid'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Pages</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
           $to      = mysqli_real_escape_string($db->link,$fm->validation($_POST['toEmail']));
           $from    = mysqli_real_escape_string($db->link,$fm->validation($_POST['fromEmail']));
           $subject = mysqli_real_escape_string($db->link,$fm->validation($_POST['subject']));
           $message = mysqli_real_escape_string($db->link,$_POST['message']);

           $sendmail = mail($to,$subject,$message,$from);
           if ($sendmail)
           {
               echo "your replay to the message sent successfully!!";
           }else
           {
               echo "yerror Sending message!!";
           }
        }
        ?>
        <div class="block">

            <?php
            $replayQuery = "SELECT * FROM `tbl_contact` WHERE `id`='$replayId'";
            $replay = $db->select($replayQuery);

            if ($replay)
            {
                while($msgResult = $replay->fetch_assoc())
                {
                    ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>To</label>
                                </td>
                                <td>
                                    <input type="text" readonly name="toEmail" value="<?php  echo $msgResult['email'];?>"  class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>From</label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Email Id" name="fromEmail" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Subject</label>
                                </td>
                                <td>
                                    <input type="text" name="subject" placeholder="The subject line here" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>message</label>
                                </td>
                                <td>
                            <textarea class="tinymce" name="message">
                            </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="SEND" />
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

