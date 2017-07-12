<?php


function UploadFiles($uploadedfile, $targetfile, $fileextfilter,$filesizelimit){

    $uploadOk = 1;
    $ext = pathinfo($targetfile,PATHINFO_EXTENSION);
    $uploaderrors = array();


    // Check if file already exists
    if (file_exists($targetfile)) {
        $uploaderrors[] = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if($filesizelimit>0)
    {
        if ($_FILES[$uploadedfile]["size"] > $filesizelimit) {
            $uploaderrors[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
    }

    // Allow certain file formats
    if(count($fileextfilter)>0)
    {
        if(!in_array($ext,$fileextfilter)) {
            $uploaderrors[] = "Sorry, file type not allowed.";
            $uploadOk = 0;
        }
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$uploadedfile]["tmp_name"], $targetfile)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            $uploaderrors[] =  "Sorry, there was an error uploading your file.";

            print_r($_FILES);
            print_r(realpath($targetfile));
        }
    }
    return new UploadFilesReturnObject(($uploadOk>0)?true:false,$uploaderrors);
}

class UploadFilesReturnObject{
    public $success;
    public $errors;
    function __construct($uploadsuccess,$uploaderrors){
        $this->success = $uploadsuccess;
        $this->errors = $uploaderrors;
    }

}
?>