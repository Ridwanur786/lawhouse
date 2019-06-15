<?php
//require_once __DIR__.'/../vendor/autoload.php';
//include "../lib/Session.php";
include "../Inc/header.php";
?>
<?php  require_once __DIR__ . "/../scripts/meta.php";?>
<?php //include __DIR__."/../scripts/js.php";?>
<?php // include __DIR__.'/../scripts/css.php';?>
<style>
    #map{
        height: 250px; width: 100%;
    }
</style>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <!-- Google Map Starts -->
                    <div id="googleMap">
                        <div class="container-fluid">
                            <div class="row">
                                <p class="h2 text-center text-uppercase">FIND ME ON MAP</p>
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <p class="text-center"><a href=""><i class="fas fa-mobile fa-5x" aria-hidden="true"></i></a></p>
                        <p class="h2 text-center">MOBILE</p>
                        <p class="text-center">01817708565</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <p class="text-center"><a href=""><i class="fas fa-map-marker fa-5x" aria-hidden="true"></i></a></p>
                        <p class="h2 text-center">LOCATION</p>
                        <p class="text-center">128 No. Korbanigonj South Side of Boluar Deghi, CTG</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <p class="text-center"><a href=""><i class="fas fa-clock fa-5x" aria-hidden="true"></i></a></p>
                        <p class="h2 text-center">HOURS</p>
                        <p class="text-center">8:00AM-9.00PM</p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p class="text-center h2">FOLLOW ME ON</p>
                        <p class="text-center">
                            <?php
                            $slgQuery = "SELECT * FROM `tbl_social` WHERE `id`= '1'";
                            $socialMedia = $db->select($slgQuery);
                            if($socialMedia )
                            {
                            while($socialResult = $socialMedia->fetch_assoc()) {
                                ?>
                                <a href="<?php echo $socialResult['fb'];?>" target="_blank"><i class="fab fa-facebook-f fa-2x" aria-hidden="true"></i></a>
                                <a href="<?php echo $socialResult['tw']; ?>" target="_blank"><i class="fab fa-twitter fa-2x" aria-hidden="true"></i></a>
                                <a href="<?php echo $socialResult['pin']; ?>" target="_blank"><i class="fab fa-pinterest-p fa-2x" aria-hidden="true"></i></a>
                                <a href="<?php echo $socialResult['gplus']; ?>" target="_blank"><i class="fab fa-google-plus fa-2x" aria-hidden="true"></i></a>
                                <a href="<?php echo $socialResult['ln']; ?>" target="_blank"><i class="fab fa-vimeo fa-2x" aria-hidden="true"></i></a>
                                <?php
                            }}
                            ?>
                        </p>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div id="result"></div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <p><i class="fa fa-envelope-o" aria-hidden="true"> Write me a letter</i></p>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row">
                                        <form action="formInput.php" method="post" id="form">
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                                                <label for="Name" class=" control-label">Name</label>
                                                <input type="text" name="name" placeholder="Enter Your Name" id="Name" class="form-control well">
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                                                <label for="E-mail" class=" control-label">E-mail</label>
                                                <input type="text" name="email" placeholder="Enter Your Gmail" id="E-mail" class="form-control well">
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" >
                                                <label for="Mobile" class=" control-label">Mobile NO</label>
                                                <input type="number" name="number" id="Mobile"  placeholder="Enter Your Cell Number" class="form-control well" >
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label for="Messages" class=" control-label">Messages</label>
                                                <textarea class="form-control well" id="Messages" placeholder="Enter Messages" rows="10" name="message"></textarea>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <input type="submit" class="btn btn-primary" id="submit" value="Send">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       </div> 
                        </div>
                </div>
                <?php
                include "../Inc/sidebar.php";
                ?>
            </div>
        </div>
    </section>
<?php
include "../Inc/footer.php";
?>

