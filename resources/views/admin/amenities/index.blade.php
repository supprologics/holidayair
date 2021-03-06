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
                    'header'=>'Amenities',
                    'icon'=>'ni-plus',
                    'button'=>'Add New Amenitie',
                    'button_id'=>'add-amenitie',
                ])
                    
                @include('partials.error')


                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Amenities</h5>
                                    </div>
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <table class="table table-tranx" id="table">
                                    <thead>
                                        <tr class="tb-tnx-head">
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span> Name</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span>Icon</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-action">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span></span>
                                                </span>
                                            </th>
                                        </tr><!-- tb-tnx-item -->
                                        
                                    </thead>
                                    <tbody>
                                        @if ($amenities->count()==0)
                                            
                                            <tr class="tb-tnx-item amenitie0 center">
                                                <td class="tb-tnx-info center text-center ">
                                                    NO AMENITIES YET!
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endif
                                        @foreach ($amenities as $amenitie)
                                            <tr class="tb-tnx-item amenitie{{$amenitie->id}}">
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $amenitie->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <div class="icon-box style1">{!! $amenitie->icon !!}</div>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a class="edit-modal " data-id="{{ $amenitie->id}}" data-name="{{ $amenitie->name}}" data-icon="{{ $amenitie->icon}}" >Edit</a></li>
                                                                <li><a class="delete-modal " data-id="{{ $amenitie->id}}" data-name="{{ $amenitie->name}}" data-icon="{{ $amenitie->icon}}" >Remove</a></li>
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
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Select icon</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select" data-search="on" name="icon" id="icon" >
                                                                        <option value='<i class="soap-icon-wifi"></i>'><div class="icon-box style1"><i class="soap-icon-wifi"></i>Select Icon</div></option>
                                                                        <option value='<i class="soap-icon-wifi"></i>'><div class="icon-box style1"><i class="soap-icon-wifi"></i>WI_FI</div></option>
                                                                        <option value='<i class="soap-icon-swimming"></i>'><div class="icon-box style1"><i class="soap-icon-swimming"></i>swimming pool</div></option>
                                                                        <option value='<i class="soap-icon-television"></i>'><div class="icon-box style1"><i class="soap-icon-television"></i>television</div></option>
                                                                        <option value='<i class="soap-icon-coffee"></i>'><div class="icon-box style1"><i class="soap-icon-coffee"></i>coffee</div></option>
                                                                        <option value='<i class="soap-icon-aircon"></i>'><div class="icon-box style1"><i class="soap-icon-aircon"></i>air conditioning</div></option>
                                                                        <option value='<i class="soap-icon-fridge"></i>'><div class="icon-box style1"><i class="soap-icon-fridge"></i>fridge</div></option>
                                                                        <option value='<i class="soap-icon-winebar"></i>'><div class="icon-box style1"><i class="soap-icon-winebar"></i>wine bar</div></option>
                                                                        <option value='<i class="soap-icon-smoking"></i>'><div class="icon-box style1"><i class="soap-icon-smoking"></i>smoking allowed</div></option>
                                                                        <option value='<i class="soap-icon-entertainment"></i>'><div class="icon-box style1"><i class="soap-icon-entertainment"></i>entertainment</div></option>
                                                                        <option value='<i class="soap-icon-securevault"></i>'><div class="icon-box style1"><i class="soap-icon-securevault"></i>secure vault</div></option>
                                                                        <option value='<i class="soap-icon-pickanddrop"></i>'><div class="icon-box style1"><i class="soap-icon-pickanddrop"></i>pick and drop</div></option>
                                                                        <option value='<i class="soap-icon-phone"></i>'><div class="icon-box style1"><i class="soap-icon-phone"></i>room service</div></option>
                                                                        <option value='<i class="soap-icon-pets"></i>'><div class="icon-box style1"><i class="soap-icon-pets"></i>pets allowed</div></option>
                                                                        <option value='<i class="soap-icon-playplace"></i>'><div class="icon-box style1"><i class="soap-icon-playplace"></i>play place</div></option>
                                                                        <option value='<i class="soap-icon-breakfast"></i>'><div class="icon-box style1"><i class="soap-icon-breakfast"></i>complimentary breakfast</div></option>
                                                                        <option value='<i class="soap-icon-parking"></i>'><div class="icon-box style1"><i class="soap-icon-parking"></i>Free parking</div></option>
                                                                        <option value='<i class="soap-icon-conference"></i>'><div class="icon-box style1"><i class="soap-icon-conference"></i>conference room</div></option>
                                                                        <option value='<i class="soap-icon-fireplace"></i>'><div class="icon-box style1"><i class="soap-icon-fireplace"></i>fire place</div></option>
                                                                        <option value='<i class="soap-icon-handicapaccessiable"></i>'><div class="icon-box style1"><i class="soap-icon-handicapaccessiable"></i>Handicap Accessible</div></option>
                                                                        <option value='<i class="soap-icon-doorman"></i>'><div class="icon-box style1"><i class="soap-icon-doorman"></i>Doorman</div></option>
                                                                        <option value='<i class="soap-icon-tub"></i>'><div class="icon-box style1"><i class="soap-icon-tub"></i>Hot Tub</div></option>
                                                                        <option value='<i class="soap-icon-elevator"></i>'><div class="icon-box style1"><i class="soap-icon-elevator"></i>Elevator in Building</div></option>
                                                                        <option value='<i class="soap-icon-star"></i>'><div class="icon-box style1"><i class="soap-icon-star"></i>Suitable for Events</div></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary" id="add"><em class="icon ni ni-save"></em><span>Save Itinerary</span></button>
                                                            <button type="submit" class="btn btn-lg btn-primary" id="edit"><em class="icon ni ni-save"></em><span>Save Itinerary</span></button>
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

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


    <script>
        $(document).on('click','.create-modal',function(){
            $('.form-horizontal').show();
            $('.modal-title').text('Add Amenitie');
            $('#close').show();
            $('#add').show();
            $('#edit').hide();
            $('.else').show();
            $('.delete').hide();
            $('#name').val('');
            $('#icon').val('');
            $('#create').modal('show');
        });
        //add
        $("#add").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'addamenitie',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name').val(),
                    'icon':$('#icon').val(),
                },
                success:function(data){
                    if((data.errors)){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors);
                    }
                    
                    else {
                        $('.error').remove();
                        $('.amenitie0').remove();
                        $('#table').append("<tr class='tb-tnx-item amenitie" + data.amenitie.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='name'>"+ data.amenitie.name + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<div class='icon-box style1'>"+ data.amenitie.icon + "</div>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-action'>"+
                            "<div class='dropdown'>"+
                                "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                    "<ul class='link-list-plain'>"+
                                        "<li><a class='edit-modal ' data-id='" + data.amenitie.id + "' data-name='" + data.amenitie.name + "' data-icon='"+ data.amenitie.icon +"' >Edit</a></li>"+
                                        "<li><a class='delete-modal ' data-id='" + data.amenitie.id + "' data-name='" + data.amenitie.name + "' data-icon='"+ data.amenitie.icon +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                        "</tr>");
                    }
                },
            });
                    
            $('#name').val('');
            $('#icon').val('');
            $('#create').modal('toggle');
        });


            //edit
        $(document).on('click','.edit-modal',function(){

            $('.form-horizontal').show();
            $('.modal-title').text('Update Amenitie');
            $('#close').show();
            $('#add').hide();
            $('#edit').show();
            $('#name').val($(this).data('name'));
            $('#icon').val($(this).data('icon'));
            $('#id').val($(this).data('id'));
            $('.else').show();
            $('.delete').hide();
            $('#create').modal('show');
        });

        $("#edit").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'editamenitie',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name').val(),
                    'icon':$('#icon').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.amenitie' + data.amenitie.id).replaceWith("<tr class='tb-tnx-item amenitie" + data.amenitie.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='name'>"+ data.amenitie.name + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<div class='icon-box style1'>"+ data.amenitie.icon + "</div>"+
                            "</div>"+
                        "</td>"+
                    "<td class='tb-tnx-action'>"+
                        "<div class='dropdown'>"+
                            "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                            "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                "<ul class='link-list-plain'>"+
                                    "<li><a class='edit-modal ' data-id='" + data.amenitie.id + "' data-name='" + data.amenitie.name + "' data-icon='"+ data.amenitie.icon +"' >Edit</a></li>"+
                                    "<li><a class='delete-modal ' data-id='" + data.amenitie.id + "' data-name='" + data.amenitie.name + "' data-icon='"+ data.amenitie.icon +"' >Remove</a></li>"+
                                "</ul>"+
                            "</div>"+
                        "</div>"+
                    "</td>"+
                    "</tr>");
                },
            });
                    
            $('#name').val('');
            $('#icon').val('');
            $('#create').modal('toggle');
        });



        $(document).on('click', '.delete-modal', function() {
            $('.form-horizontal').show();
            $('.modal-title').text('Delete Amenitie');
            $('.delete').show();
            $('.else').hide();
            $('#id').val($(this).data('id'));
            $('#create').modal('show');
        });

        //delete
        $("#del-amenitie").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'deleteamenitie',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.amenitie' + data.amenitie).remove();
                },
            });
            
            $('#create').modal('hide');
        });


    </script> 
@endsection