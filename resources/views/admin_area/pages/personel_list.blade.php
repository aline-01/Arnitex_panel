<?php include("includes/layouts/header.blade.php"); ?>
<!-- Sidebar -->
  <?php include("includes/admin_layout/container.blade.php"); ?>
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
  <th scope="col">#</th>
  <th scope="col">نام</th>
  <th scope="col">موقعیت</th>
  <th scope="col">شماره تماس</th>
  <th scope="col">عملیات</th>
</tr>
</thead>
<tbody>
<?php $id = 1; ?>
<?php foreach($personel_list as $personel) { ?>
<tr>
  <th scope="row"><?php echo $id; ?></th>
  <td><?php echo $personel->name; ?></td>
  <td><?php echo $personel->position; ?></td>
  <td><?php echo "09197508922"; ?></td>
  <td>
  <a type="button" href="/admin area/personel/delete personel/<?php echo $personel->id; ?>" class="btn btn-danger">حذف</a>
  <button type="button" class="btn btn-warning">ویرایش اطلاعات</button>
  </td>
</tr>
<?php $id+=1; ?>
<?php } ?>
<!-- <tr>
  <th scope="row">2</th>
  <td>Jacob</td>
  <td>Thornton</td>
  <td>@fat</td>
</tr>
<tr>
  <th scope="row">3</th>
  <td>Larry</td>
  <td>the Bird</td>
  <td>@twitter</td>
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
