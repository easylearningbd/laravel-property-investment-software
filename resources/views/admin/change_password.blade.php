@extends('admin.admin_dashboard')
@section('admin') 

<header class="page-header">
    <h2>Admin Change Password</h2> 
    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li> 
            <li><span>Change Password</span></li>  
        </ol>  
    </div>
</header>


<div class="row"> 
<form action="{{ route('admin.password.update') }}" method="post">
    @csrf


<div class="col-lg-12">
    <section class="card">
        <header class="card-header"> 
     <h2 class="card-title">Admin Change Password</h2> 
        </header>
        <div class="card-body"> 
            <div class="row form-group pb-3">
                
                
<div class="col-lg-8">
    <div class="form-group">
        <label class="col-form-label" for="old_password">Old Password</label>
        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password">
        @error('old_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="col-lg-8">
    <div class="form-group">
        <label class="col-form-label" for="new_password">New Password</label>
        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password">
        @error('new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>


<div class="col-lg-8">
    <div class="form-group">
        <label class="col-form-label" for="new_password_confirmation">Confirm Password</label>
        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation"> 
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