<?php include("header.php");?>  
<div id="tb-preloader">
    <div class="tb-preloader-wave"></div>
</div>

<div class="wrapper">
        <section class="body-content">

            <!--portfolio-->
            <div class=" page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php include("menu.php");?>
                        </div>
                    </div>
                    <div id = "message">
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="pull-left" >
                                <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">
                                    <input type="hidden" name="image_form_submit" value="1"/>
                                        <label>Choose Image</label>
                                        <input type="file" name="images[]" id="images" multiple  accept="image/*">
                                    <div class="uploading none">
                                        <label>&nbsp;</label>

                                    </div>
                                    <input type="hidden" name="image_form_submit" value="1"/>
                                </form>
                            </div>
                            </div>
                            <br><br>
                            <div id = "images_preview" class="portfolio portfolio-masonry col-3 gutter" >
                                
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
          

        </section>
        
    </div>
<?php include("footer_photo.php");?>