<script>
	function run() {
		document.getElementById("submit_btn").disabled = false;
		document.getElementById("srt").value = document.getElementById('fileLoc').options[document.getElementById('fileLoc').selectedIndex].text;
	}	
</script>

<h3>Remove A Document</h3>
<p>Select a Document and Click the Delete Button!</p>

<!-- <form name="optf" action="<?php $_SERVER['PHP_SELF'] ?>" method=""> -->
<form method="post" action="">
<p><input style="width:400px;" type="text" id="dirDd" name="dirDd" value="<?php echo $dirNameList ?>" readonly="true"></p>
<h4>Step 1: Select a File to Delete.</h4>
<p>
	<select id="fileLoc" name="dirList" onchange="run()">
		<option value="0">--- Select File ---</option>
	<?php 	 
	    if (is_dir($dir)) {
	        if ($dh = opendir($dir)) {
	        while (($file = readdir($dh)) !== false) {
	            if ($file != "." && $file != ".." && $file != ".htaccess") {
	                $name = basename($file, '.pdf'); // Removes file extension       
	                echo"<option value=\"$file\">$name</option>\n";
	            }
	        }
	        closedir($dh);
	        }
	    }
	?>
	</select>
</p>
<h4>File to be Deleted:</h4>
<p><input style="width:400px;" type="text" id="srt" placeholder="File to be Deleted" readonly="true"></p>
<p>
	<input type="hidden" name="process" value="1" />
	<input id="submit_btn" type="submit" name="deleteFile" value="Delete"  onclick="location = location.href" disabled/>
</p>
<?php
$dirDd =  $_POST["dirDd"];
$fileLocale =  $_POST["dirList"];
if(isset($_POST['deleteFile'])) {
	$data=$fileLocale;    
	$dirD = "../wp-content/uploads/dealer-tools/".$dirDd."/";   
	echo $dirD;
	$dh = opendir($dirD);    
	while ($file = readdir($dh)) {    
	    if($file==$data) {
	    	echo "<h4> File Deleted!</h4>";
	        unlink($dirD."/".$file);
	    }
	}    
	closedir($dh);

	echo $fileLocale;	
	echo '<meta http-equiv="refresh" content="0;url=admin.php?page=pricing-docs">';
}
?>
</form>