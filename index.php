<?php


include "admin/config.php";
include "admin/gallery/check.php";      


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GALLERY</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
    
        img , video{
            width:100%;
        }
    
    </style>
</head>
<body>
   
    <div class="container">
        <?php
        
        
        $gallery = new Database("localhost","root","","gallery");
        $newQuery = $gallery->select("src","gallery");
        
        while($row = mysqli_fetch_assoc($newQuery)){
            $srcExt = pathinfo($row['src'],PATHINFO_EXTENSION);
            $dirName = pathinfo($row['src'],PATHINFO_BASENAME);
            ?> <div class="col-md-4">
                
                <?php if(img($srcExt))  {
                    ?> <img src="admin/gallery/uploaded_imgs/<?= $dirName ?>" alt=""> <?php
                }?> 
                
                <?php if(video($srcExt))  {
                    ?> <video  controls>
                          <source src="admin/gallery/uploaded_videos/<?= $dirName ?>" type="video/mp4">
                      </video>     
                    <?php
                }?>
                
                <?php if(audio($srcExt))  {
                    ?> 
                      <audio controls>
                          <source src="admin/gallery/uploaded_audios/<?= $dirName ?>" type="audio/mp3">
                      </audio>
                    <?php
                }?>
                
               </div> 
            
            <?php
        }
        
        
        
        ?> 
    </div>
</body>
</html>