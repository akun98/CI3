<div class="container">
   <div class="py-5 text-center">
   		<h2>Selamat Datang, <?php echo $user->nama; ?>
       <span class="badge badge-primary">
       		<?php echo $user->nama_level; ?>
       </span>
       		<?php echo "<br> Have A Nice Day!"; ?>
       </h2><br><br>
   		<div class="row">
   			<div class="col-sm"></div>
   			<div class="col-sm">
   				<a href="<?php echo site_url()?>V_Blog/add/">
	   				<img src="../assets/img/edit.png" class="img-fluid"> <br><br>
		   			<h4>Create News</h4>
	   			</a>
   			</div>
	   		<div class="col-sm">
	   			<a href="<?php echo site_url()?>Category/">
	   				<img src="../assets/img/categori.jpg" class="img-fluid"> <br><br>
	   				<h4>Category Data</h4>
	   			</a>
	   		</div>
	   		<div class="col-sm">
	   			<a href="<?php echo site_url()?>v_blog/">
	   				<img src="../assets/img/table.jpg" class="img-fluid"> <br><br>
	   				<h4>Blog</h4>
	   			</a>
	   		</div>    
	   		<div class="col-sm"></div>
	    </div>
   </div>
</div>