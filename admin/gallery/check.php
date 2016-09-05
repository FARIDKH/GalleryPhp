<?php 


    function img($file_type){
        if($file_type == "jpeg" || $file_type == "png" || $file_type == "jpg") {
            return true;
        }else{
            return false;
        }
    } 


    function video($file_type){
        if($file_type == "mp4" || $file_type == "ogg" || $file_type == "WebM") {
            return true;
        }else{
            return false;
        }
    }  


    function audio($file_type){
        if($file_type == "mp3") {
            return true;
        }else{
            return false;
        }
    }  

    




?>