<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <title>Bootstrap Example</title> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" 
href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" 
src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<body>

<div class="container">
	<h3>Update</h3>
	<br>
	
	<div class="row">
		<form method="post" action="<?= base_url('home/editupdate') ?>">
			<input type="hidden" name="id" value="<?= $details['country_id'] ?>">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Income Level</label>
				    <input type="text" name="incomeLevel_value" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Income Level" value="<?= $details['incomeLevel_value']; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Capital City</label>
				    <input type="text" name="capitalCity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Capital City" value="<?= $details['capitalCity']?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">longitude</label>
				    <input type="text" name="longitude" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="longitude" value="<?= $details['longitude'] ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">latitude</label>
				    <input type="text" name="latitude" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="latitude" value="<?= $details['latitude']?>">
				</div>
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</div>

</body>
</html>