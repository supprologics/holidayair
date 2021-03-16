@extends('layouts.app')



@section('content')  


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">{{ isset($deal)?'Update':'Add' }} Deal</h2>
                            <div class="nk-block-des text-soft">
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('deals.index') }}" class="btn btn-primary">
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
                                <h5 class="card-title">{{ isset($deal)?'Edit':'New' }} Deal Setup</h5>
                            </div>
                            <form action="{{ isset($deal)? route('deals.update',$deal->id):route('deals.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                                {{ csrf_field() }}
                                @if (isset($deal))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Airline</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="airline_id" id="airline_id" data-search="on">
                                                    @foreach ($airlines as $airline)
                                                        <option value="{{ $airline->id }}"
                                                            @if (isset($deal))
                                                                @if ($airline->id==$deal->airline_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >{{ $airline->name }}</option>
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
                                                            @if (isset($deal))
                                                                @if ($country->id==$deal->country_id)
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
                                            <label class="form-label" for="pay-amount-1">Deal Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($deal)?$deal->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control"  name="description" id="description" cols="30" rows="2">{{ isset($deal)?$deal->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Flight Type</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="off" name="flight_type" id="flight_type">
                                                        <option value="One Way"
                                                            @if (isset($deal))
                                                                @if ($deal->duration=='One Way')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >One Way</option>
                                                        <option value="Return"
                                                            @if (isset($deal))
                                                                @if ($deal->duration=='Return')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >Return</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            
                                            <label class="form-label">Ticket Category</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="class_type" id="class_type" data-search="on">
                                                    @foreach ($flightticketscategories as $flightticketscategorie)
                                                        <option value="{{ $flightticketscategorie->id }}"
                                                            @if (isset($ticket))
                                                                @if ($flightticketscategorie->id==$ticket->flight_ticket_category_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >{{ $flightticketscategorie->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Amount</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="amount" id="amount" value="{{ isset($deal)?$deal->amount:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Cancellation Fee</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="cancellation_fee" id="cancellation_fee" value="{{ isset($deal)?$deal->cancellation_fee:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Flight Change Fee</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="flight_change_fee" id="flight_change_fee" value="{{ isset($deal)?$deal->flight_change_fee:'' }}">
                                            </div>
                                        </div>
                                    </div>


           
                            
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save"></em><span>Save & Next</span> </button>
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