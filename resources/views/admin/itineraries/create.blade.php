@extends('layouts.app')

@section('content')  


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">Add Itineraries for @if (isset($tour)) {{$tour->name }} @endif @if (isset($itinarary)) {{ $itinarary->tour->name}} @endif</h2>
                            <div class="nk-block-des text-soft">
                                <p>All fields are required.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                @php
                                    if(isset($tour)){$tour_id=$tour->id;}
                                    else{$tour_id=$itinerary->tour->id;}
                                @endphp
                                
                                    <a href="{{ route('setitineraries',$tour_id) }}" class="btn btn-primary">
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
                                <h5 class="card-title">New Tour Setup</h5>
                            </div>
                            <form action="{{ isset($itinerary)? route('itineraries.update',$itinerary->id):route('itineraries.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                                {{ csrf_field() }}
                                @if (isset($itinerary))
                                    {{ method_field('PUT') }}
                                @endif
                                <input type="hidden" name="tour_id" value="{{ $tour_id }}">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Itinerary Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="title" id="title" value="{{ isset($itinerary)?$itinerary->title:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Itinerary Description</label>
                                            <div class="form-control-wrap">
                                                <textarea class="summernote-minimal" name="description" id="description" cols="30" rows="10">{{ isset($itinerary)?$itinerary->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save"></em><span>Save Informations</span> </button>
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

@endsection

@section('script')
    
<link rel="stylesheet" href="{{ asset('admin-assets/css/editors/summernote.css?ver=2.0.0')}}">
<script src="{{ asset('admin-assets/js/libs/editors/summernote.js?ver=2.0.0')}}"></script>
<script src="{{ asset('admin-assets/js/editors.js?ver=2.0.0')}}"></script>
@endsection