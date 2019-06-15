<?php 
  include __DIR__ . "/../vendor/autoload.php";

    $path = $_SERVER['SCRIPT_FILENAME'];
    $currentPage = basename($path,'.php');
	
	if($currentPage == 'Excellent')
	{			
$id = mysqli_real_escape_string($db->link, $fm->validation(isset($_GET['id'])));

		$postQuery = "SELECT * FROM `tbl_post` WHERE `id`= '". $id."'";
		if($schemaPost = $db->select($postQuery))
		{
			$schema = mysqli_num_rows($schemaPost);
		}	
		if($schemaPost)
		{
			while($post = $schemaPost->fetch_assoc())
			{
				
		?>
		<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "NewsArticle",
			"mainEntityOfPage": {
				"@type": "WebPage",
				"@id": "http://localhost/project/Template/Excellent.php?id=<?php echo $post['id']; ?>"
			},
			"headline": "<?php echo $post['title']; ?>",
			"image": {
				"@type": "ImageObject",
				"url": "<?php echo $post['img']; ?>", // Image field in template
				//"height": <?php$post->thumbnail->height ?>,
				//"width": <?php$post->thumbnail->width ?>
			},
			"datePublished": "<?php echo $fm->DateFormat ($post['date']); ?>",
			"dateModified": "<?php echo $fm->DateFormat ($post['date']); ?>",
			"author": {
				"@type": "Person",
				"name": "<?php echo $post['author'];?>" // Text fields added to core module ProcessProfile
			},
			"publisher": {
				"@type": "Organization",
				"name": "Your organization name",
				"logo": {
					"@type": "ImageObject",
					"url": "<?php 
    $slgQuery = 'SELECT * FROM `title_slogan` WHERE `id`= "1"';
                        $getTitle = $db->select($slgQuery);
                        if($getTitle)
                        {
                            while($slgResult = $getTitle->fetch_assoc())
                            {
								
								?>
							<?php echo $slgResult['logo'];
						}}
							?>",
					"width": 244, // Width of your logo
					"height": 36 // Height of your logo
				}
			},
			"description": "<?php echo $post['body']; ?>" // Text field in template
		}
	</script>
		
		<?php
			}
		}
	
	}elseif($currentPage=='index')
	{
		?>
		<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Paris, France",
    "postalCode": "F-75002",
    "streetAddress": "38 avenue de l'Opera"
  },
  "email": "secretariat(at)google.org",
  "faxNumber": "( 33 1) 42 68 53 01",
  "member": [
    {
      "@type": "Organization"
    },
    {
      "@type": "Organization"
    }
  ],
  "alumni": [
    {
      "@type": "Person",
      "name": "Jack Dan"
    },
    {
      "@type": "Person",
      "name": "John Smith"
    }
  ],
  "name": "Google.org (GOOG)",
  "telephone": "( 33 1) 42 68 53 00"
}
</script>
		<?php
	}elseif($currentPage =='Template')
	{
		$cat = mysqli_real_escape_string($db->link, $fm->validation($_GET['category']));
		
		$catQuery = "SELECT * FROM `tbl_category` WHERE `id`='".$cat."'";
				
		if($query = $db->select($catQuery))
		{
			
		?>
		
		<?php
		
		}
		}elseif($currentPage=='page')
	{
		
	}elseif($currentPage == 'contact')
	{
		
	}
?>