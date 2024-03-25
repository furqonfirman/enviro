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
                <h3 class="card-title">Add Detail Worker Form</h3>
              </div>
              @if(isset($responseData))
              <div class="alert alert-danger">{{ $responseData }}</div>
              @elseif(isset($errorMessage))
                  <div class="alert alert-danger">{{ $errorMessage }}</div>
              @endif

              <!-- form start -->
              <form action="{{ url ('insert-detail-worker') }}" method="POST" class="form-horizontal">
              @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                     <input type="text" name="namaLengkap" id="namaLengkap"  class="form-control" placeholder="Fullname" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                     <input type="text" name="noTelp" id="noTelp" class="form-control" placeholder="Phone Number" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                     <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Address" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
                  <a href="javascript:history.back()">Cancel</a>
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

