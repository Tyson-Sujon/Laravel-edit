@extends('backend.master')
@section('productactive')
  bg-success
@endsection
@section('productactivecl')
menu-is-opening menu-open
  
@endsection
@section('alldisplayblock')
  display:block
@endsection
@section('productactive1')
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
          <h1>product</h1>
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
              <h3 class="card-title">Add product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ url('post-products') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter name" value="{{ old('title') }}">

                  @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                </div>

                

                {{-- SLUG DIV --}}
{{-- 
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" placeholder="Enter slug">
                </div> --}}

                <div class="form-group">
                    <label for="name">Category Name</label>
                        <select name="category_id" id="category_id" class="form-control">
                          <option value="">--Select One--</option>
                            @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    @error('category_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
  
                  </div>

                  <div class="form-group">
                    <label for="name">Sub Category Name</label>
                    <select name="scategory_id" id="scategory_id" class="form-control">
                       
                    </select>
                    @error('scategory_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
  
                  </div>

                  <div class="form-group">
                    <label for="name">Thumbnail</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail">
  
                    @error('thumbnail')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
  
                  </div>

                  
                  <div class="form-group">
                    <label for="summary">Summary</label>

                    <textarea name="summary" id="summary" class="form-control @error('summary') is-invalid @enderror"></textarea>
                   
  
                    @error('summary')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
  
                  </div>

                  
                  <div class="form-group">
                    <label for="description">Description</label>

                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
  
                    @error('category_name')
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


    $('#category_id').change(function(){
      var category_id = $(this).val();
      // alert(category_id);

      if (category_id) {
        $.ajax({
          type:"GET",
          url:"{{ url('api/get-subcat-list') }}/"+category_id,
          success:function(res){
            // console.log(res);
            if (res) {
              $("#scategory_id").empty();
              $("#scategory_id").append('<option>--Select One--</option>');
              $.each(res, function(key, value){
                $("#scategory_id").append('<option value="'+value.id+'">'+value.subcategory_name+'</option>');
              });
              
            } else {
              $("#scategory_id").empty();
              
            }


          }
        });
        
      } else {
        
      }



    });
  </script>

  

@endsection

{{-- @section('footer_js')
<script>
  $('#category_name').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
});
</script>
@endsection --}}