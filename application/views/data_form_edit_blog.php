<?php if (!$this->session->userdata('logged_in')) {
  redirect('ctr_user/login');
} ?>

<?php $this->load->view("template/header"); ?>

      <br>
      <br>
      <h1 class="text-center">FORM UPDATE BLOG</h1>
      <br>
      <br>

 <div class="container">
    <?php echo validation_errors(); ?>
      <?php echo form_open('v_blog/edit', array('enctype'=>'multipart/form-data')); ?>
      <table>
      <tr>
          <label>Kategori</label>
            <select name="cat_id" class="form-control" required>
              <option value="">Pilih Kategori</option>
              <?php foreach($kategori as $kategori): ?>
              <option value="<?php echo $kategori->cat_id; ?>"><?php echo $kategori->cat_name; ?></option>
              <?php endforeach; ?>
            </select>
        </tr>
        <tr>
          <td>Judul</td>
          <td>:</td>
          <td><input type="text" name="judul_blog" value="<?=isset($default['judul_blog'])? $default['judul_blog'] : ""?>"></td>
        </tr>
        <tr>
          <td>Content</td>
          <td>:</td>
          <td><input type="text" name="konten" value="<?=isset($default['konten'])? $default['konten'] : ""?>"></td>
        </tr>
        <tr>
          <td>Tanggal </td>
          <td>:</td>
          <td><input type="date" name="tanggal_blog" value="<?=isset($default['tanggal_blog'])? $default['tanggal_blog'] : ""?>"></td>
        </tr>
        <tr>
          <td>Penulis </td>
          <td>:</td>
          <td><input type="text" name="penulis" value="<?=isset($default['penulis'])? $default['penulis'] : ""?>"></td>
        </tr>
        <tr>
          <td>Email </td>
          <td>:</td>
          <td><input type="text" name="email" value="<?=isset($default['email'])? $default['email'] : ""?>"></td>
        </tr>
        <tr>
          <td>Genre </td>
          <td>:</td>
          <td><input type="text" name="genre" value="<?=isset($default['genre'])? $default['genre'] : ""?>"></td>
        </tr>
        <tr>
          <td>Gambar</td>
          <td>:</td>
          <td><input type="file" name="gambar_blog" value="<?php echo set_value('gambar_blog') ?>"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="simpan" value="simpan"></td>
        </tr>
      </table>
    </div>
    </form>
  </div>

  <br>
  <br>

<?php $this->load->view("template/footer"); ?>