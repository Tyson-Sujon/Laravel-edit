@extends('backend.master')
@section('categoryactive')
  bg-success
@endsection
@section('categoryactivecl')
menu-is-opening menu-open
  
@endsection
@section('displayblocks')
  display:block
@endsection
@section('addcategoryactive')
  active
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>General Form</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">General Form</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ url('post-category') }}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Category Name</label>
                  <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" placeholder="Enter name" value="{{ old('category_name') }}">

                  @error('category_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                {{-- SLUG DIV --}}

                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Enter slug">
                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

          

       
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
@section('footer_js')
<script>
  $('#category_name').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
});
</script>
@endsection