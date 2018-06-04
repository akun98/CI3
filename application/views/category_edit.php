<!doctype html>
<html lang="en">
<head>
  <base href="<?=base_url()?>">
  <meta charset="UTF-8">
  <title>Adit Blog</title>
  <link rel="stylesheet" href="css/style.css"> 
  <link rel="stylesheet" media="all" href="<?php echo base_url()?>assets/css/bootstrap.min.css" type="text/css">
  <script src="<?php echo base_url()?>assets/css/bootstrap.js" type="text/javascript"></script>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url()?>category">My Category</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="web">Home</a></li>
            <li><a href="web">About</a></li>
            <li class="active"><a href="v_blog">Blog</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>

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
</body>
</html>