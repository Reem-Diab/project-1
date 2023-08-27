@extends('cms.parent')

@section('title', 'Create a new country')
@section('main-title', 'Create a new country')
@section('sub-title', 'Create a new country')

@section('styles')
    
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">ADD NEW COUNTRY</h3>
              </div>
              <div class="card-body">
                <input class="form-control form-control-lg" type="text"  name="country_name" id="country_name" placeholder="Enter Country">
                <br>
                <input class="form-control" type="text" name="code"  id="code" placeholder="Enter Code">
                <br>

              </div>
              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Stor</button>
                <a href="{{ route('countries.index') }}" class="btn btn-primary">Go to Index</a>
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


@endsection

@section('scripts')
    <script>
      function performStore() {
        let formData = new FormData() ;
        formData.append('country_name' , document.getElementById('country_name').value) ;
        formData.append('code' , document.getElementById('code').value) ;
        store('/cms/admin/countries' , formData);

      }
    </script>
@endsection


