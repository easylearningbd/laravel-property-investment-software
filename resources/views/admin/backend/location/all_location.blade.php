@extends('admin.admin_dashboard')
@section('admin') 

<header class="page-header">
    <h2>All Location</h2> 
    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li> 
            <li><span>All Location</span></li>  
        </ol>  
    </div>
</header>


<div class="row">
<div class="col">
    <section class="card">
        <header class="card-header">
            <div class="card-actions" style="top: 8px;">
    <button type="button" class="btn btn-primary" onclick="window.location='{{ route('add.times') }}'" >Add Location </button>           
            </div>

            <h2 class="card-title">All Location</h2>
        </header>
        <div class="card-body">
            <div class="table-responsive">
<table class="table table-responsive-lg table-bordered table-striped table-lg mb-0">
    <thead>
        <tr>
            <th>Sl</th>
            <th>Location Name</th>
            <th>Location Image</th>
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
      @foreach ($location as $key=> $item) 
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->name }}</td>
            <td> <img src="{{ asset($item->image) }}" style="width: 50px; height:50px;" > </td>
            <td>
         <a href="{{ route('edit.times',$item->id) }}" class="btn btn-success btn-sm">Edit</a>  
         <a href="{{ route('delete.times',$item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>      
             </td>  
        </tr>
      @endforeach  
            
    </tbody>
</table>
            </div>
        </div>
    </section>
</div>
</div>


@endsection
