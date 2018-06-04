<?php if (!$this->session->userdata('logged_in')) {
  redirect('ctr_user/login');
} ?>

<?php $this->load->view("template/header"); ?>

  <a href="v_blog/add" class="btn btn-primary">Add Artikel</a>
      <?php foreach ($artikel as $key): ?>

        <div class="well well-sm">
          <div class="row">

            <div class="col-sm-12 col-md-12">
              <h3><?php echo $key->judul_blog ?></h3>
              <br>
              <img src="<?php echo base_url()?>gambar/<?php echo $key->gambar_blog;?>" alt="Image" width="500">
              <p>
                diupload tanggal : <?php echo $key->tanggal_blog ?><br>
                <a href="<?php echo site_url()?>V_blog/detail/<?php echo $key->id_blog ?>">Read More ...</a>
              </p>
              <a href='<?php echo site_url()?>v_blog/edit/<?php echo $key->id_blog ?>' class='btn btn-sm btn-info'>Update</a>
              <a href='<?php echo site_url()?>v_blog/delete/<?php echo $key->id_blog ?>' class='btn btn-sm btn-danger'>Hapus</a>
            </div>
          </div>
        </div>
        <?php endforeach ?>

<div class="text-center">
<?php
 // $links ini berasal dari fungsi pagination
 // Jika $links ada (data melebihi jumlah max per page), maka tampilkan
 if (isset($links)) {
 echo $links;
 }
 ?>
</div>

<br><br><br>
<?php $this->load->view("template/footer"); ?>
