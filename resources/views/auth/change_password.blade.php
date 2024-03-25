@include('_layout.header')
  @include('_layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
              <form action="{{ route ('post_detail_client') }}" method="POST" class="form-horizontal">
              @csrf
                  <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                        <div class="input-group mb-3">
                        <input name="oldPassword" type="password" value="" class="form-control" id="oldPassword" placeholder="old password" required="true" aria-describedby="basic-addon1" />
                            <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword">New Password</label>
                        <div class="input-group mb-3">
                        <input name="newPassword" type="password" value="" class="form-control" id="newPassword" placeholder="password" required="true" aria-describedby="basic-addon1" />
                            <span class="input-group-text" onclick="password_show_hide2();">
                            <i class="fas fa-eye" id="show_eye2"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye2"></i>
                            </span>
                      </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Confirm</button>
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  </form>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- Modal -->
  <!-- End modal -->
  <!-- /.content-wrapper -->
  @include('_layout.footer')
<script>
  function password_show_hide() {
    var x = document.getElementById("oldPassword");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
    } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
    }
  }
</script>
<script>
function password_show_hide2() {
    var x = document.getElementById("newPassword");
    var show_eye2 = document.getElementById("show_eye2");
    var hide_eye2 = document.getElementById("hide_eye2");
    hide_eye2.classList.remove("d-none");
    if (x.type === "password") {
      x.type = "text";
      show_eye2.style.display = "none";
      hide_eye2.style.display = "block";
    } else {
      x.type = "password";
      show_eye2.style.display = "block";
      hide_eye2.style.display = "none";
    }
  }
</script>