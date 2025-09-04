@extends('admin.admin_dashboard')
@section('admin') 

<header class="page-header">
    <h2>All Property</h2> 
    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li> 
            <li><span>All Property</span></li>  
        </ol>  
    </div>
</header>


<div class="row">
<div class="col">
    <section class="card">
        <header class="card-header">
            <div class="card-actions" style="top: 8px;">
    <button type="button" class="btn btn-primary" onclick="window.location='{{ route('add.property') }}'" >Add Property </button>           
            </div>

            <h2 class="card-title">All Property</h2>
        </header>
        <div class="card-body">
            <div class="table-responsive">
<table class="table table-responsive-lg table-bordered table-striped table-lg mb-0">
    <thead>
        <tr>
            <th>Sl</th>
            <th>Property</th> 
            <th>Image</th>
            <th>Total Share</th>
            <th>Share Amount</th>
            <th>Featured</th>
            <th>Status</th>
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
      @foreach ($allData as $key=> $item) 
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->title }}</td>
            <td> <img src="{{ asset($item->image) }}" style="width: 50px; height:30px;" > </td>
            <td>{{ $item->total_share }}</td>
            <td>{{ $item->per_share_amount }}</td>

            <td> 
                @if ($item->is_featured == 'yes')
                    <span class="badge bg-success">Featured</span>
                @else
                <span class="badge bg-danger">Not Featured</span>
                @endif 
            </td>
            <td>  
                @if ($item->status == '1')
                    <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif 
            </td>
            <td>
         <a href="{{ route('edit.location',$item->id) }}" class="btn btn-success btn-sm">Edit</a>  
         <a href="{{ route('delete.location',$item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>      
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
