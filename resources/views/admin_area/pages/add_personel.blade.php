<?php include("includes/layouts/header.blade.php"); ?>
  <!-- Main Sidebar Container -->
  <?php include("includes/admin_layout/container.blade.php"); ?>
  <?php if ($errors->any()) { ?>
  <?php  ?>
  <?php //foreach($errors->all() as $err) { ?>
<script>
  Swal.fire({
  icon: "error",
  title: "خطا",
  text: "<?php echo $errors->all()[0] ?>",
  // footer: '<a href="#">Why do I have this issue?</a>'
});
<?php //} ?>
<?php } ?>
</script>
<?php if (!empty(session("perosnel_added"))) { ?>
  <script>
  Swal.fire({
    icon: "error",
    title: "خطا",
    text: "<?php echo session("perosnel_added"); ?>",
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
            <h1>اضافه کردن کاربران</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">اضافه کردن کاربران</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">کتابخانه Select2</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="/admin area/personel/add personel" method="POST">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>نام</label>
                  <input type="text" name="name" class="form-control select2">
                  <!-- <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">مازندران</option>
                    <option>شیراز</option>
                    <option>گلستان</option>
                    <option>اردبیل</option>
                    <option>خوزستان</option>
                    <option>سیستان و بلوچستان</option>
                    <option>مشهد</option>
                  </select> -->
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Personel code</label>
                  <input type="text" name="personel_code" class="form-control select2">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                <label>موقعیت شغلی</label>
                  <select class="form-control select2" name="position"  multiple="multiple" data-placeholder="یک استان انتخاب کنید"
                          style="width: 100%;text-align: right">
                          <option value="توسعه دهنده">توسعه دهنده</option>
                          <option value="طراح">طراح</option>
                          <option value="تریدر">تریدر</option>
                          <option value="مشاور">مشاور</option>
                  </select>
                </div>
                <!-- /.form-group -->
                <!-- <div class="form-group">
                  <label>نتیجه غیرفعال</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">مازندران</option>
                    <option>شیراز</option>
                    <option disabled="disabled">گلستان (غیرفعال)</option>
                    <option>اردبیل</option>
                    <option>خوزستان</option>
                    <option>سیستان و بلوچستان</option>
                    <option>مشهد</option>
                  </select>
                </div> -->
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        <button class="form-control select2" name="submit">ارسال</button>  
        </form>
          <div class="card-footer">
            برای کسب اطلاعات بیشتر و استفاده از راهنمای این کتابخانه به <a href="https://select2.github.io/">مستندات</a> مراجعه کنید
          </div>
        </div>
        <!-- /.card -->

        <!-- <div class="row">
          <div class="col-md-6">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">قالب آماده ورودی</h3>
              </div>
              <div class="card-body"> -->
                <!-- Date dd/mm/yyyy -->
                <!-- <div class="form-group">
                  <label>قالب تاریخ :</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control ltr" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  </div> -->
                  <!-- /.input group -->
                <!-- </div> -->
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <!-- <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control ltr" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                  </div> -->
                  <!-- /.input group -->
                <!-- </div> -->
                <!-- /.form group -->

                <!-- phone mask -->
                <!-- <div class="form-group">
                  <label>قالب شماره تلفن:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control ltr" data-inputmask='"mask": "99-9999-9999"' data-mask>
                  </div> -->
                  <!-- /.input group -->
                <!-- </div> -->
                <!-- /.form group -->

                <!-- phone mask -->
                <!-- <div class="form-group">
                  <label>قالب شماره همراه:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control"
                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                  </div> -->
                  <!-- /.input group -->
                <!-- </div> -->
                <!-- /.form group -->

                <!-- IP mask -->
                <!-- <div class="form-group">
                  <label>قالب آی پی:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-laptop"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                  </div> -->
                  <!-- /.input group -->
                <!-- </div> -->
                <!-- /.form group -->

              <!-- </div> -->
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->

            <!-- <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">رنگ و زمان</h3>
              </div>
              <div class="card-body"> -->
                <!-- Color Picker -->
                <!-- <div class="form-group">
                  <label>انتخاب رنگ :</label>
                  <input type="text" class="form-control my-colorpicker1">
                </div> -->
                <!-- /.form group -->

                <!-- Color Picker -->
                <!-- <div class="form-group">
                  <label>انتخاب رنگ با دکمه :</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-square"></i></span>
                    </div>
                  </div> -->
                  <!-- /.input group -->
                <!-- </div> -->
                <!-- /.form group -->

                <!-- time Picker -->
                <!-- <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>انتخاب زمان :</label>

                    <div class="input-group">
                      <input type="text" class="form-control timepicker">

                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                      </div>
                    </div> -->
                    <!-- /.input group -->
                  <!-- </div> -->
                  <!-- /.form group -->
                <!-- </div> -->
              <!-- </div> -->
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->

          <!-- </div> -->
          <!-- /.col (left) -->
          <!-- <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">انتخاب تاریخ </h3>
              </div>
              <div class="card-body"> -->
                <!-- Date range -->
                <!-- <div class="form-group">
                  <label>انتخاب تاریخ:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input class="normal-example form-control" />
                  </div> -->
                  <!-- /.input group -->
                <!-- </div> -->
                <!-- /.form group -->

              <!-- </div> -->
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                <p>استفاده از کتابخانه باباخانی، برای تغییرات <a href="http://babakhani.github.io/PersianWebToolkit/doc/datepicker/">مستندات این کتابخانه</a> را مشاهده کنید </p>
              </div>
            </div> -->
            <!-- /.card -->

            <!-- iCheck -->
            <!-- <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">iCheck - چک‌باکس و رادیو</h3>
              </div>
              <div class="card-body"> -->
                <!-- Minimal style -->

                <!-- checkbox -->
                <!-- <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal" checked>
                  </label>
                  <label>
                    <input type="checkbox" class="minimal">
                  </label>
                  <label>
                    <input type="checkbox" class="minimal" disabled>
                    نمونه چک باکس
                  </label>
                </div> -->

                <!-- radio -->
                <!-- <div class="form-group">
                  <label>
                    <input type="radio" name="r1" class="minimal" checked>
                  </label>
                  <label>
                    <input type="radio" name="r1" class="minimal">
                  </label>
                  <label>
                    <input type="radio" name="r1" class="minimal" disabled>
                    نمونه رادیو
                  </label>
                </div> -->

                <!-- Minimal red style -->

                <!-- checkbox -->
                <!-- <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal-red" checked>
                  </label>
                  <label>
                    <input type="checkbox" class="minimal-red">
                  </label>
                  <label>
                    <input type="checkbox" class="minimal-red" disabled>
                    قالب قرمز چک باکس
                  </label>
                </div> -->

                <!-- radio -->
                <!-- <div class="form-group">
                  <label>
                    <input type="radio" name="r2" class="minimal-red" checked>
                  </label>
                  <label>
                    <input type="radio" name="r2" class="minimal-red">
                  </label>
                  <label>
                    <input type="radio" name="r2" class="minimal-red" disabled>
                    قالب قرمز رادیو
                  </label>
                </div> -->

                <!-- Minimal red style -->

                <!-- checkbox -->
                <!-- <div class="form-group">
                  <label>
                    <input type="checkbox" class="flat-red" checked>
                  </label>
                  <label>
                    <input type="checkbox" class="flat-red">
                  </label>
                  <label>
                    <input type="checkbox" class="flat-red" disabled>
                    قالب فلت سبز چک باکس
                  </label>
                </div> -->

                <!-- radio -->
                <!-- <div class="form-group">
                  <label>
                    <input type="radio" name="r3" class="flat-red" checked>
                  </label>
                  <label>
                    <input type="radio" name="r3" class="flat-red">
                  </label>
                  <label>
                    <input type="radio" name="r3" class="flat-red" disabled>
                    قالب فلت سبز رادیو
                  </label>
                </div>
              </div> -->
              <!-- /.card-body -->
              <!-- <div class="card-footer">
                و چندین رنگ و مدل دیگر <a href="http://fronteed.com/iCheck/">مستندات کتاب خانه</a>
              </div>
            </div> -->
            <!-- /.card -->
          <!-- </div> -->
          <!-- /.col (right) -->
        <!-- </div> -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("includes/layouts/footer.blade.php"); ?>