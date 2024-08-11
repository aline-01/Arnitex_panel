<?php include("includes/layouts/header.blade.php") ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/layouts/contanier.blade.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<?php  if (!empty(session("message_send_to_admin"))) {
    ?>
      <script>
      Swal.fire({
        icon: "success",
        // title: "خطا",
        text: "<?php echo session("message_send_to_admin"); ?>",
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
            <h1>ویرایشگر متن</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">ویرایشگر متن</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <!-- <h3 class="card-title">
                CKEditor5
                <small>پیشرفته به همراه همه امکانات</small>
              </h3> -->
              <!-- tools box -->
              <div class="card-tools">
                <!-- <button type="button" class="btn btn-tool btn-sm"
                        data-widget="collapse"
                        data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-sm"
                        data-widget="remove"
                        data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i>
                </button>
              </div> -->
              <!-- /. tools -->
            </div>
          <!-- /.card -->

            <div class="card-header">
              <h3 class="card-title">
                <!-- <small>ساده و سریع</small> -->
                <!-- tools box -->
              </h3>
              <form action="/message/send message for manager" method="POST">
                @csrf
                <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>  
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea name="text" class="textarea" placeholder="لطفا متن خود را وارد کنید"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <!-- <p class="text-sm mb-0">
                مشاهده <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">مستندات و توضیحات این ویرایشگر</a>
              </p> -->
            </div>
            <button class="btn" name="submit" style="font-size:18px;">ارسال پیام</button>
          </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
<?php include("includes/layouts/footer.blade.php"); ?>