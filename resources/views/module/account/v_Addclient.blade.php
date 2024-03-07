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
              @if(session('success'))
              {{session('message')}}
              @endif
              @if(session('errors'))
              {{session('errors')}}
              @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
              <form action="{{ url ('post_detail_client') }}" method="POST" class="form-horizontal">
              @csrf
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                     <input type="text" name="namaPerusahaan" id="namaPerusahaan" class="form-control" placeholder="Fullname" required="required">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                     <input type="text" name="noTelp" id="noTelp" class="form-control" placeholder="Phone Number" required="required">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                     <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Address" required="required">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save</button>
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