<?php
/*
 *
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<center>File is an image - " . $check["mime"] . ".</center>";
        $uploadOk = 1;
    } else {
        echo "<center>File is not an image.</center>";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "<center>Sorry, file already exists.</center>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<center>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</center>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<center>Sorry, your file was not uploaded.</center>";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo "<img src='$target_file'>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
*/
?>

<html>

<head>
    <style>
        .containerdiv {
            position: relative;
            width: 100%;
            height: 156px;
            text-align: center;
        }


        .absimg {
            position: absolute;
            
        }

        .imgdiv {
            display: inline-block;
            position: relative;
        }
    </style>
</head>
<body>
    
        
    

    <div>

        <form action='' method=post>
            <input type='image' alt=' Finding coordinates of an image' src='images/basementlarge.png'
                name='foo' style=cursor:crosshair; />

        </form>
    </div>

                
                
    <div class='containerdiv' align='center'>

        <div class="imgdiv">
            <img src="images/basementlarge.png" border="0" />
            <?Php
        if($_POST){
            $foo_x=$_POST['foo_x'];
            $foo_y=$_POST['foo_y'];
            $imagesize = getimagesize("images/basementlarge.png");
            $x_percent = $foo_x*100/$imagesize[0];
            $y_percent = $foo_y*100/$imagesize[1];
            $crosshairssize = getimagesize("images/elementcross@12px.png");
            $marginleft = round($crosshairssize[0]/2);
            $margintop = round($crosshairssize[1]/2);
            echo "<img src='images/elementcross@12px.png' border='0' class='absimg' style='top: ".round($y_percent,PHP_ROUND_HALF_DOWN)."%; left:".round($x_percent,PHP_ROUND_HALF_DOWN)."%; margin-left:-".$marginleft."px; margin-top:-".$margintop."px;'/>";

        }
            ?>
            </div>
    
        </div>
</body>
</html>
