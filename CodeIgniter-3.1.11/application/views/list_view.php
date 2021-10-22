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
  <h2>Basic Table</h2>
  <?php echo $this->session->flashdata('message_name'); ?> 
  <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Iso2 code</th>
                <th>Name</th>
                <th>Region</th>
                <th>Income Level</th>
                <th>Capital City</th>
                <th>latitude</th>
                <th>longitude</th>
                <th>Action</th>
            </tr>
        </thead>
       <tbody>
        <?php 
          if(!empty($list)){
            foreach ($list as $key => $value) {
        ?>      
       
         <tr>
           <td><?= $value['iso2Code']?></td>
           <td><?= ucfirst($value['name'])?></td>
           <td><?= ucfirst($value['region_value'])?></td>
           <td><?= $value['incomeLevel_value']?></td>
           <td><?= $value['capitalCity']?></td>
           <td><?= $value['latitude']?></td>
           <td><?= $value['longitude']?></td>
           <td><a href="<?php echo base_url('home/edit/'). base64_encode($value['country_id']) ?>">Edit</a></td>
         </tr>
        <?php }} ?>
       </tbody>
        <tfoot>
            <tr>
                <th>Iso2 code</th>
                <th>Name</th>
                <th>Region</th>
                <th>Income Level</th>
                <th>Capital City</th>
                <th>latitude</th>
                <th>longitude</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>

</body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );

</script>