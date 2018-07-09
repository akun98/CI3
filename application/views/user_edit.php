<?php if (!$this->session->userdata('logged_in')) {
  redirect('ctr_user/login');
} ?>

<?php $this->load->view("template/header"); ?>
    <br><br><br>
    <h1 class="text-center">Form Edit User</h1>
    <br><br>

 <div class="container">
  <form method="post" class="form-horizontal" enctype="multipart/form-data">
      <table>
        <tr>
          <td><font color="black">Nama User</font></td>
          <td>:</td>
          <td><input type="text" name="nama" value="<?php echo set_value('nama', $default->nama); ?>"></td>
        </tr>
        <tr>
          <td><font color="black">Username</font></td>
          <td>:</td>
          <td><input type="text" name="username" value="<?php echo set_value('username', $default->username); ?>" ></td>
        </tr>
        <tr>
          <td><font color="black">Tanggal Registrasi</font> </td>
          <td>:</td>
          <td><input type="date" name="register_date" value="<?php echo set_value('register_date', $default->register_date) ?>"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="simpan" value="Edit"></td>
        </tr>
      </table>
  </div>
  <br><br><br>
<?php $this->load->view("template/footer"); ?>