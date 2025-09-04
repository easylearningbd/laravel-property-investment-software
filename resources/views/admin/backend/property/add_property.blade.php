@extends('admin.admin_dashboard')
@section('admin') 
 

<style>
    .form-group label{
        color: #000;
        font-weight: 500;
    }

    /* Gallery image style code  */
    .image-preview {
        position: relative;
        display: inline-block;
    }

    .image-preview img {
        width: 150px;
        height: 100px;
        object-fit: cover;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .remove-image {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #ff4d4d;
        color: white;
        border: none;
        border-radius: 50%;
        width: 22px;
        height: 22px;
        cursor: pointer;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<section role="main" class=""> 
   <header class="page-header">
    <h2>Add Property</h2> 
    <div class="right-wrapper text-end">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="bx bx-home-alt"></i>
                </a>
            </li> 
            <li><span>Add Property</span></li>  
        </ol>  
    </div>
</header>

    <form action=" " method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#property" role="tab">Property Settings</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#investment" role="tab">Investment Settings</a></li>
           
        </ul>

<div class="tab-content pt-3">

    <!-- Property Settings -->
    <div class="tab-pane fade show active" id="property" role="tabpanel">
        <div class="form-group text-center">
            <div class="position-relative d-inline-block shadow rounded" style="width: 400px; height: 200px; overflow: hidden;">
                <!-- Image Preview -->
                <img id="showImage" src="{{ asset('backend/img/preview.png') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Preview">

                <!-- Upload Button -->
                <label for="image" class="position-absolute bottom-0 end-0 m-2 bg-primary p-2 rounded-circle text-white" style="cursor:pointer;">
                    <i class="fas fa-upload"></i>
                </label>

                <!-- File Input -->
                <input type="file" name="image" id="image" class="d-none" accept="image/*">
            </div>

            <p class="mt-2 text-muted">
                <span class="text-danger">Property Image.</span>
                Supported Files: <strong>.png, .jpg, .jpeg</strong>. Image will be resized into <strong>555x370px</strong>
            </p>
            
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <!-- Title -->
        <div class="form-group my-4">
            <label class="fw-bold">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="titleInput" class="form-control" required> 
        </div>

        <!-- Slug -->
        <div class="form-group position-relative">
            <label class="fw-bold">Slug <span class="text-danger">*</span></label>
            <div class="d-flex align-items-center">
                <input type="text" name="slug" id="slugInput" class="form-control me-2" required>
                <a href="javascript:void(0);" onclick="generateSlug()" class="text-primary text-decoration-none">
                        <i class="fas fa-link"></i> Make Slug
                </a>
            </div> 
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                <label>Location  <span class="text-danger">*</span></label>
                <select name="location_id" id="location" class="form-control">
                    <option value="">Select Location</option>
                    @foreach ($location as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                </div>
                @error('location_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>

            <div class="col-md-6">
                <div class="form-group">
                <label>Location Map URL <span class="text-danger">*</span></label>
                <input type="text" name="location_map" class="form-control">
                </div>
            </div>
        </div>

        <!-- Gallery Image Upload -->
        <div class="form-group mt-2">
            <label class="fw-bold">Gallery Images <span class="text-danger">(You can add multiple images)</span></label>
            <!-- File Input (hidden) -->
            <input type="file" name="gallery_images[]" id="multiImg" class="d-none" accept="image/*" multiple>

            <!-- Clickable Preview Area -->
            <div class="border border-dashed text-center p-5 rounded" id="preview_img" style="cursor: pointer;">
                <i class="fas fa-cloud-upload-alt fa-2x text-muted"></i>
                <p class="mt-2 text-muted">Click to browse multiple images</p>
            </div>
            <small class="text-muted d-block mt-2">Supported Files: <strong>.png, .jpg, .jpeg</strong>. Image will be resized into <strong>840x450px</strong></small>
        </div>
        

            <!-- Details -->
            <div class="form-group mt-4">
            <label class="fw-bold">Details</label>
            <textarea name="details" id="detailsEditor" class="form-control" rows="8"></textarea>
            </div>


        <div class="form-group">
            <label>Is Featured</label>
            <select name="is_featured" class="form-control">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
        </div> 
        
    </div>

    <!-- Investment Settings -->
    <div class="tab-pane fade" id="investment" role="tabpanel">
        <div class="row mt-2">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Investment Type <span class="text-danger">*</span></label>
                    <select name="investment_type" id="investment_type" class="form-control">
                        <option value="">Select One</option>
                        <option value="One-Time-Investment">One Time Investment </option>
                        <option value="Investment-By-Installment">Investment By Installment</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Total Share <span class="text-danger">*</span></label>
                    <input type="number" name="total_share" class="form-control" placeholder="Enter Total Share">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Per Share Amount <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="per_share_amount" class="form-control" placeholder="Per Share Amount">
                        <span class="input-group-text" id="basic-addon2">USD</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Capital Back <span class="text-danger">*</span></label>
                    <select name="capital_back" id="capital_back" class="form-control">
                        <option value="">Select One</option>
                        <option value="Yes">Yes </option>
                        <option value="No">No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Profit Back <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" name="profit_back" id="profitBackInput" class="form-control" placeholder="Profit Back Days">
                        <span class="input-group-text">Day</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="profitAmountTypeSelect">
                <div class="form-group">
                    <label>Profit Type <span class="text-danger">*</span></label>
                    <select name="profit_type" class="form-control">
                        <option value="">Select One</option>
                        <option value="Fixed">Fixed</option>
                        <option value="Range">Range</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- need to condition here for hide & show -->
        <div id="installmentFields">
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Total Installment</label>
                        <input type="number" name="total_installment" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Down Payment</label>
                        <div class="input-group">
                            <input type="number" step="0.01" name="down_payment" class="form-control">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Per Installment Amount</label>
                        <div class="input-group">
                            <input type="number" step="0.01" name="per_installment_amount" class="form-control" readonly>
                            <span class="input-group-text">USD</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Installment Late Fee</label>
                            <div class="input-group">
                            <input type="number" step="0.01" name="installment_late_fee" class="form-control">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Time Between Installment</label>
                        <input type="text" name="time_between_installment" class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Profit Amount Type</label>
                    <select name="profit_amount_type" id="profit_amount_type" class="form-control">
                        <option value="">Select One</option>
                        <option value="%">% </option>
                        <option value="USD">USD</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6" id="minimumProfit">
                <div class="form-group">
                    <label>Minimum Profit Amount</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="minimum_profit_amount" id="minimum_profit_amount" class="form-control">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="fixedProfit">
                <div class="form-group">
                    <label>Profit Amount</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="profit_amount" id="profit_amount" class="form-control">
                        <span class="input-group-text" id="basic-addon2">%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-6" id="profit_distribution_wrapper">
                <div class="form-group">
                    <label>Profit Distribution <span class="text-danger">*</span></label>
                    <select name="profit_distribution" id="profit_distribution" class="form-control">
                        <option value="">Select One</option>
                        <option value="Manual">Manual</option>
                        <option value="Auto">Auto</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6" id="auto_profit_wrapper">
                <div class="form-group">
                    <label>Auto Profit Distribution (%)</label>
                    <div class="input-group">
                        <input type="number" step="0.01" name="auto_profit_distribution" id="auto_profit_distribution" class="form-control">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-6" id="profitScheduleWrapper">
                <div class="form-group">
                    <label>Profit Schedule <span class="text-danger">*</span></label>
                    <select name="profit_schedule" id="profit_schedule" class="form-control">
                        <option value="">Select One</option>
                        <option value="One-Time">One Time</option>
                        <option value="Life-Time">Life Time</option>
                        <option value="Repeated-Time">Repeated Time</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6" id="profitSchedulePeriodWrapper">
                <div class="form-group">
                    <label>Profit Schedule Period</label>
                    <select name="time_id" id="profit_schedule_period" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($times as $item)
                            <option value="{{ $item->id }}">{{ $item->time_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group mt-2" id="repeatTimeWrapper">
            <div class="col-md-12">
                <label>Repeat Time</label>
                <input type="number" name="repeat_time" id="repeat_time" class="form-control">
            </div>
        </div>


        <input type="hidden" name="submitted_tab" value="investment">
        
    </div>  

</div>

        <!-- Final Full Submit -->
        <div class="text-center mt-4">
           <button type="submit" class="btn btn-success mt-3">Save Property Settings</button>
        </div>

    </form>
</section>


<!--------===Show MultiImage ========------->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script -->
<script>
$(document).ready(function () {
    // Only this triggers the input
    $('#preview_img').on('click', function () {
        $('#multiImg').trigger('click');
    });

    $('#multiImg').on('change', function () {
        const files = this.files;
        $('#preview_img').empty(); // Clear previous previews

        if (files.length === 0) {
            $('#preview_img').html('<p class="text-muted">No files selected.</p>');
        }

        $.each(files, function (i, file) {
            if (/\.(jpe?g|png|gif|webp)$/i.test(file.name)) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = $('<img/>').addClass('thumb').attr('src', e.target.result).css({
                        width: '100px',
                        height: '80px',
                        margin: '5px',
                        border: '1px solid #ccc',
                        'object-fit': 'cover'
                    });
                    $('#preview_img').append(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
});
</script>


 
 





 


@endsection
