<?php
include __DIR__ . "/../vendor/autoload.php";
//$db = new Database();
				$query = "SELECT * FROM `tbl_post`";
				if($post = $db->select($query))
				{
					$count = mysqli_num_rows($post);
				if(!empty($count)|| $count>0)
	{
					while($result = $post->fetch_assoc())	
					{		
$id = $result['id'];		
$disqus_loaded = false;		
						$shortName = 'lawhousectg';
						$uniqueUrl = "http://localhost/1282019/project/Template/Excellent.php/#!".$id;
						$identifier = "http://localhost/1282019/project/Template/Excellent.php/#!".$id;
				
						
?>

<div id="disqus_thread"></div>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

(function() {
var d = document, s = d.createElement('script');
 s.type = 'text/javascript';
 s.async = true;
s.src = 'https://'+'<?php echo $shortName ?>'+'.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
  
})();
//var head = document.getElementsByTagName('head')[0];
//head.removeChild(head.lastElementChild);

 DISQUS.reset({
            reload: true,
            config: function () {
                this.page.url = "<?php echo $uniqueUrl; ?>";  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = "<?php echo $identifier; ?>";
               // this.page.title = newTitle;
               // this.language = newLanguage;
            }
        });
		
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
             
		<?php 
		}
				}
				}
		?>	