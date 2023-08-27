@extends('cms.parent')

@section('title', 'Edit The Information')
@section('main-title', 'Edit The Information')
@section('sub-title', 'Edit The Information')

@section('styles')
    
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!-- right column -->
          <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit The Information</h3>
              </div>
              <div class="card-body">
                <input class="form-control form-control-lg" type="text" value="{{ $countries->country_name }}" name="country_name" id="country_name" placeholder="Enter Country">
                <br>
                <input class="form-control" type="text" name="code" value="{{ $countries->code }}" id="code" placeholder="Enter Code">
                <br>

              </div>
              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $countries->id }})" class="btn btn-primary">Update</button>
                <a href="{{ route('countries.index') }}" button type="submit" class="btn btn-primary">Go to Index</a>
              </div>
              <!-- /.card-body -->
            </div>
        
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</body>
</html>

@endsection

@section('scripts')
<script>
  function performUpdate(id) {
    let formData = new FormData() ;
    formData.append('country_name' , document.getElementById('country_name').value) ;
    formData.append('code' , document.getElementById('code').value) ;
    storeRoute('/cms/admin/countries-update/' + id , formData);
    
  }
</script>
   
@endsection