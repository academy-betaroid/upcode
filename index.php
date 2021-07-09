<?php
if (isset($_POST['submit']) && !empty($_FILES["fileToUpload"]["tmp_name"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $message = array();
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
    }
 
// Check if file already exists
    if (file_exists($target_file)) {
        $message[] = "این فایل در هاست موجود است";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message[] = "متاسفانه فایلتان اپلود نشد";
 
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $message[] = "فایل " . basename($_FILES["fileToUpload"]["name"]) . " با موفقیت اپلود شد";
        } else {
            $message[] = "متاسفانه در هنگام اپلود به مشکل خوردیم";
        }
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.2/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.2/dist/css/bootstrap.min.css">
</head>

<body style="background:white;">
 <center>
 <header>
 <img src="icon.png" class="ico">
 </header>
    <div class="container">
  
        <form id="upload-form" action="index.php" method="post" enctype="multipart/form-data">

            <p class="form-element">
                <label class="label"><b>انتخاب و اپلود کنید:</b></label>
                <br>
                <input type="file" name="fileToUpload" id="fileToUpload" value="فایل شما">
            </p>

            <p class="form-element">
                <input type="submit" value="آپلود فایل" name="submit">
            </p>
        </form>
    </div>

    <?php if (isset($message)) { ?>
        <div class="container">
            <?php echo implode('<br>', $message); ?>
        </div>
    <?php 
} ?>
<div class="container">
<?php echo "لینک:"."upcode.0site.ir/".$target_dir.$_FILES["fileToUpload"]["name"];?>
</div>
<footer>
<p class="copy">تمام حقوق برای <a href="http://amircom.0site.ir" class="amircom" style="color:#00E7C8;">امیرکام </a>محفوظ است</p>
</footer>
</center>
</body>
</html>