<?php if (!$this->session->userdata('logged_in')) {
  redirect('ctr_user/login');
} ?>

<?php $this->load->view("template/header"); ?>
    <br><br><br>
    <h1 class="text-center">FORM UPDATE KATEGORI</h1>
    <br><br>

 <div class="container">
  <form method="post" class="form-horizontal" enctype="multipart/form-data">
      <table>
        <tr>
          <td><font color="black">Nama Category</font></td>
          <td>:</td>
          <td><input type="text" name="cat_name" value="<?php echo set_value('cat_name', $default->cat_name); ?>"></td>
        </tr>
        <tr>
          <td><font color="black">Description Category</font></td>
          <td>:</td>
          <td><input type="text" name="cat_description" value="<?php echo set_value('cat_description', $default->cat_description); ?>" ></td>
        </tr>
        <tr>
          <td><font color="black">Tanggal Category</font> </td>
          <td>:</td>
          <td><input type="date" name="date_created" value="<?php echo set_value('date_created', $default->date_created) ?>"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="simpan" value="Edit"></td>
        </tr>
      </table>
  </div>
  <br><br><br>
<?php $this->load->view("template/footer"); ?>