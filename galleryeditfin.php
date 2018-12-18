<?php 
include 'config.php'; 
include 'rotate.php';
?>
<?php


if  (empty($_FILES['img']['name'])){
    $path='NULL';
   
} else {
    
    
    $picture_tmp = $_FILES["img"]["tmp_name"];
    // var_dump($_FILES["img"]);
    $picture_nameo = explode(".", $_FILES["img"]["name"]);
    // var_dump($picture_nameo);
    $picture_name = date('Y-m-d').'_'.date('G-i-s').".". end($picture_nameo);
    // var_dump($picture_name);
    $picture_type = ($_FILES["img"]["type"]);
    // var_dump($_FILES["img"]);
    $allowed_type = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');

    
    // var_dump($img);
    if(in_array($picture_type, $allowed_type)) {
        $path = 'images/fulls/'.$picture_name; //change this to your liking
        $path2 = 'images/thumbs/'.$picture_name; //change this to your liking
        move_uploaded_file($picture_tmp, $path);  
                $sql = "INSERT INTO images (imggallery, imglink, imglink2, imgtitle) VALUES ('" . $_GET['galleryid'] . "','" . $path . "','" . $path2 . "','" . $_POST['imgtitle'] . "')";			
        if(mysqli_query($conn, $sql)){
            correctImageOrientation($path);
            //////////////////////////
            // CREATE THE THUMBNAIL //
            //////////////////////////
            
            $img=getimagesize($path);
            var_dump($img);
            $file_size=$img['0']*$img['1'];
            $file_type=$img['mime'];
            var_dump($file_size);
            //keep image type
            if($file_size){
               if($file_type == "image/pjpeg" || $file_type == "image/jpeg"){
                    $new_img = imagecreatefromjpeg($path);
                    
                }elseif($file_type == "image/x-png" || $file_type == "image/png"){
                    $new_img = imagecreatefrompng($path);
                }elseif($file_type == "image/gif"){
                    $new_img = imagecreatefromgif($path);
                }
                //list the width and height and keep the height ratio.
                var_dump( $new_img);
                list($width, $height) = getimagesize($path);
                //the new width of the resized image, in pixels.
                $img_thumb_width = 500;  
                $ThumbWidth = $img_thumb_width;
                //calculate the image ratio
                $imgratio=$width/$height;
                if ($imgratio>1){
                   $newwidth = $ThumbWidth;
                   $newheight = $ThumbWidth/$imgratio;
                }else{
                      $newheight = $ThumbWidth;
                      $newwidth = $ThumbWidth*$imgratio;
                }
                //function for resize image.
                $resized_img = imagecreatetruecolor($newwidth,$newheight);
                //the resizing is going on here!
                imagecopyresized($resized_img, $new_img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                //finally, save the image
                ImageJpeg ($resized_img,"$path2");
                ImageDestroy ($resized_img);
                ImageDestroy ($new_img);
                
             }
     
             //ok copy the finished file to the thumbnail directory
             move_uploaded_file ("$path2", $path);
            echo "Records inserted successfully.";
            header("Location:galleryedit.php?galleryid=".$_GET['galleryid']."#galleries");
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }


        
    } else {
        echo 'Netinkamas failas, bandykite kitą!';
    }
    }
?>
