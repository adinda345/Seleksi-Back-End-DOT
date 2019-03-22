<!DOCTYPE html>
<html>
<head>
	<title>Raja Ongkir CI</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>">
<body>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Raja Ongkir API</h3>

			<?php echo form_open('shipping/cek')?>
			<div class="form-group">
				<label for="select1">Asal</label>
				<select name="origin_province" class="form-control" id="select1">
					<option>- Provinsi -</option>
					<?php foreach ($province->rajaongkir->results as $prov) { ?>
						<option value="<?php echo $prov->province_id; ?>"><?php echo $prov->province; ?></option>
					<?php } ?>
				</select>
				<br>
			<div class="form-group">
				<label for="select1">Kota</label>
				<select name="origin_city" class="form-control" id="select1">
					<option>- Kota -</option>
				</select>
			</div>

			<div class="form-group">
				<label for="select1">Tujuan</label>
				<select name="destination_province" class="form-control" id="select1">
					<option>- Provinsi -</option>
					<?php foreach ($province->rajaongkir->results as $prov) { ?>
						<option value="<?php echo $prov->province_id; ?>"><?php echo $prov->province; ?></option>
					<?php } ?>
				</select>
				<br>
				<select name="destination_city" class="form-control" id="select1">
					<option>- Kota -</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<?php echo form_close() ?>
		</div>
	</div>
	
</div>
</body>
</html>