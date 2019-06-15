<?php require_once __DIR__."/../../vendor/autoload.php";?>
<?php include __DIR__."/../admin/Inc/adminHeader.php";?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

                <div class="block">
                    <?php
                    if(isset($_GET['delId']))
                    {
                        $delId = $_GET['delId'];
                        $delQuery = "DELETE FROM `tbl_category` WHERE `id`='$delId'";
                        $delResult = $db->delete($delQuery);
                        if ($delResult)
                        {
                            echo "<span class='success'>Category Deleted Successfully!!</span>";
                        }else
                        {
                            echo "<span class='error'>Failed to Delete Category!!</span>";
                        }
                    }
                    ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $query = "SELECT * FROM `tbl_category` ORDER BY id DESC ";
                    $category = $db->select($query);
                    if ($category)
                    {
                        $i = 0;
                        while ($result = $category->fetch_assoc())
                        {
                            $i++;
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="edit.php?catId=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('ARE YOU SURE TO DELETE THIS CATEGORY?')" href="?delId=<?php echo $result['id'];?>">Delete</a></td>
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
