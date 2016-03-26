<style>
	.img-thumbnail {
	    background-color: #FFFFFF;
	    border: 1px solid #DDDDDD;
	    border-radius: 4px;
	    display: inline-block;
	    height: auto;
	    line-height: 1.42857;
	    max-width: 100%;
	    padding: 4px;
	    transition: all 0.2s ease-in-out 0s;
	}
</style>
<h3>Upload Forms, Pricing or Spec Documentation</h3>
<p>Select a PDF Doc and Upload.  A Jpeg thumbnail image will be auto created. The image and pdf will be located in the directory chosen.</p>
<form method="post" action="" enctype="multipart/form-data">
	<h4>Step 1: Select a PDF document to upload.</h4>
	<p><input type="file" name="pdf"/></p>
	<h4>Step 2: Document Uploaded location:</h4>
	<p><input style="width:400px;" type="text" id="dirAdd" name="dirAdd" value="<?php echo $dirNameList ?>" readonly="true"></p>
    <p>
    	<input type="hidden" name="process" value="1" />
		<input type="Submit" name="Submit" value="Upload" />
	</p>
</form>
<?php

if ($_POST['process'] == 1) {
	$dirAdd =  $_POST["dirAdd"];
	echo $pdfDirectory = "../wp-content/uploads/dealer-tools/".$dirAdd."/";
	$thumbDirectory = "../wp-content/uploads/pdfimage/";

	//get the name of the file
	$filename = basename($_FILES['pdf']['name'], ".pdf");

	//remove all characters from the file name other than letters, numbers, hyphens and underscores
	$filename = preg_replace("/[^A-Za-z0-9_-]/", "", $filename) . ".pdf";

	//name the thumbnail image the same as the pdf file
	$thumb = basename($filename, ".pdf");

	if (move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfDirectory . $filename)) {

		//the path to the PDF file
		$pdfWithPath = $pdfDirectory . $filename;

		//add the desired extension to the thumbnail
		$thumb = $thumb . ".jpg";

		//execute imageMagick's 'convert', setting the color space to RGB and size to 200px wide
		exec("convert \"{$pdfWithPath}[0]\" -colorspace RGB -geometry 200 $thumbDirectory$thumb");

		//show the image
		echo "<h4>PDF uploaded successfully!</h4>";
		echo "<h4>Upload Results:</h4>";
		echo "<p><a href=\"".$pdfWithPath."\" target='_blank'><img class=\"img-thumbnail\"src=\"/".$thumbDirectory.$thumb."\" alt=\"\"  class=\"pdfImgUpload\"/></a></p>";
		echo "<ul>";
		echo "<li><b>Category Directory:</b> ".$categoryDirList."</li>";
		echo "<li><b>Brand Directory:</b>".$uploadDir."</li>";
		echo "<li><b>PDF Upload Directory:</b> ".$pdfDirectory."</li>";
		echo "<li><b>Thumbnail Image Directory:</b> ".$thumbDirectory.$thumb."</li>";
		echo "<li><b>File Name:</b> " . $filename . "</li>";
		echo "</ul>";
		
	}
}
?>