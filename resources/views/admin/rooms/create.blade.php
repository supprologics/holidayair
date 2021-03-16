@extends('layouts.app')

@section('content')  


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">{{ isset($room)?'Update':'Add' }} Room</h2>
                            <div class="nk-block-des text-soft">
                                <p>* fields are required.</p>
                            </div>
                        </div>
                        @php
                            if(isset($hotel)){
                                $hotel_id=$hotel->id;
                            }
                            else{
                                $hotel_id=$room->hotel_id;
                            }
                        @endphp
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('rooms.createrooom',$hotel_id) }}" class="btn btn-primary">
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
                                <h5 class="card-title">{{ isset($room)?'Edit':'New' }} Room Setup</h5>
                            </div>
                            <form action="{{ isset($room)? route('rooms.update',$room->id):route('rooms.store') }}" class="gy-3" class="is-alter form-validate" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if (isset($room))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="row g-4">
                                    @if (isset($hotel))
                                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Room Name *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($room)?$room->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Room Description *</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" style="width: 100" name="description" id="description" cols="30" rows="10">{{ isset($room)?$room->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="amount">Amount *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="amount" id="amount" value="{{ isset($room)?$room->amount:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="image">Room Image *</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="file"  class="custom-file-input" id="image" name="image" value="{{ isset($room)?$room->image:''}}">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!isset($room))
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="rooms">Rooms *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="rooms" id="rooms" value="{{ isset($room)?$room->rooms:'1' }}">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="adults">Adults *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="adults" id="adults" value="{{ isset($room)?$room->adults:'2' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="kids">Kids</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="kids" id="kids" value="{{ isset($room)?$room->kids:'0' }}">
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



@endsection

@section('script')


@endsection