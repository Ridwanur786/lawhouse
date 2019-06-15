<?php include "Inc/adminHeader.php";?>
<?php include "Inc/adminSidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>User List</h2>
        <div class="block">
            <?php
            if(isset($_GET['deleteUserId']))
            {
                $delId = $_GET['deleteUserId'];
                $delQuery = "DELETE FROM `tbl_user` WHERE `id`='$delId'";
                $delResult = $db->delete($delQuery);
                if ($delResult)
                {
                    echo "<span class='success'>User Deleted Successfully!!</span>";
                }else
                {
                    echo "<span class='error'>User Failed to Delete Category!!</span>";
                }
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th> No.</th>
                    <th>username</th>
                    <th>password</th>
                    <th>Email</th>
                    <th>Details</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM `tbl_user` ORDER BY `id` DESC ";
                $user = $db->select($query);
                if($user)
                {
                    $i = 0;
                    while($result =  $user->fetch_assoc())
                    {
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><a href="profile.php?editId= <?php echo $result['id'];?>"><?php echo $result['username'];?></a></td>
                            <td><?php echo $result['password'];?> </td>
                            <td><?php echo $result['email'];?> </td>
                            <td> <?php echo $fm->textShorten($result['details']);?></td>
                            <td>
                                <?php
                                if (Session::get('userRole')=='0')
                                {
                                    echo 'Admin';
                                }elseif (Session::get('userRole')=='1')
                                {
                                    echo 'author';
                                }elseif(Session::get('userRole')=='2')
                                {
                                    echo 'Editor';
                                }
                                 ?>
                            </td>
                            <td><?php echo $result['name'];?></td>
                            <td><a href="viewUser.php?editUserId=<?php echo $result['id'];?>">VIEW</a>
                                <?php
                                if (Session::get('userRole')== '0')
                                {
                                ?>
                                    ||<a onclick="return confirm('ARE YOU SURE TO DELETE THIS User?')" href="?deleteUserId= <?php echo $result['id'];?>">Delete</a>
                                <?php
                                }
                                ?>


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

<?php include "Inc/adminFooter.php";?>
