<!DOCTYPE html>
<html>
<head>
    <title>Your Laravel View</title>
</head>
<body>
<div class="alert alert-danger">
            {{ session('access_token') }}
        </div>
        <p></p><br>

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
</body>
</html>