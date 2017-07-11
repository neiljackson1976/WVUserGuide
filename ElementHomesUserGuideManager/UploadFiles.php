<?php


function UploadFiles($targetdir, $targetfile, $fileextfilter,$filesizelimit){

    $target_dir = $targetdir;
    $target_file = $target_dir . basename($targetfile);
    $uploadOk = 1;
    $ext = pathinfo($target_file,PATHINFO_EXTENSION);
    $uploaderrors = array();


// Check if file already exists
if (file_exists($target_file)) {
    $uploaderrors[] = "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if($filesizelimit>0)
{
    if ($_FILES["fileToUpload"]["size"] > $filesizelimit) {
        $uploaderrors[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
}

// Allow certain file formats
if($fileextfilter.count()>0)
{
    if(!$fileextfilter.contains($ext)) {
        $uploaderrors[] = "Sorry, file type not allowed.";
        $uploadOk = 0;
    }
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $uploaderrors[] =  "Sorry, there was an error uploading your file.";
    }
}
return new UploadFilesReturnObject(($uploadOk>0)?true:false,$uploaderrors);
}

class UploadFilesReturnObject{
    public $success;
    public $errors;
    function __construct($uploadsuccess,$uploaderrors){
        $success = $uploadsuccess;
        $errors = $uploaderrors;
    }

}
?>