<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

input[type=file], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>


<h2>Codeigniter 3</h2>
<h3>File Upload</h3>
<div><?php if(isset($error)){
			echo $error;
		}
	?></div>


<div>
  <form method="POST" enctype="multipart/form-data"  action="<?=base_url('upload/do_upload')?>">
    <label for="file">Upload File</label>
    <input type="file" id="file" name="files[]" multiple placeholder="Upload file...">

    <input type="submit" value="Submit">
  </form>
</div>

	<table>
	<tr>
		<th>Filename</th>
		<th>Type</th>
		<th>Size</th>
		<th>Path</th>
	</tr>
	<?php if($data!=null) {
		foreach($data as $data){
		?>
	<tr>
		<td><?=$data['file_name']?></td>
		<td><?=$data['file_type']?></td>
		<td><?=$data['file_size']?></td>
		<td><?=$data['full_path']?></td>
	</tr>
	<?php 
	}

} ?>
	</table>

</body>
</html>
