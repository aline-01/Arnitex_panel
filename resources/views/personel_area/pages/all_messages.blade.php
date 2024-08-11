<?php include("includes/layouts/header.blade.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("includes/layouts/contanier.blade.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ایمیل ها</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">ایمیل‌ها</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block mb-3">ایجاد ایمیل جدید</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">پوشه‌ها</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="#" class="nav-link">
                    <i class="fa fa-inbox"></i> اینباکس
                    <span class="badge bg-primary float-left">12</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-envelope-o"></i> ارسال شده
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-file-text-o"></i> پیش نویس
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-filter"></i> هرزنامه
                    <span class="badge bg-warning float-left">65</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-trash-o"></i> سطل زباله
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /. box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">برچشب‌ها</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-circle-o text-danger"></i>
                    مهم
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-circle-o text-warning"></i> شخصی
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fa fa-circle-o text-primary"></i>
                    شبکه اجتماعی
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">اینباکس</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="جستجو ایمیل">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fa fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="float-left">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                <?php foreach($all_message as $message) { ?>
                  <?php $who_send = DB::table("personel")->where("id",$message->personel_id)->get(); ?>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html"><?php echo $who_send[0]->name ?></a></td>
                    <td class="mailbox-subject"><?php echo $message->content; ?>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><a href="/message/replay message/<?php echo $message->id ?>">پاسخ</a></td>
                  </tr>
                  <?php } ?>
                  <!-- <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">28 دقیقه قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">11 ساعت قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">15 ساعت قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">دیروز</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">2 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">2 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">2 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">2 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">2 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">4 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">12 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">12 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">14 روز قبل</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">وبسایت راکت</a></td>
                    <td class="mailbox-subject"><b>اعلان وبسایت</b> - لورم ایپسوم متن ساختگی برای استفاده طراحان گرافیک است.
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">15 روز قبل</td>
                  </tr> -->
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="float-left">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    })

    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').iCheck('uncheck')
        $('.fa', this).removeClass('fa-check-square-o').addClass('fa-square-o')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').iCheck('check')
        $('.fa', this).removeClass('fa-square-o').addClass('fa-check-square-o')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
