<?php include("includes/layouts/header.blade.php"); ?>
<!-- Sidebar -->
<?php include("includes/layouts/contanier.blade.php"); ?>
  <?php 
    if (!empty(session("personel_delete"))) {
    ?>
      <script>
      Swal.fire({
        icon: "error",
        // title: "خطا",
        text: "<?php echo session("personel_delete"); ?>",
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
          <table class="table">
<thead class="thead-dark">
<tr>
  <!-- <th scope="col">#</th> -->
  <th scope="col">عنوان</th>
  <th scope="col">فایل</th>
  <th scope="col">وضعیت</th>
  <th scope="col">ارسال بازخورد</th>
</tr>
</thead>
<tbody>
<?php foreach($all_task as $task) { ?>
<tr>
  <!-- <th scope="row">1</th> -->
  <td><?php echo $task->title; ?></td>
  <td>دانلود</td>
  <td><?php echo $task->descryption; ?></td>
  <td>ارسال بازخورد</td>
</tr>
<?php } ?>
<!-- <tr>
  <th scope="row">2</th>
  <td>Jacob</td>
  <td>Thornton</td>
  <td>@fat</td>

  <td>              <textarea name="text" class="textarea" placeholder="لطفا متن خود را وارد کنید"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
  </td>
</tr> -->
<!-- <tr>
  <th scope="row">3</th>
  <td>Larry</td>
  <td>the Bird</td>
  <td>@twitter</td>

  <td>              <textarea name="text" class="textarea" placeholder="لطفا متن خود را وارد کنید"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
  </td>
</tr> -->
</tbody>
</table>

              </div>
            </div>
            <!-- /.card -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
