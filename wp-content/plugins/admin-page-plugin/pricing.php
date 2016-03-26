<style>

.box1 {
	border: 1px solid #EEEEEE;
    float: left;
    margin-right: 10px;
    min-height: 400px;
    overflow: auto;
    padding: 10px;
    width: 55%;
}
.box2 {
	width:38%;
	min-height:200px;
	border: 1px solid #EEEEEE;
	overflow: auto;
	float:left;
	padding:10px;
	margin-bottom: 10px;
}
.box3 {
	width:38%;
	min-height:400px;
	border: 1px solid #EEEEEE;
	overflow: auto;
	float:left;
	padding:10px;
}
.box3:after {
	clear: both;
	content: ".";
	display: block;
	height: 0;
	visibility: hidden;
}
.installDocs > li {
    float: left;
}
/* Specifications.php list styling */
.specData {
	display: inline;
	margin: 10px;
}
.specData a:after {
	clear: both;
	content: ".";
	display: block;
	height: 0;
	visibility: hidden;
}

.boxListItem {
	float: left;
	height: 230px;
	text-align: center;
	width: 180px;
}

.boxListItem a {
	display: block;
	font-size: 10px;
	line-height: 12px;
}

.box {
	background-color: #CCCCCC;
	border: 1px solid #CCCCCC;
	height: auto;
	margin: 0 auto 3px auto;
	width: 100px;
}

.pdfImgUpload {
	width: 100px;
	height: auto;
}
</style>

<script>
	function selectDir() {
		document.getElementById("selectDir_btn").disabled = false;
	}	
</script>


<div class="box1">
	<form method="post" action="">
	<select id="dirNameList" name="dirNameList" onchange="selectDir()">
		<option value="0">----- Select Directory -----</option>
	<?php
		function listFolder($dir){
		$count = 1;
	    $ffs = scandir($dir);
	    foreach($ffs as $ff){
	        if($ff != '.' && $ff != '..'){
	        	echo"<option value=\"$ff\">$ff</option>\n";
	        }
	    }
	}
	
	listFolder('../wp-content/uploads/dealer-tools/');
	$dirNameList =  $_POST["dirNameList"];
	
	?>
	</select>
	<input id="selectDir_btn" type="submit" name="SelectBrand" value="Select" disabled/>
	<ul class="specData">
	<?php
		if(isset($_POST['SelectBrand'])) {
			echo "<h3>".$dirNameList."</h3>";	
			echo $dir; 
			$dir = "../wp-content/uploads/dealer-tools/$dirNameList/";
			
		}
		
	    if (is_dir($dir)) {
	        if ($dh = opendir($dir)) {
	        while (($file = readdir($dh)) !== false) {
	            if ($file != "." && $file != ".." && $file != ".htaccess") {
	                $name = basename($file, '.pdf'); // Removes file extension  
	   				?>
	   				<li class="boxListItem">
	   					<a href="<?php echo $dir."/".$file; ?>" target="_blank">
	   						<img class="box" alt='pdf' src='../wp-content/uploads/pdfimage/<?php echo $name ?>.jpg'/>
	   						<a href="<?php echo $dir."/".$file; ?>" target="_blank"><?php echo $file ?></a>
	   					</a>
	   				</li>
	   						
	   				<?php
	            }
	        }
	        closedir($dh);
	        }
	    }
	?>
	</ul>
	</form>
</div>
<div class="box2">	
	<?php include('delete-doc.php'); ?>
</div>
<div class="box3">
	<?php include('add-doc.php'); ?>
</div>