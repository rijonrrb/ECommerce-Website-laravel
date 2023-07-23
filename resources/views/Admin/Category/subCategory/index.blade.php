@extends('layouts.admin')

    @section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Sub Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">Add Category</button>
              </ol>
          </div><!-- /.col -->
      </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All sub categories list here</h3>
        </div>
        <!-- /.card-header -->
        @php        
        $i = 1;
        @endphp
        
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-sm">
              <thead>
                  <tr>
                    <th>SL</th>
                    <th>Subcategory Name</th>
                    <th>Subcategory Slug</th>
                    <th>Primecategory Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>{{$i++}}</td>
                <td>{{ $data->subcategory_name }}</td>
                <td>{{ $data->subcategory_slug }}</td>
                <td>{{ $data->category_name }}</td>
                <td>
                    <a href="#" class="btn btn-info btn-md mr-1" id="edit" data-id="{{ $data->id }}" data-toggle="modal" data-target="#e_categoryModal"><i class="fas fa-edit"></i></a> 
                    <a href="{{ route('subcategory.delete', $data->id) }}" class="btn btn-danger btn-md" id="delete"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</section>
</div>

<!--Add Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('subcategory.store') }}" method="Post"> 
          @csrf
      <div class="modal-body">
      <div class="form-group">
            <label for="category_name">Category Name</label>
            <select class="form-control" name="category_id" required="">
                @foreach($categories as $category)
                <option value="{{ $category->id}}">{{ $category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory_name">Category Name</label>
            <input type="text" class="form-control {{$errors->first('subcategory_name') ? 'is-invalid' : ''}}" id="subcategory_name" name="subcategory_name" placeholder="Add Category">
            {!! $errors->first('subcategory_name', '<div class="invalid-feedback">:message</div>') !!}
            <small id="subcategory_name" class="form-text text-muted">This is your sub category</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Add</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!--Edit Category Modal -->
<div class="modal fade" id="e_categoryModal" tabindex="-1" role="dialog" aria-labelledby="e_categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="e_categoryModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('category.update') }}" method="Post"> 
          @csrf
      <div class="modal-body">
        <div class="form-group">
            <label for="e_category_name">Category Name</label>
            <input type="hidden" id="e_category_id" name="e_category_id">
            <input type="text" class="form-control {{$errors->first('e_category_name') ? 'is-invalid' : ''}}" id="e_category_name" name="e_category_name" placeholder="Edit Category">
            {!! $errors->first('e_category_name', '<div class="invalid-feedback">:message</div>') !!}
            <small id="e_category_name" class="form-text text-muted">This is your sub category</small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary">Submit</button>
      </div>
     </form>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	$(document).on('click','#edit', function(){
		let cat_id=$(this).data('id');
		$.get("category/edit/"+cat_id, function(data){
			 $("#e_category_name").val(data.category_name);
       $("#e_category_id").val(data.id);
		});
	});

</script>
@endsection