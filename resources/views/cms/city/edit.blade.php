@extends('cms.parent')

@section('title' , 'edit City')
@section('main-title' , 'edit City')
@section('sub-title' , 'edit City')


@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit New City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label selectes>{{ $cities->country->country_name }}</label>

                        <select class="form-control select2" id="country_id" name="country_id" style="width: 100%;">
                            <option>Choose Country</option>

                            @foreach ($countries as $country)
                                  {{-- <option value="{{ $country->id ?? ""}}">{{ $country->country_name ?? ""}}</option> --}}

                                  <option @if ($country->id == $cities->country_id) selected @endif value="{{ $country->id}}">
                                    {{ $country->country_name }} </option>
                            @endforeach

                        </select>
                      </div>

                    </div>

                  <div class="col-md-4">

                <div class="form-group">
                  <label for="name">City Name</label>
                  <input type="text" class="form-control" id="name" name="name" 
                  value="{{ $cities->name }}" placeholder="Enter Name of City">
                </div>
                </div>

                <div class="col-md-4">


                   <div class="form-group">
                  <label for="street">Street</label>
                  <input type="text" class="form-control" id="street" name="street"  
                  value="{{ $cities->street }}" placeholder="Enter Street of City">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $cities->id }})" class="btn btn-primary">Update</button>

                <a href="{{ route('cities.index')}}" type="submit" class="btn btn-info">Go to Index</a>

              </div>
            </form>
          </div>

          <!-- /.card -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

<script>
     function performUpdate(id){
           let formData = new FormData();
           formData.append('name',document.getElementById('name').value);
           formData.append('street',document.getElementById('street').value);
           formData.append('country_id',document.getElementById('country_id').value);

            storeRoute('/cms/admin/cities-update/' +id , formData);
     }

     </script>
@endsection
