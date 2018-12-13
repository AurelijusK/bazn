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

    // -----------------------


        
        //make sure this directory is writable!
        $path_thumbs = "images/thumbs";
        
        //the new width of the resized image, in pixels.
        // $img_thumb_width = 250; // 

 
        $extlimit = "yes"; //Limit allowed extensions? (no for all extensions allowed)
        //List of allowed extensions if extlimit = yes
        $limitedext = array(".gif",".jpg",".png",".jpeg",".bmp");
        
        //the image -> variables
        $file_type = $_FILES['img']['type'];
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_tmp = $_FILES['img']['tmp_name'];


 
        //check if you have selected a file.
        if(!is_uploaded_file($file_tmp)){
           echo "Error: Please select a file to upload!. <br>--<a href=\"$_SERVER[PHP_SELF]\">back</a>";
           exit(); //exit the script and don't process the rest of it!
        }
       //check the file's extension
       $ext = strrchr($file_name,'.');
       $ext = strtolower($ext);
       //uh-oh! the file extension is not allowed!
       if (($extlimit == "yes") && (!in_array($ext,$limitedext))) {
          echo "Wrong file extension.  <br>--<a href=\"$_SERVER[PHP_SELF]\">back</a>";
          exit();
       }
       //so, whats the file's extension?
       $getExt = explode ('.', $file_name);
       $file_ext = $getExt[count($getExt)-1];
 
       //create a random file name
    //    $rand_name = md5(time());
    //    $rand_name = rand(0,999999999);
       $rand_name = date('Y-m-d').'_'.date('G-i-s');
       //the new width variable
       
 
 
       //////////////////////////
       // CREATE THE THUMBNAIL //
       //////////////////////////
       
       //keep image type
       if($file_size){
          if($file_type == "image/pjpeg" || $file_type == "image/jpeg"){
               $new_img = imagecreatefromjpeg($file_tmp);
           }elseif($file_type == "image/x-png" || $file_type == "image/png"){
               $new_img = imagecreatefrompng($file_tmp);
           }elseif($file_type == "image/gif"){
               $new_img = imagecreatefromgif($file_tmp);
           }
           //list the width and height and keep the height ratio.
           list($width, $height) = getimagesize($file_tmp);

           
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
           ImageJpeg ($resized_img,"$path_thumbs/$rand_name.$file_ext");
           ImageDestroy ($resized_img);
           ImageDestroy ($new_img);
           
           
        }

        
        //ok copy the finished file to the thumbnail directory
        move_uploaded_file ("$path_thumbs/$rand_name.$file_ext", $file_tmp);
        
        /*
            Don't want to copy it to a separate directory?
            Want to just display the image to the user?
            Follow the following steps:
            
            2. Uncomment this code:
        /*
        /* UNCOMMENT THIS IF YOU WANT */
        //echo "IMG:<img src=\"$path_big/$rand_name.$file_ext\" />";
        //exit();
        //*/
        
        //and you should be set!
             
        //success message, redirect to main page.       
        // $msg = urlencode("$title was uploaded! <a href=\"Resize.php\">Upload More?</a>");
        //     header("Location: Resize.php?msg=$msg");
        //     exit();
        
    

            
    // var_dump($img);
    if(in_array($picture_type, $allowed_type)) {
        $path = 'images/fulls/'.$picture_name; //change this to your liking
        var_dump($path);
        $path2 = 'images/thumbs/'.$picture_name; //change this to your liking
        var_dump($path2);
        
        move_uploaded_file($picture_tmp, $path);
  
        
                $sql = "INSERT INTO images (imggallery, imglink, imglink2, imgtitle) VALUES ('" . $_GET['galleryid'] . "','" . $path . "','" . $path2 . "','" . $_POST['imgtitle'] . "')";			
        if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
        var_dump($path);
        var_dump($path2);
        correctImageOrientation($path);
        correctImageOrientation($path2);
        header("Location:galleryedit.php?galleryid=".$_GET['galleryid']."#galleries");
        } else {
            echo 'Netinkamas failas, bandykite kitą!';
        }
        }
?>
