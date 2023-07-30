<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <form action="{{ route('brand.update') }}" method="Post" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="brand-name">Brand Name</label>
            <input type="text" class="form-control"  name="brand_name" value="{{ $data->brand_name }}" required="">
            <small id="emailHelp" class="form-text text-muted">This is your Brand </small>
          </div>
          <input type="hidden" name="id" value="{{ $data->id }}">
           <div class="form-group">
            <label for="brand-name">Brand Logo</label>
            <input type="file" class="dropifies" data-default-file="{{ $data->brand_logo }}" id= "dropifies" data-height="200"  name="brand_logo"/>
            <input type="hidden" name="old_logo" value="{{ $data->brand_logo }}">
          </div> 
      </div>
      <div class="modal-footer">
        <button type="Submit" class="btn btn-primary"> <span class="d-none"> loading..... </span>  Update</button>
      </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
  $('#dropifies').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>