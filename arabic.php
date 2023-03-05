<?php
/**
 * 

 Template Name: Gift
 */
get_header();
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>


<?php
$baseurl= dirname(__FILE__);
require($baseurl.'/I18N/Arabic.php'); 

   
    $font = $baseurl.'/droid.ttf';
     $file_name = "template2.jpeg";

  if(isset($_POST['submit'])){
     
      
 
      $string = $_POST['caption'];
      $string1 = $_POST['caption1'];
       
$Arabic = new I18N_Arabic('Glyphs'); 
  
$string = $Arabic->utf8Glyphs($string);
$string1 = $Arabic->utf8Glyphs($string1);
    // Create the image
    $im = imagecreatefromjpeg($file_name);

    // Create some colors
    $white = imagecolorallocate($im, 255, 255, 255);
   // $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im,57, 0, 77);
    imagefilledrectangle($im,25, 25, 75, 75, $white);

    // Add the text
    imagettftext($im, 20, 0, 190, 470, $black, $font, $string);
    imagettftext($im, 20, 0, 180, 770, $black, $font, $string1);

    // Using imagepng() results in clearer text compared with imagejpeg()
    $imageurl="/giftsimages/azeem".rand().".JPEG";
   
    imagejpeg($im, $baseurl.$imageurl);
    imagedestroy($im);
    echo "<a href='".site_url()."/wp-content/themes/hello-elementor/template-parts/".$imageurl."'>Download</a>";
   
   	$file_name=site_url()."/wp-content/themes/hello-elementor/template-parts/".$imageurl;
  }
?>



<?php
while ( have_posts() ) : the_post();
	?>

<main <?php post_class( 'site-main' ); ?> role="main">
	
	<div class="page-content">
		<img src="/<?php echo $file_name;?>"/>

		<form enctype="multipart/form-data" method="POST" action="">
 
    Reciever
    <input type="text" name="caption" required >
    Gifter
    <input type="text" name="caption1" required >
    <input type="submit" name="submit">
</form>
	</div>

	
</main>






	<?php
endwhile;
get_footer();
