<?php if (!$this->session->userdata('logged_in')) {
  redirect('ctr_user/login');
} ?>

<?php $this->load->view("template/header"); ?>
  
      <?php foreach ($detail as $key): ?>
          <table>
          <tr class="text-center">
            <td>
              <h3><b><?php echo $key->judul_blog; ?></b><h3>
              </td>
          </tr>
          <tr>
            <td class="text-center">
              <img src="../../gambar/<?php echo $key->gambar_blog;?>" alt="Image" width="500" >
            </td>
          </tr>
          <tr>
            <td class="text-center">
              Diupload tanggal : <?php echo $key->tanggal_blog; ?><br><br>
            </td>
          </tr>
          <tr>
            <td class="text-justify">
              <?php echo $key->konten; ?>
            </td>
          </tr>
        </table>
         <?php endforeach ?>

<?php $this->load->view("template/footer"); ?>