<?php
include("constants.php");

mysql_connect(SERVER, USER, PASSWORD) or die();
mysql_select_db(DBNAME);

$directory = "uploads/";

$offset = is_numeric($_POST['offset']) ? $_POST['offset'] : die();
$postnumbers = is_numeric($_POST['number']) ? $_POST['number'] : die();
$run = mysql_query("SELECT * FROM picture ORDER BY id DESC LIMIT ".$postnumbers." OFFSET ".$offset);

?>
    <div class="portfolio portfolio-masonry col-3 gutter">
      
        <?php
            while($row = mysql_fetch_array($run)) {
                $id = $row["unique_id"];
	            $image_src = $directory.$row["unique_id"].".".$row["filetype"];
                $file_name  = $row["filename"];
                $height = $row["height"];
                $width = $row["width"];
	            $tags = $row["tags"];
                $caption = "Filename: ".$file_name. " Height: ".$height. " Width: ". $width;
        ?>
	                <div class="portfolio-item cat2 cat4">
                        <div class="thumb">
                            <img src="<?php echo $image_src;?>" alt="" class = 'photo' style ="height: 300px !important">
                            <div class = "portfolio-hover">
                                <div class="action-btn">
                                    <a href="<?php echo $image_src;?>" data-lightbox="<?php echo $id;?>" data-title="<?php echo $caption;?>"><i class="icon-basic_magnifier"></i></a>
                                </div>
                            </div>
                        </div>
                        <center><p class = 'half-txt p-top-30'><?php echo $tags;?></p></center>
                    </div>
        <?php
        }
        ?>
</div>
