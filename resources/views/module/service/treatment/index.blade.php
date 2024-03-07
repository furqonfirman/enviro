@include('_layout.header')
@include('_layout.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 6
                    </td>
                    <td>Win 98+</td>
                    <td>6</td>
                    <td>A</td>
                  </tr>
                  </tbody>
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
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select Customer</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form group select2" style="width: 100%;">
                    <option selected="selected">Select Customer</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                      Customer name
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>Nicole Pearson</b></h2>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{ asset('lte/dist/img/user1-128x128.jpg') }}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- /.form 2 -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Service Treatment</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
                <div class="form-group">
                  <label for="inputProjectLeader">Area</label>
                  <input type="text" id="inputProjectLeader" class="form-control">
                </div>
                <div class="form-group">
                  <label>Treatment Type</label>
                  <select class="select2" multiple="multiple" data-placeholder="Treatment Type" name = "treatment" style="width: 100%;">
                    <option>CF</option>
                    <option>HF</option>
                    <option>S</option>
                    <option>B</option>
                    <option>LV</option>
                    <option>T</option>
                    <option>OT</option>
                    <option>ai</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">ai</label>
                  <input type="text" id="inputProjectLeader" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">REKARKS</label>
                  <input type="text" id="inputProjectLeader" class="form-control">
                </div>
            </div>
        </div>
        <!-- /.form 4 -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Pemakaian Chemical</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
                <div class="form-group">
                  <label for="inputProjectLeader">Bahan Aktif</label>
                  <input type="text" id="inputProjectLeader" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Dosis/Kons</label>
                  <input type="text" id="inputProjectLeader" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Jumlah</label>
                  <input type="text" id="inputProjectLeader" class="form-control">
                </div>
                <div class="form-group">
                <label for="inputDescription">Keterangan</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
            </div>
        </div>
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Tanggal</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
                <div class="form-group">
                  <label for="inputDescription">Rekomendasi untuk pelanggan</label>
                  <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Saran dari pelanggan</label>
                  <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                </div>
                <!-- Date -->
                <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Time in:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#timepicker"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Time out:</label>

                    <div class="input-group date" id="timepicker2" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#timepicker2"/>
                      <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
  <!-- End modal -->
  <!-- /.content-wrapper -->
  @include('_layout.footer')
  <script>
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

  $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

  $('#reservationdate').datetimepicker({
        format: 'L'
    });

  //Timepicker
  $('#timepicker').datetimepicker({
      format: 'LT'
    })

  $('#timepicker2').datetimepicker({
      format: 'LT'
    })

  //Bootstrap Duallistbox
  $('.duallistbox').bootstrapDualListbox()

  $('.select2').select2({
    theme: 'bootstrap4'
  })

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
</script>