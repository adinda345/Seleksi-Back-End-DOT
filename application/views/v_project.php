<!DOCTYPE html>
<html>
<head>
	<title>Raja Ongkir CI</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<body>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Raja Ongkir API</h3>

			<?php echo form_open('shipping/cek')?>
			<div class="form-group">
				<label for="select1">Asal</label>
				<select id="origin_province" name="origin_province" class="form-control" >
					<option>- Provinsi -</option>
					<?php foreach ($province->rajaongkir->results as $prov) { ?>
						<option value="<?php echo $prov->province_id; ?>"><?php echo $prov->province; ?></option>
					<?php } ?>
				</select>
				<br>
			<div class="form-group">
				<label for="select1">Kota</label>
				<select id="origin_city" name="origin_city" class="form-control" >
					<option>- Kota -</option>
				</select>
			</div>

			<div class="form-group">
				<label for="select1">Tujuan</label>
				<select id="destination_province" name="destination_province" class="form-control" >
					<option>- Provinsi -</option>
					<?php foreach ($province->rajaongkir->results as $prov) { ?>
						<option value="<?php echo $prov->province_id; ?>"><?php echo $prov->province; ?></option>
					<?php } ?>
				</select>
				<br>
				<select id="destination_city" name="destination_city" class="form-control">
					<option>- Kota -</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<?php echo form_close() ?>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#origin_province').change(function(){
			var province_id = $('#origin_province').val();
		$.get('<?php echo site_url('shipping/get_city_by_province/')?>'+province_id, function(resp){
			// console.log(resp);
			$('#origin_city').html(resp);
		});

		});
	});
	$(document).ready(function(){
		$('#destination_province').change(function(){
			var province_id = $('#destination_province').val();
		$.get('<?php echo site_url('shipping/get_city_by_province/')?>'+province_id, function(resp){
			// console.log(resp);
			$('#destination_city').html(resp);
		});

		});
	});

</script>
</body>
</html>