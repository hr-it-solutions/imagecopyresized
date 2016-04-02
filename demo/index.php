<?php
/**
 * @version    2-0-1-0 // Y-m-d 2016-04-02
 * @author     Didldu e.K. Florian Häusler https://www.hr-it-solution.com
 * @copyright  Copyright (C) 2011 - 2016 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * A simple php html demonstration of DD_ImgCopyResized
 * including step by step - Manual (jump to line 33)
 **/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple PHP HTML Demonstration Of DD_ImgCopyResized</title>
    <style>* {text-align: center;} h2 {color: #080;} p {color: #f00;}</style>
</head>
<body>
<h2>Let´s test</h2>

<!-- Typical multipart/form-data file upload form -->
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" >
        <label for="imgupload">Image</label>
        <input id="imgupload" type="file" name="file" required="required">
        <input type="submit" value="Upload and generateThumbnail">
        <p>* minimum required image size 400px width and 300px height.<br>Please read attached README.md first!</p>
</form>

<!-- DD_ImgCopyResized implementation step by step - Manual  -->
<?php
if (isset($_FILES['file'])) {

    // 1st Step: Include DD_ImgCopyResized library
    include('../librarie/imgcopyresized.php');

    // 2nd Step: Setup expected arguments for DD_ImgCopyResized->generateThumbnail() method
    $file = $_FILES["file"];;
    $final_width = 400;                 // 400px
    $final_height = 300;                // 300px typisches 4:3 Format
    $savepath = 'generated_images/';    // NOTE: depending on server settings, this path has to exist on your server!
    $final_quality = 80;                // 80 is a recommended web jpg quality of thumbnails

    // 3rd Step: Create a new class instance
    $img = new DD_ImgCopyResized();

    // 4th Step: Executing generateThumbnail() method
    $newfile = $img->generateThumbnail($file, $final_width, $final_height, $savepath, $final_quality);

    // 5th Step: Use returned class src string
    echo "<img src='" . $newfile . "'>";
}
?>
</body>
</html>