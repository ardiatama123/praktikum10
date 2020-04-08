<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.warning {color: #FF0000;}
	</style>
</head>
<body>

<?php
$error_nama="";
$error_email="";
$error_web="";
$error_pesan="";
$error_telp="";

$nama="";
$email="";
$web="";
$pesan="";
$telp="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// NAMA
	if(empty($_POST["nama"]))
{
	$error_nama = "Nama Tidak Boleh Kosong";
}
	else {
		$nama = cek_input($_POST["nama"]);
		if (!preg_match("/^[a-zA-Z]*$/",$nama))
		 {
		 	$namaErr = "Inputan Hanya Boleh Huruf dan Spasi";
		 }
	}
	// EMAIL
	if(empty($_POST["email"]))
{
	$error_email = "Email Tidak Boleh Kosong";
}
	else {
		$email = cek_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		 {
		 	$error_email = "Format Email Invalid";
		 }
	}
	// PESAN
	if(empty($_POST["pesan"]))
{
	$error_pesan = "Pesan Tidak Boleh Kosong";
}
	else {
		$pesan = cek_input($_POST["pesan"]);
	}
	//WEB
	if (empty($_POST["web"])) 
{
	$error_web = "Website tidak boleh kosong";
}
else
{
	$web = cek_input($_POST["web"]);

	if (!preg_match("/\b(?:(?: https?|ftp):\/\/|www\.)[-a-z0-9+$@#\/%=~_|]/i",$web)) 
	{
		$error_web = "URL tidak valid";
	}
}
	//TELP
	if(empty($_POST["telp"]))
{
	$error_telp = "No Telp Tidak Boleh Kosong";
}
	else {
		$telp = cek_input($_POST["telp"]);
		if (!is_numeric($telp))
		 {
		 	$error_telp = "Inputan Hanya Boleh Angka";
		 }
	}

}

function cek_input($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<div class="row">
<div class="col-md-6">
<div class="card">
<div class="card-reader">
	CONTOH VALIDASI FORM DENGAN PHP
</div>
<div class="card-body">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<!-- NAMA --> 
	<div class="form-group row">
	<label for="nama" class="col-sm-2 col-form-label">NAMA</label>
	<div class="col-sm-10">
	<input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is-invalid" : ""); ?>" id="nama" placeholder="Nama" value="<?php echo $nama; ?>"> <span class="warning"><?php echo $error_nama;?> </span>
</div>
</div>
	<!-- EMAIL -->
	<div class="form-group row">
	<label for="email" class="col-sm-2 col-form-label">EMAIL</label>
	<div class="col-sm-10">
	<input type="text" name="email" class="form-control <?php echo ($error_email !="" ? "is-invalid" : ""); ?>" id="email" placeholder="Email" value="<?php echo $email; ?>"> <span class="warning"><?php echo $error_email;?> </span>
</div>
</div>
	<!-- WEBSITE -->
	<div class="form-group row">
	<label for="web" class="col-sm-2 col-form-label">WEB</label>
	<div class="col-sm-10">
	<input type="text" name="web" class="form-control <?php echo ($error_web !="" ? "is-invalid" : ""); ?>" id="web" placeholder="Website" value="<?php echo $web; ?>"> <span class="warning"><?php echo $error_web;?> </span>
</div>
</div>
	<!-- TELP -->
	<div class="form-group row">
	<label for="telp" class="col-sm-2 col-form-label">NO.TELP</label>
	<div class="col-sm-10">
	<input type="text" name="telp" class="form-control <?php echo ($error_telp !="" ? "is-invalid" : ""); ?>" id="telp" placeholder="No Telp" value="<?php echo $telp; ?>"> <span class="warning"><?php echo $error_telp;?> </span>
</div>
</div>
	<!-- PESAN -->
	<div class="form-group row">
	<label for="pesan" class="col-sm-2 col-form-label">PESAN</label>
	<div class="col-sm-10">
	<input type="text" name="pesan" class="form-control <?php echo ($error_pesan !="" ? "is-invalid" : ""); ?>" id="pesan" placeholder="Pesan" value="<?php echo $pesan; ?>"> <span class="warning"><?php echo $error_pesan;?> </span>
</div>
</div>
<div class="form-group row">
	<div class="col-sm-10">
		<button type="submit" class="btn btn-primary">SIGN IN
		</button>
</div>
</div>
</form>

</div>
</div>
</div>
</div>

<?php
echo "<h2>Your Input:</h2>";
echo "Nama = ".$nama;
echo "<br>";
echo "Email = ".$email;
echo "<br>";
echo "Website = ".$web;
echo "<br>";
echo "No Telp = ".$telp;
echo "<br>";
echo "Pesan = ".$pesan;
echo "<br>";
?>
</body>
</html>