
<?php
$fm= new Format();
$db = new Database();
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="h2">LAW HOUSE</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus est libero perspiciatis voluptas. Ad autem, enim facilis ipsum officiis quasi sed? Facere saepe sunt temporibus!</p>
                <p>
                    <?php
                    $slgQuery = "SELECT * FROM `tbl_social` WHERE `id`= '1'";
                    $socialMedia = $db->select($slgQuery);
                    if($socialMedia )
                    {
                    while($socialResult = $socialMedia->fetch_assoc()) {
                        ?>
                        <a href="<?php echo $socialResult['fb']; ?>" target = "_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo $socialResult['tw']; ?>" target = "_blank"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo $socialResult['pin']; ?>" target = "_blank"><i class="fab fa-pinterest-p"></i></a>
                        <a href="<?php echo $socialResult['gplus']; ?>" target = "_blank"> <i class="fab fa-google-plus-g"></i></a>
                        <a href="<?php echo $socialResult['ln']; ?>" target = "_blank"> <i class="fab fa-linkedin-in"></i></a>
                        <?php
                    }
                    }
                    ?>
                </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="h2">CONTACT</p>
                <p><a href="../Template/contact.php"><i class="fa fa-map-marker" aria-hidden="true"></i></a> 128 No. Korbanigonj South Side of Boluar Deghi, CTG </p>
                <p><a href="../Template/contact.php"><i class="fa fa-phone" aria-hidden="true"></i></a> 01971982959</p>
                <p><a href="../Template/contact.php"><i class="fa fa-envelope" aria-hidden="true"></i></a> rimubd25@gmial.com</p>
                <p><a href="../Template/contact.php"><i class="fas fa-clock"></i></a> 8:00AM-9.00PM</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <p class="h2">OPENING HOURS</p>
                <p class="h3">FRIDAY - SATURDAY</p>
                <p> 9:00AM-10:00PM</p>
                <p class="h3">SUNDAY-THURSDAY</p>
                <p> 6:00PM-10:00PM</p>
            </div>

        </div>
    </div>
    <div class="col-sm-2 col-sm-offset-10">
       <a href="#" id="scrollToTop"><i class="fa fa-chevron-circle-up fa-4x"></i></a> 
    </div>
        <div class="copyright">
            <?php
            $copyQuery = "SELECT * FROM `tbl_footer` WHERE `id`= '1'";
            $copyright = $db->select($copyQuery);
            if($copyright ) {
            while ($copyResult = $copyright->fetch_assoc()) {
            ?>
                <p class="text-center" style="margin-top: 50px; color: orangered;"> 
				<span style="color: #000; width: 100%;">
				&#169;
				</span>
				<?php echo $copyResult['text']; ?> - <?php echo date('Y'); ?>
				</p>
            <?php
            }
            }
            ?>
        </div>
</footer>
<?php
include __DIR__ ."/../scripts/js.php";
?>
</body>
</html>



