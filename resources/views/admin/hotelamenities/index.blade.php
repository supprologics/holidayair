@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/soap-icon.css')}}">
    <style>
        .icon-box {
        text-transform: uppercase;
        }
        .icon-box > i {
        text-align: center;
        }
        .icon-box.style1 {
        height: 42px;
        background: #fff;
        line-height: 42px;
        font-size: 0.9167em;
        }
        .icon-box.style1 > i {
        display: block;
        width: 42px;
        float: left;
        background: #fdb714;
        line-height: 42px;
        color: #fff;
        font-size: 2em;
        margin-right: 15px;
        }
    </style>
@endsection

@section('content')  
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-description">

                @include('partials.header',[
                    'header'=>'Hotel Amenities ',
                ])
                    
                @include('partials.error')
                @include('partials.session')


                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Hotel Amenities</h5>
                                    </div>
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0 m-4">

                                
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
                                                <form action="" method="POST" class="form-horizontal " role="modal">
                                                    {{ csrf_field() }}

                                                    <div class="delete text-center">
                                                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                                                        <h4 class="nk-modal-title">Delete Amenitie!</h4>
                                                        <div class="nk-modal-text">
                                                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this amenitie ?</div>
                                                            <span class="sub-text-sm">This action can not be revert.</span>
                                                        </div>
                                                        <div class="nk-modal-action">
                                                            <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                                            <button type="button" id="del-amenitie" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                                                        </div>
                                                    </div>


                                                    <input type="hidden" name="id" id="id" value="">
                                                    <div class="else">
                                                        <input type="hidden" name="hotel_id" id="hotel_id" value="{{ $hotel->id }}">
                                                        <div class="form-group my-2">
                                                            <label class="form-label">Select Amenities</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select" data-search="on" name="amenitie_new" id="amenitie_new" >
                                                                        @foreach ($allamenities as $allamenitie)
                                                                            <option value="{{ $allamenitie->id }}">{{ $allamenitie->name }}</option>
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary" id="add"><em class="icon ni ni-save"></em><span>Save Itinerary</span></button>
                                                            <button data-dismiss="modal" class="btn btn-lg btn-primary" id="colse"><em class="icon ni ni-back-arrow-fill"></em><span>Go Back</span></button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('hotels.amenitieupdate',$hotel->id) }}" class="gy-3" class="is-alter form-validate" method="POST" >
                                    {{ csrf_field() }}
                                    <ul class="amenities clearfix style1 row">
                                        @foreach ($allamenities as $item)
                                        <li class="col-md-3 col-sm-4">
                                            <div class="icon-box style1 mb-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                    @foreach ($amenities as $amenitie)
                                                        @if ($amenitie->amenitie_id==$item->id)  checked  @endif
                                                    @endforeach
                                                     id="{{ $item->id}}" name="hotelamenties[]" value="{{ $item->id}}">
                                                    <label class="custom-control-label" for="{{ $item->id}}">{{ $item->name}}</label>
                                                </div> 
                                                {!! $item->icon !!}
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>

                                    
                                    <button type="submit" class="btn btn-primary">
                                        <em class="icon ni ni-save"></em>
                                        <span>Save Amenities</span>
                                    </button>

                                </form>

                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->

                
                <div class="nk-block">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('hotels.edit',$hotel->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Previous</span>
                            </a>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('hotelgalleryview',$hotel->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-right"></em>
                                <span>Next</span>
                            </a>
                        </li>
                    </ul>
                </div><!-- .nk-block -->

            </div>
        </div>
    </div>
</div>
@endsection
