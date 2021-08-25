@extends('backend.master');
@section('categoryactive')
  bg-success
@endsection
@section('categoryactivecl')
menu-is-opening menu-open
  
@endsection
@section('displayblocks')
  display:block
@endsection
@section('trashedcategoryactive')
  active
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>trashed</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th >Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                   @forelse ($categories as $key => $cat)
                   <td>{{ $categories->firstItem() + $key }}</td>
                   {{-- $loop er kisu usefull propertices from documentation --}}
                   <td>{{ $cat->category_name }}</td>
                   {{-- database er table er colume ta show kortesay --}}
                   <td>{{ $cat->slug }}</td>
                   <td>{{ $cat->created_at->format('d-M-Y h:i:s a') }}({{ $cat->created_at->diffForHumans() }})</td>
                   
                  
                    <td class="text-center" >
                      <a style="margin-right:10px" class="btn btn-success" href="{{ url('restore-category') }}/{{ $cat->id }}">Restore</a>

                      <a class="btn btn-danger" href="{{ url('permanent-category') }}/{{ $cat->id }}">Permanent Delete</a>
                    </td>
                    
                    </tr>
                    @empty
                    <td colspan="10" class="text-center"><h4 style="color: #093b73" >No Data Available.</h4></td>
                    @endforelse
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              {{ $categories->links()}}
              {{-- {{ $cats->onEachSide(2)->links() }} --}}
              {{-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div> --}}
            </div>
            <!-- /.card -->           
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->    
@endsection

@section('footer_js')
  <script>
    @if (session('success'))
      
    Command: toastr["success"]("{{ session('success') }}")
// nicher code ta toastr web thakay nay hoisay
toastr.options = {
  "positionClass": "toast-top-right",
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

    @endif
  </script>
@endsection