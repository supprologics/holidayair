@extends('layouts.app')

@section('content')  
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-description">

                @include('partials.header',[
                    'header'=>'Flight Plan for '.$deal->name,
                    'icon'=>'ni-plus',
                    'button'=>'Add New Flight Plan',
                    'button_id'=>'add-flight-plan',
                ])
                    
                @include('partials.error')


                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Flight Plan</h5>
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                            </li><!-- li -->
                                            <li class="btn-toolbar-sep"></li><!-- li -->
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                        <em class="icon ni ni-setting"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-check">
                                                            <li><span>Show</span></li>
                                                            <li class="active"><a href="#">10</a></li>
                                                            <li><a href="#">20</a></li>
                                                            <li><a href="#">50</a></li>
                                                        </ul>
                                                        <ul class="link-check">
                                                            <li><span>Order</span></li>
                                                            <li class="active"><a href="#">DESC</a></li>
                                                            <li><a href="#">ASC</a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .dropdown -->
                                            </li><!-- li -->
                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- card-tools -->
                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id">
                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                        </div>
                                    </div><!-- card-search -->
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <table class="table table-tranx" id="table">
                                    <thead>
                                        <tr class="tb-tnx-head">
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span> Airline</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span> Take-off Airport</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span> Landing Airport</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-action">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span>Actions</span>
                                                </span>
                                            </th>
                                        </tr><!-- tb-tnx-item -->
                                        
                                    </thead>
                                    <tbody>
                                        @if ($flightplans->count()==0)
                                            
                                            <tr class="tb-tnx-item itinerary0 ">
                                                <td class="tb-tnx-info  ">
                                                    NO FLIGHT PLANS YET!
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endif
                                        @foreach ($flightplans as $flightplan)
                                            <tr class="tb-tnx-item flightplan{{$flightplan->id}}">
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $flightplan->airline->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $flightplan->takeoff_airport }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $flightplan->landing_airport }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a class="edit-modal" data-id="{{ $flightplan->id}}" data-airline="{{ $flightplan->airline->name }}" data-takeoff_airport="{{ $flightplan->takeoff_airport}}" data-landing_airport="{{ $flightplan->landing_airport}}" data-time_hours="{{ $flightplan->time_hours}}"  data-time_min="{{ $flightplan->time_min}}" >Edit</a></li>
                                                                <li><a class="delete-modal " data-id="{{ $flightplan->id}}" data-airline="{{ $flightplan->airline->name }}" data-takeoff_airport="{{ $flightplan->takeoff_airport}}" data-landing_airport="{{ $flightplan->landing_airport}}" data-time_hours="{{ $flightplan->time_hours}}"  data-time_min="{{ $flightplan->time_min}}" >Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endforeach
                                    </tbody>
                                </table>

                                
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
                                                        <h4 class="nk-modal-title">Delete Flght Plan!</h4>
                                                        <div class="nk-modal-text">
                                                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this flight plan ?</div>
                                                            <span class="sub-text-sm">This action can not be revert.</span>
                                                        </div>
                                                        <div class="nk-modal-action">
                                                            <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                                            <button type="button" id="del-flightplan" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                                                        </div>
                                                    </div>

                                                    <div class="show-modal">
                                                        <h4 id="show-title"></h4>
                                                        <p id="show-desc"></p>
                                                    </div>

                                                    <input type="hidden" name="id" id="id" value="">
                                                    <div class="else">
                                                        <input type="hidden" name="deal_id" id="deal_id" value="{{ $deal->id }}">
                                                        <div class="form-group">
                                                            <label class="form-label" for="title">Airline</label>
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
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="form-label" for="takeoff_airport">Take-off Airport</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="takeoff_airport" name="takeoff_airport">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label class="form-label" for="landing_airport">Landing Airport</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="landing_airport" name="landing_airport">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="form-label" for="time_hours">Time in Hours</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="time_hours" name="time_hours">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label class="form-label" for="time_min">Time in Minutes</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="time_min" name="time_min">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary" id="add"><em class="icon ni ni-save"></em><span>Save Flight Plan</span></button>
                                                            <button type="submit" class="btn btn-lg btn-primary" id="edit"><em class="icon ni ni-save"></em><span>Save Flight Plan</span></button>
                                                            <button data-dismiss="modal" class="btn btn-lg btn-primary" id="colse"><em class="icon ni ni-back-arrow-fill"></em><span>Go Back</span></button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->

                <div class="nk-block">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('deals.edit',$deal->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Previous</span>
                            </a>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('setdealrule',$deal->id) }}" class="btn btn-primary">
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

@section('script')


    <script>
        $(document).on('click','.create-modal',function(){
            $('.form-horizontal').show();
            $('.modal-title').text('Add Flight Plan');
            $('#close').show();
            $('#add').show();
            $('#edit').hide();
            $('.else').show();
            $('.delete').hide();
            $('.show-modal').hide();
            $('#airline_id').val('');
            $('#takeoff_airport').val('');
            $('#landing_airport').val('');
            $('#time_hours').val('');
            $('#time_min').val('');
            $('#create').modal('show');
        });

        //add
        $("#add").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'addflightplan',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'airline_id':$('#airline_id').val(),
                    'takeoff_airport':$('#takeoff_airport').val(),
                    'landing_airport':$('#landing_airport').val(),
                    'time_hours':$('#time_hours').val(),
                    'time_min':$('#time_min').val(),
                    'deal_id':$('#deal_id').val()
                },
                success:function(data){
                    if((data.errors)){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors);
                    }
                    
                    else {
                        $('.error').remove();
                        $('.itinerary0').remove();
                        $('#table').append("<tr class='tb-tnx-item flightplan" + data.flightplan.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.flightplan.airline_id + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.flightplan.takeoff_airport + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.flightplan.landing_airport + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-action'>"+
                            "<div class='dropdown'>"+
                                "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                    "<ul class='link-list-plain'>"+
                                        "<li><a class='edit-modal ' data-id='" + data.flightplan.id + "' data-airline='" + data.flightplan.airline_id + "' data-takeoff_airport='"+ data.flightplan.takeoff_airport  + "' data-landing_airport='"+ data.flightplan.landing_airport  + "' data-time_hours='"+ data.flightplan.time_hours  + "' data-time_min='"+ data.flightplan.time_min  +"' >Edit</a></li>"+
                                        "<li><a class='delete-modal ' data-id='" + data.flightplan.id + "' data-airline='" + data.flightplan.airline_id + "' data-takeoff_airport='"+ data.flightplan.takeoff_airport  + "' data-landing_airport='"+ data.flightplan.landing_airport  + "' data-time_hours='"+ data.flightplan.time_hours  + "' data-time_min='"+ data.flightplan.time_min  +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                        "</tr>");
                    }
                },
            });
                    
            $('#airline_id').val('');
            $('#takeoff_airport').val('');
            $('#landing_airport').val('');
            $('#time_hours').val('');
            $('#time_min').val('');
            $('#create').modal('toggle');
        });

            //edit
        $(document).on('click','.edit-modal',function(){

            $('.form-horizontal').show();
            $('.modal-title').text('Update Flight Plan');
            $('#close').show();
            $('#add').hide();
            $('#edit').show();
            $('#airline_id').val($(this).data('airline'));
            $('#airline_id').attr('selected','selected');
            $('#takeoff_airport').val($(this).data('takeoff_airport'));
            $('#landing_airport').val($(this).data('landing_airport'));
            $('#time_hours').val($(this).data('time_hours'));
            $('#time_min').val($(this).data('time_min'));
            $('#id').val($(this).data('id'));
            $('.else').show();
            $('.delete').hide();
            $('.show-modal').hide();
            $('#create').modal('show');
        });

        $("#edit").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'editflightplan',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'airline_id':$('#airline_id').val(),
                    'takeoff_airport':$('#takeoff_airport').val(),
                    'landing_airport':$('#landing_airport').val(),
                    'time_hours':$('#time_hours').val(),
                    'time_min':$('#time_min').val(),
                    'deal_id':$('#deal_id').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.flightplan' + data.flightplan.id).replaceWith("<tr class='tb-tnx-item flightplan" + data.flightplan.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.flightplan.airline_id + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.flightplan.takeoff_airport + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.flightplan.landing_airport + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-action'>"+
                            "<div class='dropdown'>"+
                                "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                    "<ul class='link-list-plain'>"+
                                        "<li><a class='edit-modal ' data-id='" + data.flightplan.id + "' data-airline='" + data.flightplan.airline_id + "' data-takeoff_airport='"+ data.flightplan.takeoff_airport  + "' data-landing_airport='"+ data.flightplan.landing_airport  + "' data-time_hours='"+ data.flightplan.time_hours  + "' data-time_min='"+ data.flightplan.time_min  +"' >Edit</a></li>"+
                                        "<li><a class='delete-modal ' data-id='" + data.flightplan.id + "' data-airline='" + data.flightplan.airline_id + "' data-takeoff_airport='"+ data.flightplan.takeoff_airport  + "' data-landing_airport='"+ data.flightplan.landing_airport  + "' data-time_hours='"+ data.flightplan.time_hours  + "' data-time_min='"+ data.flightplan.time_min  +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                        "</tr>");
                },
            });
                    
            $('#airline_id').val('');
            $('#takeoff_airport').val('');
            $('#landing_airport').val('');
            $('#time_hours').val('');
            $('#time_min').val('');
            $('#airline_id').removeAttr('selected');
            $('#create').modal('toggle');
        });



        $(document).on('click', '.delete-modal', function() {
            $('.form-horizontal').show();
            $('.modal-title').text('Delete Flight Plan');
            $('.delete').show();
            $('.else').hide();
            $('#id').val($(this).data('id'));
            $('#create').modal('show');
        });

        //delete
        $("#del-flightplan").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'deleteflightplan',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.flightplan' + data.flightplan).remove();
                },
            });
            
            $('#create').modal('hide');
        });


    </script> 
@endsection