<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
<?php
if(isset($_GET['seenid']))
{
    $seenid= $_GET['seenid'];
    $seenUpdateQuery = "UPDATE `tbl_contact` SET `status`='1' WHERE `id`=$seenid";
    $updated_row = $db->update($seenUpdateQuery);
    if ($updated_row)
    {
        echo "<span>Message seen</span>";
    }else
    {
        echo "<span>Messagenot seen</span>";
    }
}

if(isset($_GET['unseenid']))
{
    $seenid= $_GET['unseenid'];
    $seenUpdateQuery = "UPDATE `tbl_contact` SET `status`='0' WHERE `id`=$seenid";
    $updated_row = $db->update($seenUpdateQuery);
    if ($updated_row)
    {
        echo "<span>Message resend to Unseenbox</span>";
    }else
    {
        echo "<span>Message not resend</span>";
    }
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
                        <?php
                        if(isset($_GET['seenid']))
                        {
                            $seenid= $_GET['seenid'];
                            $seenUpdateQuery = "UPDATE `tbl_contact` SET `status`='1' WHERE `id`=$seenid";
                            $updated_row = $db->update($seenUpdateQuery);
                            if ($updated_row)
                            {
                                echo "<span>Message seen</span>";
                            }else
                            {
                                echo "<span>Messagenot seen</span>";
                            }
                        }
                        ?>
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>E-mail</th>
							<th>Mobile</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $contactQuery = "SELECT * FROM `tbl_contact` WHERE `status`='0' ORDER BY `id` DESC ";
                    $contact = $db->select($contactQuery);
                    if ($contact)
                    {
                        $i =0;
                        while($contactResult = $contact->fetch_assoc())
                        {
                            $i++;
                            ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td> <?php echo $contactResult['name'];?></td>
                            <td> <?php echo $contactResult['email'];?></td>
                            <td> <?php echo $contactResult['number'];?></td>
                            <td> <?php echo $fm->textShorten($contactResult['message'],30);?></td>
                            <td> <?php echo $fm->DateFormat($contactResult['date']);?></td>
							<td>
                                <a href="viewmsg.php?msgid=<?php echo $contactResult['id'];?>">VIEW</a> ||
							<a href="replay.php?replayid=<?php echo $contactResult['id'];?>">REPLAY</a> ||
							<a onclick="return confirm('ARE YOU SURE TO send this message to seen box?')" href="?seenid=<?php echo $contactResult['id'];?>">SEEN</a>
                            </td>
						</tr>
                        <?php
                        }
                        }
                        ?>
					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>SEEN MESSAGE</h2>
                <?php
                if(isset($_GET['msgdeleteid']))
                {
                    $msgDelete = $_GET['msgdeleteid'];
                    $msgdeleteQuery = "DELETE FROM `tbl_contact` WHERE `id`= '$msgDelete'";
                    $delete = $db->delete($msgdeleteQuery);
                    if ($delete)
                    {
                        echo "Message successfully deleted";
                    }else
                    {
                        echo "message not delete from seenbox";
                    }
                }
                ?>

                <div class="block">
                    <table class="data display datatable" id="example">
                        <?php
                        if(isset($_GET['unseenid']))
                        {
                            $seenid= $_GET['unseenid'];
                            $seenUpdateQuery = "UPDATE `tbl_contact` SET `status`='0' WHERE `id`=$seenid";
                            $updated_row = $db->update($seenUpdateQuery);
                            if ($updated_row)
                            {
                                echo "<span>Message resend to Unseenbox</span>";
                            }else
                            {
                                echo "<span>Message not resend</span>";
                            }
                        }
                        ?>
                        <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $contactQuery = "SELECT * FROM `tbl_contact` WHERE `status`='1' ORDER BY `id` DESC ";
                        $contact = $db->select($contactQuery);
                        if ($contact)
                        {
                            $i =0;
                            while($contactResult = $contact->fetch_assoc())
                            {
                                $i++;
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $i;?></td>
                                    <td> <?php echo $contactResult['name'];?></td>
                                    <td> <?php echo $contactResult['email'];?></td>
                                    <td> <?php echo $contactResult['number'];?></td>
                                    <td> <?php echo $fm->textShorten($contactResult['message'],30);?></td>
                                    <td> <?php echo $fm->DateFormat($contactResult['date']);?></td>
                                    <td>
                                        <a href="viewmsg.php?msgid=<?php echo $contactResult['id'];?>">VIEW</a> ||
                                        <a onclick="return confirm('ARE YOU SURE TO send this message to unseen box?')" href="?unseenid=<?php echo $contactResult['id'];?>">UNSEEN</a> ||
                                        <a  onclick="return confirm('ARE YOU SURE TO DELETE?')" href="?msgdeleteid=<?php echo $contactResult['id'];?>">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
</script>
<?php include __DIR__."/../admin/Inc/adminFooter.php";?>
