@extends('cms.parent')

@section('title', 'Index Country')
@section('main-title', 'Index Country')
@section('sub-title', 'Index Country')

@section('styles')
    
@endsection
@section('content')

<div class="card">
    <div class="card-header">
      <a href="{{ route('countries.create') }}" button type="button" class="btn btn-primary"> Add New Country </a>
      <a href="{{ route('countries-trashed') }}" button type="button" class="btn btn-danger"> Trashed </a>
      <a href="{{ route('countries-trunCate') }}" button type="button" class="btn btn-danger"> Delete All </a>
  
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th >Id</th>
            <th>Country Name</th>
            <th>Code</th>
            <th>Setting</th>
          </tr>
        </thead>
        <tbody>

            @forelse ($countries as $country) 
            <tr>
                <td>{{ $country->id }}</td>   
                <td>{{ $country->country_name }}</td>   
                <td>{{ $country->code }}</td> 
                
                <td>
                    <div class="btn-group">
                      <a href="{{ route('countries.edit', $country->id) }}" button type="button" class="btn btn-info">
                       Edit
                      </a>
                      <a button type="button" onclick="performDestroy({{ $country->id }} , this)" class="btn btn-danger">
                       Delete
                      </a>
                      <a href="{{ route('countries.show', $country->id) }}" button type="button" class="btn btn-primary">
                        Show
                      </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4"> No Defined Countries </td>
            </tr>
            @endforelse
      </tbody>
      </table>
    </div>

    {{ $countries->links() }}
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection

@section('scripts')
    <script>
      function performDestroy(id , reference) {
        // confirmDestroy('/cms/admin/countries' '+id' , reference)
        confirmDestroy('/cms/admin/countries/' +id , reference)
      }
  </script>


  
@endsection


