<?php 
    include "../config.php";
    include "check.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        
        
        html,body{
            background-color:dimgray;
            background-size:cover;
            color:darkslategrey;
        }    
    
    </style>
</head>
<body>

    
    <div class="container">
       <h1>FILE UPLOAD</h1>
        <div class="col-md-8">
            <form  method="post" enctype="multipart/form-data">
        
                <input type="file" class="form-control" name="file_gallery">
                <input type="submit" name="submit_gallery">
                
            </form>
        </div>
    </div>
    
    
    <?php 

    
    $file_gallery = $_FILES['file_gallery']['name'];
    $fileType = pathinfo($_FILES['file_gallery']['name'],PATHINFO_EXTENSION);
    if(img($fileType)){
        $target_dir = "uploaded_imgs/";
    }
    else if(video($fileType)){
        $target_dir = "uploaded_videos/";

    }
    else if(audio($fileType)){
        $target_dir = "uploaded_audios/";

    }
    $target_file = $target_dir .  date("dis") .basename($_FILES['file_gallery']['name']);
    
    $gallery1 = new Database("localhost","root","","gallery");
    $gallery1->insert("gallery",'src',"$file_gallery");
    
    if(isset($_POST['submit_gallery'])){
        move_uploaded_file($_FILES["file_gallery"]["tmp_name"], $target_file);
        print_r($target_file); 
    }
    
    
    ?>
    
    
    
    
    
</body>
</html>