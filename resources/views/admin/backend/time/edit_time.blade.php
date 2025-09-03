@extends('admin.admin_dashboard')
@section('admin') 

<header class="page-header">
    <h2>Edit Times</h2> 
    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li> 
            <li><span>Edit Times</span></li>  
        </ol>  
    </div>
</header>


<div class="row"> 
<form action="{{ route('update.times') }}" method="post">
    @csrf

<input type="hidden" name="id"  value="{{ $times->id }}">

<div class="col-lg-12">
    <section class="card">
        <header class="card-header"> 
     <h2 class="card-title">Edit Times</h2> 
        </header>
        <div class="card-body"> 
            <div class="row form-group pb-3">
                
                
<div class="col-lg-6">
    <div class="form-group">
        <label class="col-form-label" for="time_name">Time Name</label>
 <input type="text" name="time_name" class="form-control" value="{{ $times->time_name }}"> 
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label class="col-form-label" for="time_hour">Time Hour</label>
 <input type="text" name="time_hour" class="form-control" value="{{ $times->time_hour }}"> 
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




@endsection