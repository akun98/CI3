<!doctype html>
<html lang="en">
<head>
  <base href="<?=base_url()?>">
  <meta charset="UTF-8">
  <title>Edit Blog</title>
  <link rel="stylesheet" href="css/style.css"> 
  <link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css">
  <script src="<?php echo base_url()?>assets/css/bootstrap.js" type="text/javascript"></script>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="v_blog">My Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="myweb">Home</a></li>
            <li><a href="myweb/profil">About</a></li>
            <li class="active"><a href="blog">Blog</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>

 <div class="container">
    <?php echo validation_errors(); ?>
      <?php echo form_open('v_blog/edit', array('enctype'=>'multipart/form-data')); ?>
      <table>
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
</body>
</html>