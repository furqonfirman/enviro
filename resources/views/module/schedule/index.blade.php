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
      </div>
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
                    <th>NO</th>
                    <th>Client Name</th>
                    <th>Worker Name</th>
                    <th>Working Type</th>
                    <th>freq</th>
                    <th>freq Type</th>
                    <th>timeStart</th>
                    <th>time End</th>
                    <th>PIC</th>
                    <th>Date Working</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $value)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $value['client']['namaPerusahaan'] }}</td>
                    <td>{{ $value['worker']['namaLengkap'] }}</td>
                    <td>{{ $value['workingType'] }}</td>
                    <td>{{ $value['freq'] }}</td>
                    <td>{{ $value['freqType'] }}</td>
                    <td>{{ $value['timeStart'] }}</td>
                    <td>{{ $value['timeEnd'] }}</td>
                    <td>{{ $value['pic'] }}</td>
                    <td>{{ $value['dateWorking'] }}</td>
                    <td>
                      <a class="btn btn-info"  href="#"/>Edit</a>
                      <a class="btn btn-danger"  href="#" onclick="return confirm('Yakin di Hapus?')"/>Delete</a>
                      <a class="btn btn-primary"  href=""/>Show</a>
                    </td>
                  </tr>
                  @endforeach
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
      <form action="{{ url ('addSchedule') }}" method="POST">
        @csrf
        <div class="card card-default">
          <div class="card-body">
                <div class="form-group">
                  <label>Select Client</label>
                  <select name="namaLengkap" id="Client" class="form group select2" style="width: 100%;">
                    <option selected="selected">Search</option>
                    <option value=""></option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Select WORKER</label>
                  <select name="workerName" id="workerName" class="form group select2" style="width: 100%;">
                      <option selected="selected">Search</option>
                      <option value="">Select Worker</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>startContractPeriod:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" id="startContractPeriod" name="startContractPeriod" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label>endContractPeriod:</label>
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text" id="endContractPeriod" name="endContractPeriod" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label>Treatment Type</label>
                  <select class="select2" id="workingType" name="workingType" multiple="multiple" data-placeholder="Treatment Type" name = "treatment" style="width: 100%;">
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
                  <label for="inputProjectLeader">Freq</label>
                  <input type="text" id="freq" name="freq" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Freq Type</label>
                  <input type="text" id="freqType" name="freqType" class="form-control">
                </div>
                <!-- Date -->
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Time start:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" id="timeStart" name="timeStart" class="form-control datetimepicker-input" data-target="#timepicker"/>
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
                    <label>Time end:</label>

                    <div class="input-group date" id="timepicker2" data-target-input="nearest">
                      <input type="text" id="timeEnd" name="timeEnd" class="form-control datetimepicker-input" data-target="#timepicker2"/>
                      <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="form-group">
                  <label>Select Nama PIC</P></label>
                  <select name="pic" id="pic" class="form group select2" style="width: 100%;">
                    <option selected="selected">Search</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">No Telp PIC</label>
                  <input type="text" name="noTelpPic" id="noTelpPic" class="form-control">
                </div>
                <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" name="dateWorking" id="dateWorking" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="Submit" class="btn btn-primary">Save</button>
                </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- End modal -->
  <!-- /.content-wrapper -->
  @include('_layout.footer')
  <script>
        $(document).ready(function() {
            $('#Client').select2({
              theme: 'bootstrap4'
                ajax: {
                    url: '{{ route("fetch.data") }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                            text: item.namaLengkap
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

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

  $('#reservationdate1').datetimepicker({
        format: 'L'
    });

  $('#reservationdate2').datetimepicker({
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
</script>