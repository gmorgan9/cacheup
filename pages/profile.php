<?php

require_once "../app/database/connection.php";
// require_once "app/database/functions.php";
require_once "../path.php";
session_start();

// if(isLoggedIn()){
//   header('location: '. BASE_URL . '/pages/dashboard.php');
// }

// if (isset($_POST['upload'])) {
 
//     $filename = $_FILES["filename"]["name"];
//     $tempname = $_FILES["filename"]["tmp_name"];
//     $folder = "../upload/" . $filename;
 
//     $db = mysqli_connect("localhost", "garrett", "BIGmorgan1999!", "cacheup");
 
//     // Get all the submitted data from the form
//     $sql = "UPDATE users SET filename = '$filename' WHERE idno = '".$_SESSION['user_idno']."'";
 
//     // Execute query
//     mysqli_query($db, $sql);
 
//     // Now let's move the uploaded image into the folder: image
//     if (move_uploaded_file($filename, $folder)) {
//         echo "<h3>  Image uploaded successfully!</h3>";
//     } else {
//         echo "<h3>  Failed to upload image!</h3>";
//     }
// }


$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["filename"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["filename"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image.";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
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
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../assets/styles.css?v=2.50">

    <title>Profile - CacheUp Blog</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="main-container">
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<?php include(ROOT_PATH . "/app/includes/sidebar.php") ?>
        
<div class="main">
  <div class="page-header mx-auto">
    <p class="page_title" style="float: left; padding-top: 2px;">Profile</p>
  </div>


  
</div>
<!-- <?php
        // $id = $_SESSION['user_idno'];
        // $sql = "SELECT * FROM users WHERE idno = '$id'";
        // $all = mysqli_query($conn, $sql);
        // if($all) {
        //     while ($row = mysqli_fetch_assoc($all)) {
        //       $firstname      = $row['firstname'];
        //       $user_id        = $row['user_id'];
    ?>
    <br><br><br><br><br>
    <div class="ms-5 ps-5">
    <form method="post" action="">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
        <input class="form-control" type="file" name="filename" />
        <input class="form-control" type="submit" value="Save" name="upload">
    </form>
    </div>
    <?php //}} ?> -->

    <br><br><br><br><br><br>

        <form method="POST" action="" >
            <div class="form-group">
                <input class="form-control" type="file" name="filename" value="" />
            </div>
                <button class="form-control" type="submit" name="submit">UPLOAD</button>
  
        </form>
   
    
        <!-- <?php
        // $query = " SELECT * from users ";
        // $result = mysqli_query($db, $query);
 
        // while ($data = mysqli_fetch_assoc($result)) {
        // ?>
        //     <img src="../upload/<?php //echo $data['filename']; ?>">
 
        // <?php
        // }
        ?> -->


</div>

    
<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

<!-- <script src="../assets/js/new.js"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
  $(document).on('click', 'a', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
  $(document).on('click', 'ul li a', function() {
    $(this).removeClass('active')
  })
</script>


    <script src="../assets/js/dropdown.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>