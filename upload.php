<?php
if($_POST['image_form_submit'] == 1)
{
	include("conn.php");
	$image = $_FILES;
	$failed = array();
	$unique_id = array();
		foreach($image['images']['name'] as $key=>$val){
			$image_name = $image['images']['name'][$key];
			if(!preg_match("/.(gif|jpg|png|jpeg)$/i", $image_name)) continue;
			$tmp_name 	= $image['images']['tmp_name'][$key];
			$size 		= $image['images']['size'][$key];
			$type 		= $image['images']['type'][$key];
			$error 		= $image['images']['error'][$key];
			$target_dir = "uploads/";
			$file_type = explode(".", $image_name);
			$file_type = end($file_type);
			$uniqid = uniqid();
			$target_file = $target_dir.$uniqid.".".$file_type;

			if(move_uploaded_file($image['images']['tmp_name'][$key],$target_file)) {
				$image_info = getimagesize($target_file);
				$width = $image_info[0];
				$height = $image_info[1];
				$array = array($image_name, $size, $width, $height, $file_type, $uniqid);
				if (insertPhotoDetails( $array )) {
					$images_arr[] = $target_file;
					$unique_id[] = $uniqid;
				}
				else $failed[] = $image_name;
			}			
		}
	
	//Generate images view
	if(!empty($images_arr)){ 
		$count=0;

		if(empty($failed)){
			echo '<div class="alert success-border" >
                <i class="fa fa-lg fa-check-circle-o"></i> <strong>Your Photo\'s Uploaded Succesfully</strong> 
             </div>';
		}
        else{
        	echo '<div class="alert danger-border" >
                <i class="fa fa-lg fa-check-circle-o"></i> <strong>Some Photo\'s Not Uploaded, Error Occured</strong> 
            </div>';
        }

		foreach($images_arr as $index => $image_src){ $count++;
			$textarea = "text-area-".$index;
			$button = "button-".$index;
			$data_id = $index;
			$picture_id = $unique_id[$index];
			$form = "form-".$picture_id;

		?>
		
				<div class="portfolio-item cat1 cat3 ">
		            <div class="thumb">
		                <img  class = 'photo' src="<?php echo $image_src; ?>" alt="" style ="height: 300px !important">
		              
		            </div>
		            <div id = "<?php echo $form;?>">
			            <div class="form-group" style = "margin-top:10px;" >
			                <input type = "text" name="text" id="<?php echo $textarea;?>" data-id = "<?php echo $data_id;?>" class="cmnt-text form-control" placeholder="...Tag" maxlength="400" />
			            </div>
			            <div class="form-group full-width">
			                <button disabled type="button" id = "<?php echo $button;?>" text-area-id = "<?php echo $textarea; ?>"  data-id = "<?php echo $picture_id;?>" class="btn btn-small btn-primary"> Add Tag </button>
			            </div>
		            </div>
		        </div>

	<?php }
	}
}
?>