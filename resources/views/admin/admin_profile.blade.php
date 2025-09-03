@extends('admin.admin_dashboard')
@section('admin') 
 
<header class="page-header">
    <h2>User Profile</h2>

    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li>

            <li><span>Pages</span></li>

            <li><span>User Profile</span></li>

        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
    </div>
</header>

<!-- start: page -->

<div class="row">
    <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">

<section class="card">
    <div class="card-body">
        <div class="thumb-info mb-3">
            <img src="{{ (!empty($profileData->photo)) ? url('upload/profile_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" class="rounded img-fluid" alt="John Doe">
            <div class="thumb-info-title">
                <span class="thumb-info-inner">{{ $profileData->name }}</span>
                <span class="thumb-info-type">{{ $profileData->email }}</span>
            </div>
        </div>

        

        <hr class="dotted short">

        <div class="social-icons-list">
            <a rel="tooltip" data-bs-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
            <a rel="tooltip" data-bs-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
            <a rel="tooltip" data-bs-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
        </div>

    </div>
</section> 

    </div>
    <div class="col-lg-8 col-xl-9">

<div class="tabs">
<ul class="nav nav-tabs tabs-primary">
    
    <li class="nav-item">
        <button class="nav-link" data-bs-target="#edit" data-bs-toggle="tab">Edit</button>
    </li>
</ul>
<div class="tab-content">
        
    <div id="edit">

        <form class="p-3"> 

  <h4 class="mb-3 font-weight-semibold text-dark">Personal Information</h4>

<div class="row">
    <div class="form-group col-md-6">
        <label for="inputPassword4">User Name</label>
        <input type="text" name="name" class="form-control" value="{{ $profileData->name}}"  >
    </div>
    <div class="form-group col-md-6 border-top-0 pt-0">
        <label for="inputPassword5">User Email</label>
        <input type="email" name="email" class="form-control" value="{{ $profileData->email}}">
    </div>


    <div class="form-group col-md-6">
        <label for="inputPassword4">User First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ $profileData->first_name}}"  >
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword5">User Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ $profileData->last_name}}">
    </div>


     <div class="form-group col-md-6">
        <label for="inputPassword4">User Phone Number</label>
        <input type="text" name="phone" class="form-control" value="{{ $profileData->phone}}"  >
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword5">User Address</label>
        <input type="text" name="address" class="form-control" value="{{ $profileData->address}}">
    </div>


    <div class="form-group col-md-6">
        <label for="inputPassword4">User Profile Photo </label>
        <input type="file" name="photo" class="form-control"  >
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword5"> </label>
         <img src="{{ (!empty($profileData->photo)) ? url('upload/profile_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-xl" style="width: 100px; height:100px;">
    </div>
    
</div>

<div class="row">
    <div class="col-md-12 text-end mt-3">
        <button class="btn btn-primary modal-confirm">Save Changes</button>
    </div>
</div>

        </form>

    </div>
            </div>
        </div>
    </div>
     

</div>
<!-- end: page -->
 









@endsection