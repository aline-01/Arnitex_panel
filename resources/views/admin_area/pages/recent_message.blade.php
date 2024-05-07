<?php include("includes/layouts/header.blade.php") ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/admin_layout/container.blade.php"); ?>
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
                <button type="button" class="btn btn-tool btn-sm"
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
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <form action="/admin area/message/recent message/" class="select_personel_form" method="POST">
              @csrf
              <div class="card-body">
              <div class="mb-3">
              <select name="personel" class="form-select select_personel" aria-label=".form-select-lg example">
                <option value="">نمایش براساس..</option>
                <option value="all">همه</option>
                <?php foreach($all_personel as $personel) { ?>
                  <?php if ($personel->id == request()->session()->get("personel_access")) { 
                      continue;  
                  } ?>
                    <option value="<?php echo $personel->id ?>"><?php echo $personel->name ?></option>
                    <?php } ?>
              </select>
              <!-- <input type="hidden" name="submit"> -->

              </div>
                </form>
              <!-- <p class="text-sm mb-0">مشاهده مستندات مربوط به این ویرایشگر متن <a href="https://ckeditor.com/ckeditor-5-builds/#classic">CKEditor</a> -->
              </p>
            </div>
          </div>
          <!-- /.card -->
          
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
                  ۱-۵۰/۲۰۰
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
                    <td><div class="icheckbox_flat-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html"><?php echo $who_send[0]->name ?></a></td>
                    <td class="mailbox-subject"><p><?php echo $message->content ?><br>                  </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><a href="/rest/imagendery">پاسخ</a></td>
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
                  ۱-۵۰/۲۰۰
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
        
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
<?php include("includes/layouts/footer.blade.php"); ?>