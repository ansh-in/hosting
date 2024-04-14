<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload By Ansh</title>
  <style>
    body { 
      font-family: 'Roboto', sans-serif; 
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    input[type="file"] {
      display: none;
    }
    .custom-file-upload {
      display: inline-block;
      padding: 10px 15px;
      background-color: #007bff;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }
    .custom-file-upload:hover {
      background-color: #0056b3;
    }
    .file-name {
      display: block;
      margin-top: 10px;
      font-size: 14px;
      color: #666;
    }
    .file-list {
      list-style: none;
      padding: 0;
    }
    .file-list li {
      margin-bottom: 10px;
    }
    .file-list li a {
      display: block;
      padding: 10px 15px;
      background-color: #f0f0f0;
      color: #333;
      text-decoration: none;
      border-radius: 5px;
    }
    .file-list li a:hover {
      background-color: #e0e0e0;
    }
    .terms {
      margin-top: 20px;
      border-top: 1px solid #ddd;
      padding-top: 20px;
    }
    .terms h2 {
      margin-bottom: 10px;
    }
    .terms p {
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Upload Your File</h1>
    <form action="" method="post" enctype="multipart/form-data" class="form-group">
      <label for="fileToUpload" class="custom-file-upload">Choose a file</label>
      <input type="file" name="fileToUpload" id="fileToUpload" onchange="updateFileName(this)">
      <span id="fileName" class="file-name"></span>
      <input type="submit" value="Upload File" name="submit" class="custom-file-upload">
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $target_dir = ""; // Current directory
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<p>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</p>";
      } else {
        echo "<p>Sorry, there was an error uploading your file.</p>";
      }
    }
    ?>

    <h2>Uploaded Files :)</h2>
    <ul class="file-list">
      <?php
      $dir = "."; // Current directory
      $fileList = array_diff(scandir($dir), array('.', '..'));

      foreach ($fileList as $file) {
        // Exclude index.php from the list
        if ($file != "index.php") {
          echo "<li><a href='$file' download>$file</a></li>";
        }
      }
      ?>
    </ul>
    
    <div class="terms">
      <h2>Terms and Conditions</h2>
      <p>Files of Big Sizes will not be accepted and in case of anyone uploading any irrelevant material will be baned and the material will be deleted.Maked by Ansh on Varun's idea</p>
    </div>
  </div>

  <script>
    function updateFileName(input) {
      var fileNameSpan = document.getElementById("fileName");
      fileNameSpan.textContent = input.files[0].name;
    }
  </script>
</body>
</html>
