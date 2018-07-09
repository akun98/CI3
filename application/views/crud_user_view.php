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
          <i class="fa fa-table"></i> Data Tabel User</div>

 <!--<div class="container">-->
      <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td> Id User </td>
                  <td> Nama</td>
                  <td> Username</td>
                  <td> Register Date</td>
                </tr>
              </thead>

              <tbody>
                <?php foreach($pengguna as $key) : ?>
                <tr>
                  <td><?php echo $key->user_id; ?></td>
                    <td><?php echo $key->nama; ?></td>
                    <td><?php echo $key->username; ?></td>
                    <td><?php echo $key->register_date; ?></td>
                    <td><a href='crud_user/edit/<?php echo $key->user_id?>' class='btn btn-sm btn-info'>Edit</a>
                      <a href='crud_user/delete/<?php echo $key->user_id?>' class='btn btn-sm btn-danger'>HAPUS</a></td>
                  </tr>
                 <?php endforeach; ?>
              </tbody>

            </table>
          </div>
        </div> 

        <br>
        <br>      
<?php $this->load->view("template/footer"); ?>