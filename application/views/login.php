<?php echo form_open('ctr_user/login'); ?>

		<h1 class="text-center">FORM LOGIN</h1>
			<br>
			<br>

			<div class="form-group">
			<label class="col-sm-2 col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
			<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
			</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
			<input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
			</div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
<?php echo form_close(); ?>