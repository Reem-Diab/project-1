@extends('cms.parent')

@section('title', 'Index city')
@section('main-title', 'Index city')
@section('sub-title', 'Index city')

@section('styles')
    
@endsection
@section('content')

<div class="card">
    <div class="card-header">
      <a href="{{ route('cities.create') }}" button type="button" class="btn btn-primary"> Add New city </a>
      {{-- <a href="{{ route('countries-trashed') }}" button type="button" class="btn btn-danger"> Trashed </a>
      <a href="{{ route('countries-trunCate') }}" button type="button" class="btn btn-danger"> Delete All </a> --}}
  
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th >Id</th>
            <th>city Name</th>
            <th>street</th>
            <th>Setting</th>
          </tr>
        </thead>
        <tbody>

            @forelse ($cities as $city) 
            <tr>
                <td>{{ $city->id }}</td>   
                <td>{{ $city->name }}</td>   
                <td>{{ $city->street }}</td> 
                
                <td>
                    <div class="btn-group">
                      <a href="{{ route('cities.edit', $city->id) }}" button type="button" class="btn btn-info">
                       Edit
                      </a>
                      <a button type="button" onclick="performDestroy({{ $city->id }} , this)" class="btn btn-danger">
                       Delete
                      </a>
                      <a href="{{ route('cities.show', $city->id) }}" button type="button" class="btn btn-primary">
                        Show
                      </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4"> No Defined cities </td>
            </tr>
            @endforelse
      </tbody>
      </table>
    </div>

    {{ $cities->links() }}
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection

@section('scripts')
    <script>
      function performDestroy(id , reference) {
        // confirmDestroy('/cms/admin/countries' '+id' , reference)
        confirmDestroy('/cms/admin/cities/' +id , reference)
      }
  </script>


  
@endsection


