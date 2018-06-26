<?php echo form_open('ctr_user/register', array('class' => 'needs-validation', 'novalidate' => '')); ?>
			<br>
			<br>
			<h1 class="text-center">FORM REGISTRASI USER</h1>
			<br>
			<br>
			<br>
			<br>
			<br>
 <div class="form-group">
 	<label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
 	<div class="col-sm-10">
 		<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
 	</div>
 </div>
 <br>
 <div class="form-group">
 	<label class="col-sm-2 col-sm-2 control-label">Email</label>
 	<div class="col-sm-10">
		<input type="text" class="form-control" name="email" placeholder="email">
	</div>
 </div>
 <br>
 <div class="form-group">
 	<label class="col-sm-2 col-sm-2 control-label">Kodepos</label>
 	<div class="col-sm-10">
 		<input type="text" class="form-control" name="kodepos" placeholder="Kodepos">
 	</div>
 </div>
 <br>
 <div class="form-group">
 	<label class="col-sm-2 col-sm-2 control-label">Username</label>
 	<div class="col-sm-10">
 		<input type="text" class="form-control" name="username" placeholder="username">
 	</div>
 </div>
 <br>
 <div class="form-group">
 	<label class="col-sm-2 col-sm-2 control-label">Password</label>
 	<div class="col-sm-10">
 		<input type="password" class="form-control" name="password" placeholder="password">
 	</div>
 </div>
 <br>
 <div class="form-group">
	<label class="col-sm-2 col-sm-2 control-label">Konfirmasi Password</label>
	<div class="col-sm-10">
	<input type="password" class="form-control" name="password2" placeholder="Ulangi Password">
	</div>
</div>
<br>
<div class="form-group">
    <label for="">Pilih Paket Membership</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="membership" 
id="gold" value="2" checked>
        <label class="form-check-label" for="gold">Gold</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="membership" 
id="silver" value="3">
        <label class="form-check-label" for="silver">Silver</label>
    </div>
</div>

<br>
<br>
<br>
 <button type="submit" class="btn btn-primary btn-block">Daftar</button>
<?php echo form_close(); ?>