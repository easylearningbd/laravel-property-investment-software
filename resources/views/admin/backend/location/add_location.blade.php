@extends('admin.admin_dashboard')
@section('admin') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<header class="page-header">
    <h2>Add Location</h2> 
    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li> 
            <li><span>Add Location</span></li>  
        </ol>  
    </div>
</header>


<div class="row"> 
<form action="{{ route('store.location') }}" method="post" enctype="multipart/form-data">
    @csrf


<div class="col-lg-12">
    <section class="card">
        <header class="card-header"> 
     <h2 class="card-title">Add Location</h2> 
        </header>
        <div class="card-body"> 
            <div class="row form-group pb-3">
                
                
<div class="col-lg-12">
    <div class="form-group">
        <label class="col-form-label" for="name">Location Name</label>
 <input type="text" name="name" class="form-control"> 
    </div>
</div>

<div class="col-lg-6 mt-3">
    <div class="form-group">
        <label class="col-form-label" for="image">Location Image</label>
 <input type="file" name="image" class="form-control"  id="image"> 
    </div>
</div>

<div class="col-lg-6 mt-3">
    <div class="form-group">
        <label class="col-form-label" for="image"> </label>
   <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="rounded-circle avatar-xl" style="width: 100px; height:100px;">
    </div>
</div>
 

            </div>
        </div>
        <footer class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </footer>
    </section>
</div>
</form>


</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })

</script>

@endsection