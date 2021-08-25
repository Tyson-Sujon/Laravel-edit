@extends('backend.master')
@section('scategoryactive')
bg-success
@endsection
@section('scategoryactivecl')
menu-is-opening menu-open
  
@endsection
@section('displayblock')
display:block
@endsection
@section('s_scategoryactive1')
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
              <h3 class="card-title">Quick Sub Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ url('post-subcategory') }}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="subcategory_name">Sub Category Name</label>
                  <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" id="subcategory_name" placeholder="Enter name" value="{{ old('subcategory_name') }}">

                  @error('subcategory_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>
                {{-- SLUG DIV --}}
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Enter slug">
                
                  @error('slug')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                {{-- SLUG DIV End--}}

                <div class="form-group">
                  <label for="category_id">Category</label>
                  {{-- <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Enter slug"> --}}
                <select name="category_id" id="category_id" class="form-control">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach
                  
                </select>


                  @error('slug')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
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
  $('#subcategory_name').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
});



</script>
@endsection