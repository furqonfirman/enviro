@include('_layout.header')
  @include('_layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Data</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              {{ session('access_token') }}
                <table id="client" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>no</th>
                    <th>id</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>action</th> 
                  </tr>
                  @php $no = 1; @endphp
                  @foreach(json_decode($body, true) as $value)
                  <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $value['id'] }}</td>   
                      <td>{{ $value['namaPerusahaan'] }}</td>  
                      <td>{{ $value['alamat'] }}</td>
                      <td>{{ $value['noTelp'] }}</td>
                      <td>{{ $value['user']['id'] }}</td>
                      <td>{{ $value['user']['email'] }}</td>
                      <td>{{ $value['user']['role'] }}</td>
                      <td><a class="btn btn-info"  href="#"/>Edit</a>
                          <a class="btn btn-danger"  href="#"
                          onclick="return confirm('Yakin di Hapus?')"/>Delete</a>
                          <a class="btn btn-primary"  href="{{ route('post_detail_client') }}"/>Detail</a>
                      </td>
                  </tr>
                  @endforeach
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
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
  <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if(session('error'))
      {{
        session('error')
      }}
      @endif
      @if(session('success'))
      {{
        session('message')
      }}
      @endif
        <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                    <div class="input-group mb-3">
                      <input name="password" type="password" value="" class="form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <span class="input-group-text" onclick="password_show_hide();">
                          <i class="fas fa-eye" id="show_eye"></i>
                          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="form-control" style="width: 100%;">
                      <option>CLIENT</option>
                      <option>ADMIN</option>
                      <option>WORKER</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
      </div>
    </div>
  </div>
</div>
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
