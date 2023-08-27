@extends('cms.parent')

@section('title', 'Show Information')
@section('main-title', 'Show Information')
@section('sub-title', 'Show Information')

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
                <input class="form-control form-control-lg" disabled type="text" value="{{ $countries->country_name }}" name="country_name" id="country_name" placeholder="Enter Country">
                <br>
                <input class="form-control" type="text" disabled name="code" value="{{ $countries->code }}" id="code" placeholder="Enter Code">
                <br>

              </div>
              <div class="card-footer">
            
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
    
@endsection