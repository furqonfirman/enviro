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
                <h3 class="card-title">Form Add Detail Worker</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url ('insert-detail-client') }}" method="POST" class="form-horizontal">
              @csrf
              @method('PUT')
              foreach($detail as $value)
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                      <input name="id" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" id="email" class="form-control" value="{{ $detail['detailClient']['user']['email'] }}" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                     <input type="text" name="namaPerusahaan" id="namaPerusahaan" class="form-control" value="{{ $detail['detailClient']['namaPerusahaan'] }}" placeholder="Fullname">
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                     <input type="text" name="alamat" id="alamat" value="{{ $detail['detailClient']['alamat'] }}" class="form-control" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                     <input type="text" name="noTelp" id="noTelp" value="{{ $detail['detailClient']['noTelp'] }}" class="form-control" placeholder="Phone Number">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
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
    var x = document.getElementById("password");
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
