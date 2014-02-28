<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Media_Management extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
		}

				/*www.ashishrevar.com*/
			/*Function to create thumbnails*/
			function make_thumb($src, $dest, $desired_width) {
			  /* read the source image */
			  $source_image = imagecreatefromjpeg($src);
			  $width = imagesx($source_image);
			  $height = imagesy($source_image);

			  /* find the “desired height” of this thumbnail, relative to the desired width  */
			  $desired_height = floor($height * ($desired_width / $width));

			  /* create a new, “virtual” image */
			  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

			  /* copy source image at a resized size */
			  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

			  /* create the physical thumbnail image to its destination */
			  imagejpeg($virtual_image, $dest);
			}

		function edit_slider(){
			$fp=fopen("captions.txt","r");
			for($i=1;$i<6;$i++){
			$headers[$i]=fgets($fp);
			$captions[$i]=fgets($fp);
			}
			fclose($fp);
			$s="";
			$tok=strtok($_POST['caption'.$_POST['index']], "\n");
			while ($tok !== false) {
			$s.=$tok;
    		$tok = strtok("\n");
			}
			$headers[$_POST['index']]=$_POST['header'.$_POST['index']];
			$captions[$_POST['index']]=$s;
			
			$fp=fopen("captions.txt","w");
			for($i=1;$i<6;$i++){
			fwrite($fp,$headers[$i]);
			if($i==$_POST['index']){
			fwrite($fp,"\n");
			}
			fwrite($fp,$captions[$i]);
			if($i==$_POST['index'] && $i!=5){
			fwrite($fp,"\n");
			}
			}
			fclose($fp);
			
				if(isset($_FILES['file']['name']) && (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/JPG"))){
				
				$tmpname = $_FILES['file']['tmp_name'];
				$dest = './images/'.$_POST['index'].'.jpg';
				move_uploaded_file($tmpname,$dest);	
	       		$src=$dest;
	       		$dest="./images/thumb".$_POST['index'].".jpg";
	       		$desired_width=200;
	    		$this->make_thumb($src, $dest, $desired_width);
	        	}		
			redirect('../');
		}
		
			

	}

?>