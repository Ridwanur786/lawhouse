<?php
require_once __DIR__ ."/../../vendor/autoload.php";
 include __DIR__ ."/../admin/Inc/adminHeader.php";
 Session::get('userId');
// Session::get('userRole');
//var_dump(__DIR__);
?>
<?php include __DIR__."/../admin/Inc/adminSidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel        
                </div>
            </div>
        </div>
<?php include __DIR__."/../admin/Inc/adminFooter.php";?>

