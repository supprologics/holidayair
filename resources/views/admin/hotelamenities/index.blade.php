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
                    'icon'=>'ni-plus',
                    'button'=>'Attach New Amenitie',
                    'button_id'=>'attach-amenitie',
                ])
                    
                @include('partials.error')


                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Hotel Amenities</h5>
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
                                        @if ($hotel->amenities->count()==0)
                                            
                                            <tr class="tb-tnx-item amenitie0 center">
                                                <td class="tb-tnx-info center text-center ">
                                                    NO AMENITIES YET!
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endif
                                        @foreach ($hotel->amenities as $amenitie)
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

@section('script')


    <script>
        $(document).on('click','.create-modal',function(){
            $('.form-horizontal').show();
            $('.modal-title').text('Add Amenitie');
            $('#close').show();
            $('#add').show();
            $('.else').show();
            $('.delete').hide();
            $('#amenitie_new').val('');
            $('#create').modal('show');
        });
        //add
        $("#add").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'addhotelamenitie',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'amenitie_new':$('#amenitie_new').val(),
                    'hotel_id':$('#hotel_id').val()
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
                                        "<li><a class='delete-modal ' data-id='" + data.amenitie.id + "' data-name='" + data.amenitie.name + "' data-icon='"+ data.amenitie.icon +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                        "</tr>");
                    }
                },
            });
                    
            $('#amenitie_new').val('');
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
                url:'deletehotelamenitie',
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