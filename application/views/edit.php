<?php $this->load->view("template/header"); ?>

    <br><br><br>

<div class="container">
      <?php foreach ($data as $key): ?>
      <?php echo form_open('v_blog/edit/'.$key->id_blog, array('enctype'=>'multipart/form-data')); ?>
      <table>
        <tr>
          <td>ID_BLOG</td>
          <td>:</td>
          <td><input type="text" name="id_blog" readonly value="<?php echo $key->id_blog; ?>"></td>
        </tr>
        <tr>
          <td>JUDUL</td>
          <td>:</td>
          <td><input type="text" name="judul_blog" value="<?php echo $key->judul_blog; ?>"></td>
        </tr>
        <tr>
          <td>KONTEN</td>
          <td>:</td>
          <td><input type="text" name="konten" value="<?php echo $key->konten; ?>"></td>
        </tr>
        <tr>
          <td>Tanggal </td>
          <td>:</td>
          <td><input type="text" name="input_tanggal" value=""></td>
        </tr> 
        <tr>
          <td>PENULIS</td>
          <td>:</td>
          <td><input type="text" name="email" value="<?php echo $key->email; ?>"></td>
        </tr>
        <tr>
          <td>EMAIL</td>
          <td>:</td>
          <td><input type="text" name="email" value="<?php echo $key->email; ?>"></td>
        </tr>
        <tr>
          <td>GENRE</td>
          <td>:</td>
          <td><input type="text" name="genre" value="<?php echo $key->genre; ?>"></td>
        </tr>
        <tr>
          <td>Gambar</td>
          <td>:</td>
          <td><input type="file" name="gambar_blog"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="edit" value="Edit" class="btn btn-primary"></td>
        </tr>
      </table>
      <?php endforeach ?>
    </div>
      
      </table>
    </div>
    </form>
  </div>
<?php $this->load->view("template/footer"); ?>