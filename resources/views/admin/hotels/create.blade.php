@extends('layouts.app')

@section('content')  


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">{{ isset($hotel)?'Update':'Add' }} Hotel</h2>
                            <div class="nk-block-des text-soft">
                                <p>All fields are required.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('hotels.index') }}" class="btn btn-primary">
                                        <em class="icon ni ni-arrow-left"></em>
                                        <span>Back</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-head -->
                </div><!-- .nk-block-head -->
                    
                @include('partials.session')
                @include('partials.error')
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">{{ isset($hotel)?'Edit':'New' }} Hotel Setup</h5>
                            </div>
                            <form action="{{ isset($hotel)? route('hotels.update',$hotel->id):route('hotels.store') }}" class="gy-3" class="is-alter form-validate" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if (isset($hotel))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Hotel Category</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="hotelcategory_id" id="hotelcategory_id" data-search="on">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (isset($hotel))
                                                                @if ($category->id==$hotel->hotelcategory_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="country_id" id="country_id" data-search="on">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            @if (isset($hotel))
                                                                @if ($country->id==$hotel->country_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Hotel Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($hotel)?$hotel->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Hotel Description</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" style="width: 100" name="description" id="description" cols="30" rows="10">{{ isset($hotel)?$hotel->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="city">City</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="city" id="city" value="{{ isset($hotel)?$hotel->city:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Minimum Stay</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="on" name="minstay" id="minstay">
                                                        <option value="1" @if (isset($hotel)) @if ($hotel->minstay=='1')  selected  @endif @endif >1</option>
                                                        <option value="2" @if (isset($hotel)) @if ($hotel->minstay=='2')  selected  @endif @endif >2</option>
                                                        <option value="3" @if (isset($hotel)) @if ($hotel->minstay=='3')  selected  @endif @endif >3</option>
                                                        <option value="4" @if (isset($hotel)) @if ($hotel->minstay=='4')  selected  @endif @endif >4</option>
                                                        <option value="5" @if (isset($hotel)) @if ($hotel->minstay=='5')  selected  @endif @endif >5</option>
                                                        <option value="6" @if (isset($hotel)) @if ($hotel->minstay=='6')  selected  @endif @endif >6</option>
                                                        <option value="7" @if (isset($hotel)) @if ($hotel->minstay=='7')  selected  @endif @endif >7</option>
                                                        <option value="8" @if (isset($hotel)) @if ($hotel->minstay=='8')  selected  @endif @endif >8</option>
                                                        <option value="9" @if (isset($hotel)) @if ($hotel->minstay=='9')  selected  @endif @endif >9</option>
                                                        <option value="10" @if (isset($hotel)) @if ($hotel->minstay=='10')  selected  @endif @endif >10</option>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="city">Hotel Logo</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="file"  class="custom-file-input" id="logo" name="logo" value="{{ isset($hotel)?$hotel->logo:''}}">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label" for="city">Set Location</label>
                                                <div class="form-control-wrap">
                                                    <button type="button" id="add-location" class="create-modal btn btn-primary">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>Get coordinates</span>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="lat">Latitude</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="lat" id="lat" value="{{ isset($hotel)?$hotel->lat:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="lng">Longitude</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="lng" id="lng" value="{{ isset($hotel)?$hotel->lng:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save"></em><span>Save and Next</span> </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

    <!-- Modal Form -->
    <div class="modal fade" tabindex="-1" id="create" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">

                        <div class="show">
                            <div class="form-group">
                                <label class="form-label" for="Location Name">Location Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control name_update" id="name_modal" name="name_modal">
                                </div>
                            </div>
                            <div class="form-group" id="address">
                                <label class="form-label" for="Location Name">Location Address as Google</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="add" name="add" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="Latitude">Latitude</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="latgoogle" name="latgoogle">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="Longitude">Longitude</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="longgoogle" name="longgoogle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary" id="save"><em class="icon ni ni-save"></em><span>Save Location</span></button>
                                <button data-dismiss="modal" class="btn btn-lg btn-primary" ><em class="icon ni ni-back-arrow-fill"></em><span>Go Back</span></button>
                            </div>
                        </div>

                        <div class="else">
                            <div class="form-group">
                                <label class="form-label" for="email-address">Location Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name_search" name="name_search">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-lg btn-primary" id="search"><em class="icon ni ni-search"></em><span>Search Location</span></button>
                                <button type="button" class="btn btn-lg btn-primary" id="edit"><em class="icon ni ni-save"></em><span>Save Location</span></button>
                                <button data-dismiss="modal" class="btn btn-lg btn-primary" id="colse"><em class="icon ni ni-back-arrow-fill"></em><span>Go Back</span></button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')


<script src="https://unpkg.com/axios/dist/axios.min.js"></script> 

<script>

    $(document).on('click','.create-modal',function(){
        $('.form-horizontal').show();
        $('.modal-title').text('Add New Location');
        $('#close').show();
        $('#search').show();
        $('#save').show();
        $('#edit').hide();
        $('.else').show();
        $('.show').hide();
        $('.delete').hide();
        $('#name_search').val('');
        $('#name_modal').val('');
        $('#add').val('');
        $('#latgoogle').val('');
        $('#longgoogle').val('');
        $('#create').modal('show');
    });
    //search
    $("#search").click(function(e){
        e.preventDefault();
        geocode();
    });

    function geocode(){

        if($('.name_update').val()){
            var location = $('.name_update').val();
            $('#update').show();
        }
        else{
            var location = $('#name_search').val();
            $('#update').hide();
        }

        axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
            params:{
            address:location,
            key:'AIzaSyAfRSnupQVtH1oegEPhsMmgHeSsy4cn-kU'
            }
        })
        .then(function(response){
            // Log full response
            console.log(response);

            $('#name_modal').val(location);
            $('#address').show();
            $('#add').val(response.data.results[0].formatted_address);
            $('#latgoogle').val(response.data.results[0].geometry.location.lat);
            $('#longgoogle').val(response.data.results[0].geometry.location.lng);
            $('.else').hide();
            $('#edit_search').hide();
            $('.show').show();

           
        })
        .catch(function(error){
            console.log(error);
        });
    }


    $("#save").click(function(e){
     
        $('#lat').val($('#latgoogle').val());
        $('#lng').val($('#longgoogle').val());
        $('#name_search').val('');
        $('#name_modal').val('');
        $('#add').val('');
        $('#latgoogle').val('');
        $('#longgoogle').val('');
        $('#update').hide();
        $('#create').modal('toggle');
    });


</script> 

@endsection