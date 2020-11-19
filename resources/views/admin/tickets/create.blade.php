@extends('layouts.app')

@section('content')  


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">{{ isset($ticket)?'Update':'Add' }} Ticket</h2>
                            <div class="nk-block-des text-soft">
                                <p>All fields are required.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('tickets.index') }}" class="btn btn-primary">
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
                                <h5 class="card-title">{{ isset($ticket)?'Edit':'New' }} Ticket Setup</h5>
                            </div>
                            <form action="{{ isset($ticket)? route('tickets.update',$ticket->id):route('tickets.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                                {{ csrf_field() }}
                                @if (isset($ticket))
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
                                                            @if (isset($ticket))
                                                                @if ($airline->id==$ticket->airline_id)
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
                                            <label class="form-label">Ticket Category</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="flight_ticket_category_id" id="flight_ticket_category_id" data-search="on">
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
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($ticket)?$ticket->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Flight Type</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="off" name="flight_type" id="flight_type">
                                                        <option value="One Way"
                                                            @if (isset($ticket))
                                                                @if ($ticket->duration=='One Way')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >One Way</option>
                                                        <option value="Return"
                                                            @if (isset($ticket))
                                                                @if ($ticket->duration=='Return')
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
                                            <label class="form-label" for="pay-amount-1">Amount</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control"  name="amount" id="amount" value="{{ isset($ticket)?$ticket->amount:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save"></em><span>Save</span> </button>
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