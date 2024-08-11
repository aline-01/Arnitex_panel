<?php include("includes/layouts/header.blade.php") ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include("includes/admin_layout/container.blade.php") ?>
  
  <?php if (!empty(session("message_send"))) { ?>
  <script>
  Swal.fire({
    icon: "success",
  // title: "خطا",
  text: "<?php echo "پیام شما با موفقیت ارسال شد";?>",
  // footer: '<a href="#">Why do I have this issue?</a>'
  }); 
  </script>
<?php } ?>


<?php if (!empty(session("task_added"))) { ?>
  <script>
  Swal.fire({
    icon: "success",
  // title: "خطا",
  text: "<?php echo session("task_added");?>",
  // footer: '<a href="#">Why do I have this issue?</a>'
  }); 
  </script>
<?php } ?>

<?php  if (!empty(session("unable_to_upload_file"))) {
    ?>
      <script>
      Swal.fire({
        icon: "error",
        // title: "خطا",
        text: "<?php echo session("unable_to_upload_file"); ?>",
      // footer: '<a href="#">Why do I have this issue?</a>'
      }); 
      </script>
  <?php } ?>

<?php  if (!empty(session("file_have_been_send"))) {
    ?>
      <script>
      Swal.fire({
        icon: "success",
        // title: "خطا",
        text: "<?php echo session("file_have_been_send"); ?>",
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">داشبورد</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">داشبورد ورژن 2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <!-- Main row -->
        <!-- the dashbord content have been delete for now 
        you see the soruce in  -->

        <!-- <div class="row"> -->
          <!-- Left col -->
          <!-- <section class="col-lg-7 connectedSortable"> -->
            <!-- Custom tabs (Charts with tabs)-->
            <!-- <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">
                  <i class="fa fa-pie-chart mr-1"></i>
                  فروش
                </h3>
                <ul class="nav nav-pills mr-auto p-2">
                  <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">نمودار</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">چارت</a>
                  </li>
                </ul> -->
              <!-- </div>/.card-header -->
              <!-- <div class="card-body">
                <div class="tab-content p-0"> -->
                  <!-- Morris chart - Sales -->
                  <!-- <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                </div> -->
            <!--  </div> /.card-body -->
            <!-- </div> -->
            <!-- /.card -->

            <!-- DIRECT CHAT -->
        
            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  لیست کار
                </h3>
                
                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item">
                      <input type="checkbox" value="" class="select_all" name="personel_id">
                      <span class="text"><?php echo "انتخاب همه "; ?></span>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list">
                <form action="/admin area/tasks/add task" enctype="multipart/form-data" class="personel_message_form" method="POST">
                  @csrf
                <?php foreach($all_personel as $personel) { ?>  
                <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <input type="checkbox" class="personel_btn perosnel_checkbox" value="<?php echo $personel->id ?>" name="personel_<?php echo $personel->id; ?>">
                    <!-- todo text -->
                    <span class="text"><?php echo $personel->name; ?></span>
                    <!-- Emphasis label -->
                    <!-- <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 دقیقه</small> -->
                    <!-- General tools such as edit or delete-->
                    <!-- <div class="tools">
                      <i class="fa fa-edit"></i>
                      <i class="fa fa-trash-o"></i>
                    </div> -->
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <script defer>
                //some script make daynamic form 
                const SELECT_ALL = document.querySelector(".select_all")
                const ALL_PERSONEL = document.querySelectorAll(".personel_btn")
                SELECT_ALL.addEventListener("click",(select_all)=> {
                  if (SELECT_ALL.checked) {
                    ALL_PERSONEL.forEach((input)=> {
                      input.checked = "true"
                    })
                  }else {
                    //this section issen't work 
                    //you need to fix this later
                    ALL_PERSONEL.forEach((input)=> {
                      input.setAttribute('checked', 'false');
                      
                    })
                    //this section --------------------------
                  }
                  
                },false)
              </script>
              
              <!-- <div class="card-footer clearfix">
                <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> جدید</button>
              </div> -->
            </div>
            <!-- /.card-body -->
            <!-- /.card -->
          </section>
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <!-- <small>ساده و سریع</small> -->
                <!-- tools box -->
              </h3>
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
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>عنوان:</label>
                  <input type="text" name="title" class="form-control select2">
              <br>
              <div class="col-md-12">
                <div class="form-group">
                  <label>فایل زمیمه (اختیاری):</label>
                  <input type="file" name="task_file" class="form-control select2">

              <div class="card-body pad">
              
              <div class="mb-3">
                <textarea name="descryption" class="textarea" placeholder="لطفا متن خود را وارد کنید"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

                </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
              </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <input type="hidden" name="all_personel_data" class="all_personel_data" id="">
          <!-- /.card-body -->
          <button class="form-control select2" name="submit">ارسال</button>  
                <script>
                  //this script is so important 
                  //don't tuched 
                  const PEROSNEL_CHECKBOX = document.querySelectorAll(".perosnel_checkbox")
                  const SUBMIT_BTN = document.querySelector(".submit_btn")
                  const FORM = document.querySelector(".personel_message_form");
                  const TAG_LIST = document.querySelector(".all_personel_data");

                  FORM.addEventListener("submit",(form_submited)=>{
                    var all_personel_list_data = []
                    PEROSNEL_CHECKBOX.forEach((input)=>{
                      if (input.checked) {
                        all_personel_list_data.push(input.value);
                      }else {
                        // do nothing
                      }
                    })
                    console.log(all_personel_list_data)
                    TAG_LIST.value = all_personel_list_data
                    
                  },false)
                </script>
        </form>
            <!-- <button class="btn btn-primary" 
                type="button" data-bs-toggle="modal"
                data-bs-target="#uploadModal">Upload</button>
                 -->
                  <!-- <p class="text-sm mb-0">
                مشاهده <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">مستندات و توضیحات این ویرایشگر</a>
              </p> -->
            </div>
        </div>
      </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>

                  

          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <!-- <section class="col-lg-5 connectedSortable"> -->

            <!-- Map card -->
            <!-- <div class="card bg-primary-gradient">
              <div class="card-header no-border">
                <h3 class="card-title">
                  <i class="fa fa-map-marker mr-1"></i>
                  بازدید‌ها
                </h3> -->
                <!-- card tools -->
                <!-- <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="fa fa-calendar"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                </div> -->
                <!-- /.card-tools -->
              <!-- </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div> -->
              <!-- /.card-body-->
              <!-- <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">بازدید‌ها</div>
                  </div> -->
                  <!-- ./col -->
                  <!-- <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">آنلاین</div>
                  </div> -->
                  <!-- ./col -->
                  <!-- <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">فروش</div>
                  </div> -->
                  <!-- ./col -->
                <!-- </div> -->
                <!-- /.row -->
              <!-- </div>
            </div> -->
            <!-- /.card -->

            <!-- solid sales graph -->
            <!-- <div class="card bg-info-gradient">
              <div class="card-header no-border">
                <h3 class="card-title">
                  <i class="fa fa-th mr-1"></i>
                  نمودار فروش
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
              </div> -->
              <!-- /.card-body -->
              <!-- <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">سفارش ایمیلی</div>
                  </div> -->
                  <!-- ./col -->
                  <!-- <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">سفارش آنلاین</div>
                  </div> -->
                  <!-- ./col -->
                  <!-- <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">سفارش فیزیکی</div>
                  </div> -->
                  <!-- ./col -->
                <!-- </div> -->
                <!-- /.row -->
              <!-- </div> -->
              <!-- /.card-footer -->
            <!-- </div> -->
            <!-- /.card -->

            <!-- Calendar -->
            <!-- <div class="card bg-success-gradient">
              <div class="card-header no-border">

                <h3 class="card-title">
                  <i class="fa fa-calendar"></i>
                  تقویم
                </h3> -->
                <!-- tools card -->
                <!-- <div class="card-tools"> -->
                  <!-- button with a dropdown -->
                  <!-- <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="#" class="dropdown-item">رویداد تازه</a>
                      <a href="#" class="dropdown-item">حذف رویدادها</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">نمایش تقویم</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div> -->
                <!-- /. tools -->
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- <div class="card-body p-0"> -->
                <!--The calendar -->
                <!-- <div id="calendar" style="width: 100%"></div> -->
              <!-- </div> -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include("includes/layouts/footer.blade.php"); ?>
