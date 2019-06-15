<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<?php
if (!isset($_GET['msgid']) || $_GET['msgid']==NULL)
{
    if (!headers_sent())
    {
        header('Location : inbox.php');
    }
}else
{
    $msgId = $_GET['msgid'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Pages</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD']=='POST') {
           echo "<script>location.replace('inbox.php');</script>";
        }
        ?>
        <div class="block">

            <?php
            $msgQuery = "SELECT * FROM `tbl_contact` WHERE `id`='$msgId'";
            $msg = $db->select($msgQuery);

            if ($msg)
            {
                while($msgResult = $msg->fetch_assoc())
                {
                    ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php  echo $msgResult['name'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>E-mail</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php  echo $msgResult['email'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php  echo $fm->DateFormat($msgResult['date']);?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mobile</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php  echo $msgResult['number'];?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>messaget</label>
                        </td>
                        <td>
                            <textarea  readonly rows="10" cols="60">
                            <?php  echo $msgResult['message'];?>
                            </textarea>
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
<?php include __DIR__."/../admin/Inc/adminFooter.php";?>

