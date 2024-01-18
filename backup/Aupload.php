
<?php
require '../database/Connection.php';
if(isset($_POST["submit"])){
    
  $name = $_POST["name"];
  $img_desc = $_POST["img_desc"];

  if($_FILES["img_dir"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  
  else{
    $fileName = $_FILES["img_dir"]["name"];
    $fileSize = $_FILES["img_dir"]["size"];
    $tmpName = $_FILES["img_dir"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '../Admin/uploads/' . $newImageName);
      $query = "INSERT INTO cards VALUES('', '$name', '$newImageName', '$img_desc')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = '../Admin/Cards.php';
      </script>
      ";
    }
  }
}
?>
