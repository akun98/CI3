<?php if (!$this->session->userdata('logged_in')) {
  redirect('ctr_user/login');
} ?>

<?php $this->load->view("template/header"); ?>
    <br><br><br>

    <div class="content-wrapper">
    <div class="container-fluid">
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tabel Category</div>

 <!--<div class="container">-->
  <a href="category/tambah" class="btn btn-primary">Add category</a>
      <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td> Id Category </td>
                  <td> Name Category</td>
                  <td> Description Category</td>
                  <td> Tanggal Category</td>
                  <td> Aksi</td>
                </tr>
              </thead>

              <tbody>
                <?php foreach($topik as $key) : ?>
                <tr>
                  <td><?php echo $key->cat_id; ?></td>
                    <td><?php echo $key->cat_name; ?></td>
                    <td><?php echo $key->cat_description; ?></td>
                    <td><?php echo $key->date_created; ?></td>
                    <td><a href='category/edit/<?php echo $key->cat_id?>' class='btn btn-sm btn-info'>Edit</a>
                      <a href='category/delete/<?php echo $key->cat_id?>' class='btn btn-sm btn-danger'>HAPUS</a></td>
                  </tr>
                 <?php endforeach; ?>
              </tbody>

            </table>
          </div>
        </div> 

        <br>
        <br>      
<?php $this->load->view("template/footer"); ?>