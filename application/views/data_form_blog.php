<?php if (!$this->session->userdata('logged_in')) {
  redirect('ctr_user/login');
} ?>

<?php $this->load->view("template/header"); ?>
    <br><br><br>

 <div class="container">
    <?php echo validation_errors(); ?>
      <?php echo form_open('v_blog/add', array('enctype'=>'multipart/form-data')); ?>
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
          <td><input type="text" name="judul_blog" value="<?php echo set_value('judul_blog'); ?>"></td>
        </tr>
        <tr>
          <td>Content</td>
          <td>:</td>
          <td><input type="text" name="konten" value="<?php echo set_value('konten') ?>"></td>
        </tr>
        <tr>
          <td>Tanggal </td>
          <td>:</td>
          <td><input type="date" name="tanggal_blog" value="<?php echo set_value('tanggal_blog') ?>"></td>
        </tr>
        <tr>
          <td>Penulis </td>
          <td>:</td>
          <td><input type="text" name="penulis" value="<?php echo set_value('penulis') ?>"></td>
        </tr>
        <tr>
          <td>Email </td>
          <td>:</td>
          <td><input type="text" name="email" value="<?php echo set_value('email') ?>"></td>
        </tr>
        <tr>
          <td>Genre </td>
          <td>:</td>
          <td><input type="text" name="genre" value="<?php echo set_value('genre') ?>"></td>
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
<br><br><br>
<?php $this->load->view("template/footer"); ?>