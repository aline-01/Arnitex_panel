<?php include("includes/layouts/header.blade.php") ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/admin_layout/container.blade.php"); ?>
  <?php //use DB; ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php  if (!empty(session("file_has_deleted"))) {
    ?>
      <script>
      Swal.fire({
        icon: "success",
        // title: "خطا",
        text: "<?php echo session("file_has_deleted"); ?>",
      // footer: '<a href="#">Why do I have this issue?</a>'
      }); 
      </script>
    
  <?php } ?>


<?php  if (!empty(session("error_upload_file"))) {
    ?>
      <script>
      Swal.fire({
        icon: "error",
        // title: "خطا",
        text: "<?php echo session("error_upload_file"); ?>",
      // footer: '<a href="#">Why do I have this issue?</a>'
      }); 
      </script>
    
  <?php } ?>
  <?php  if (!empty(session("file_uploaded_msg"))) {
    ?>
      <script>
      Swal.fire({
        icon: "success",
        // title: "خطا",
        text: "<?php echo session("file_uploaded_msg"); ?>",
      // footer: '<a href="#">Why do I have this issue?</a>'
      }); 
      </script>
    
  <?php } ?>

<?php if ($errors->any()) { ?>
<script>
  Swal.fire({
    icon: "error",
    title: "خطا",
    text: "<?php echo $errors->all()[0] ?>",
    // footer: '<a href="#">Why do I have this issue?</a>'
  }); 
  </script>
<?php } ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تمام فایل های کاربران</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">تمام فایل ها</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام فایل</th>
      <th scope="col">فرستنده</th>
      <th scope="col">دانلود</th>
      <th scope="col">دانلود</th>

    </tr>
  </thead>
  <tbody>
      <?php foreach($all_file as $file) { ?>
    <tr>
        <?php $who_send = DB::table("personel")->where("id",$file->personel_id)->get(); ?>
      <th scope="row">1</th>
      <td><?php echo $file["name"] ?></td>
      <td><?php echo $who_send[0]->name ?></td>
      <td><a href="/<?php echo $file["path"]; ?>" class="btn btn-success">دانلود</a></td>
      <td><a href="/admin area/files/delete file/<?php echo $file->id; ?>" class="btn btn-danger">حذف</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
<?php include("includes/layouts/footer.blade.php"); ?>