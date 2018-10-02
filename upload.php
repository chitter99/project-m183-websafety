<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="upload.php" method="POST">
    <p>Upload your file</p>
      <input type="file" name="uploaded_file"/><br />
      <input type="submit" value="Upload"/>
  </form>
</body>
</html>
<?php
  if(!empty($_FILES['uploaded_file']))
  {
    $temp = explode(".", $_FILES['uploaded_file']['name']);
    echo end($temp);
    $path = 'images/'.round(microtime(true)) . '_Upload' . '.' . end($temp);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else {
        echo "There was an error uploading the file, please try again!";
    }
  }
?>