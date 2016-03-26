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
	<h4>Step 1: Select a Category:</h4>
	<p>
		<select name="categoryDirList">
			<option value="0">Select</option>
	  		<option value="dealer-tools">Dealer Tools</option>
	  		<option value="spec-docs">Specifications</option>
	  		<option value="marketing-docs">Marketing Docs</option>
	  		<option value="mode-docs">Mode Docs</option>
		</select>
	</p>
	<h4>Step 2: Select a Brand/Sub-Category:</h4>
	<p>
		<select name="promoDirList">
  			<option value="0">Select</option>
  			<option value="aga">AGA</option>
  			<option value="american-range">American Range</option>
			<option value="heartland">Heartland</option>
			<option value="marvel">Marvel</option>
			<option value="vent-a-hood">Vent-A-Hood</option>
			<option value="mode-forms">Mode Forms</option>
		</select>
	</p>
	<h4>Step 3: Select a PDF document to upload.</h4>
	<p><input type="file" name="pdf"/></p>
	<h4>Step 4: Submit.</h4>
  
    <p>
    	<input type="hidden" name="process" value="1" />
		<input type="Submit" name="Submit" value="Upload" />
	</p>
</form>
<?php

if ($_POST['process'] == 1) {
				
	$categoryDirList =  $_POST["categoryDirList"];
	$uploadDir =  $_POST["promoDirList"];
	$pdfDirectory = "../wp-content/uploads/".$categoryDirList."/".$uploadDir."/";
	$thumbDirectory = "../wp-content/uploads/pdfimage/";
	
	if ($_POST['categoryDirList'] == '0' && $_POST['promoDirList'] == '0') {
		echo "<p class='error'>Please Make sure to select a Category and Upload Directory.</p>";
	} else if ($_POST['categoryDirList'] != '0' && $_POST['promoDirList'] == '0') {
		echo "<p class='error'>Please Make sure to select an Upload Directory.</p>";
	} else if ($_POST['categoryDirList'] == '0' && $_POST['promoDirList'] != '0') {
		echo "<p class='error'>Please Make sure to select an Category Directory.</p>";
	} else {

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
}
?>