@extends('layouts.app')

@section('content') 

@php
    if($detail_type=='1'){
        $detail_type_m='Includes';
        $detail_type_s='Include';
        $detail_type_n='include';
        $detail_type_route_p='setitineraries';
        $detail_type_route_n='setexcludes';
    }
    if($detail_type=='2'){
        $detail_type_m='Excludes';
        $detail_type_s='Exclude';
        $detail_type_n='exclude';
        $detail_type_route_p='setinculdes';
        $detail_type_route_n='setconditions';
    }
    if($detail_type=='3'){
        $detail_type_m='Conditions';
        $detail_type_s='Condition';
        $detail_type_n='condition';
        $detail_type_route_p='setexcludes';
        $detail_type_route_n='setcancellations';
    }
    if($detail_type=='4'){
        $detail_type_m='Cancellations';
        $detail_type_s='Cancellation';
        $detail_type_n='cancellation';
        $detail_type_route_p='setconditions';
        $detail_type_route_n='sethints';
    }
    if($detail_type=='5'){
        $detail_type_m='Hints';
        $detail_type_s='Hint';
        $detail_type_n='hint';
        $detail_type_route_p='setcancellations';
        $detail_type_route_n='galleryview';
    }
@endphp
    
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-description">

                @include('partials.header',[
                    'header'=>$detail_type_m.' for '.$tour->name,
                    'icon'=>'ni-plus',
                    'button'=>'Add New '.$detail_type_s,
                    'button_id'=>'add-'.$detail_type_n,
                ])
                    
                @include('partials.error')


                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All {{ $detail_type_m }}</h5>
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
                                                    <span> Detail</span>
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
                                        @if ($txt_details->count()==0)
                                            
                                            <tr class="tb-tnx-item data0 center">
                                                <td class="tb-tnx-info center text-center ">
                                                    NO {{ strtoupper($detail_type_m) }} YET!
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endif
                                        @foreach ($txt_details as $txt_detail)
                                            <tr class="tb-tnx-item {{ $detail_type_n.$txt_detail->id }}">
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $txt_detail->text }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a class="show-modal " data-id="{{ $txt_detail->id}}" data-detail_type="{{ $txt_detail->detail_type}}" data-text="{{ $txt_detail->text}}" >View</a></li>
                                                                <li><a class="edit-modal " data-id="{{ $txt_detail->id}}" data-detail_type="{{ $txt_detail->detail_type}}" data-text="{{ $txt_detail->text}}" >Edit</a></li>
                                                                <li><a class="delete-modal " data-id="{{ $txt_detail->id}}" data-detail_type="{{ $txt_detail->detail_type}}" data-text="{{ $txt_detail->text}}" >Remove</a></li>
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
                                                        <h4 class="nk-modal-title">Delete {{ $detail_type_s }}!</h4>
                                                        <div class="nk-modal-text">
                                                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this data ?</div>
                                                            <span class="sub-text-sm">This action can not be revert.</span>
                                                        </div>
                                                        <div class="nk-modal-action">
                                                            <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                                            <button type="button" id="del" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                                                        </div>
                                                    </div>

                                                    <div class="show-modal">
                                                        <h4 id="show-title"></h4>
                                                        <p id="show-desc"></p>
                                                    </div>

                                                    <input type="hidden" name="id" id="id" value="">
                                                    <div class="else">
                                                        <input type="hidden" name="tour_id" id="tour_id" value="{{ $tour->id }}">
                                                        <input type="hidden" name="detail_type" id="detail_type" value="{{ $detail_type}}">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address">Description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea name="text" id="text" cols="" rows="5" class="form-control" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary" id="add"><em class="icon ni ni-save"></em><span>Save {{ $detail_type_s}}</span></button>
                                                            <button type="submit" class="btn btn-lg btn-primary" id="edit"><em class="icon ni ni-save"></em><span>Save {{ $detail_type_s}}</span></button>
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
                            <a href="{{ route($detail_type_route_p ,$tour->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Previous</span>
                            </a>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route($detail_type_route_n,$tour->id) }}" class="btn btn-primary">
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
        var detail_type_m = "<?php echo $detail_type_m ?>";
        var detail_type_s = "<?php echo $detail_type_s ?>";
        var detail_type_n = "<?php echo $detail_type_n ?>";

        $(document).on('click','.create-modal',function(){
            $('.form-horizontal').show();
            $('.modal-title').text('Add '+detail_type_s);
            $("#text").attr("disabled", false);
            $('#close').show();
            $('#add').show();
            $('#edit').hide();
            $('.else').show();
            $('.delete').hide();
            $('.show-modal').hide();
            $('#description').val('');
            $('#create').modal('show');
        });
        //add
        $("#add").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'addtxt_detail',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'detail_type':$('#detail_type').val(),
                    'text':$('#text').val(),
                    'tour_id':$('#tour_id').val()
                },
                success:function(data){
                    if((data.errors)){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors);
                    }
                    
                    else {
                        $('.error').remove();
                        $('.data0').remove();
                        $('#table').append("<tr class='tb-tnx-item "+ detail_type_n + data.txt_detail.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.txt_detail.text + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-action'>"+
                            "<div class='dropdown'>"+
                                "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                    "<ul class='link-list-plain'>"+
                                        "<li><a class='show-modal ' data-id='"+ data.txt_detail.id + "' data-detail_type='" + data.txt_detail.detail_type + "' data-text='"+ data.txt_detail.text +"' >View</a></li>"+
                                        "<li><a class='edit-modal ' data-id='" + data.txt_detail.id + "' data-detail_type='" + data.txt_detail.detail_type + "' data-text='"+ data.txt_detail.text +"' >Edit</a></li>"+
                                        "<li><a class='delete-modal ' data-id='" + data.txt_detail.id + "' data-detail_type='" + data.txt_detail.detail_type + "' data-text='"+ data.txt_detail.text +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                        "</tr>");
                    }
                },
            });
                    
            $('#text').val('');
            $('#create').modal('toggle');
        });



        // Show function
        $(document).on('click', '.show-modal', function() {
            $('#show-desc').text($(this).data('text'));
            $('.modal-title').text('Show '+detail_type_s);
            $('#close').show();
            $('#add').hide();
            $('#edit').hide();
            $('.else').hide();
            $('.show-modal').show();
            $('.delete').hide();
            $('#create').modal('toggle');
        });

            //edit
        $(document).on('click','.edit-modal',function(){

            $('.form-horizontal').show();
            $('.modal-title').text('Update '+detail_type_s);
            $("#description").attr("disabled", false);
            $('#close').show();
            $('#add').hide();
            $('#edit').show();
            $('#text').val($(this).data('text'));
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
                url:'edittxt_detail',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'detail_type':$('#detail_type').val(),
                    'text':$('#text').val(),
                    'tour_id':$('#tour_id').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.'+ detail_type_n + data.txt_detail.id).replaceWith("<tr class='tb-tnx-item " + detail_type_n + data.txt_detail.id + "'>"+
                    "<td class='tb-tnx-info'>"+
                        "<div class='tb-tnx-info'>"+
                            "<span class='title'>"+ data.txt_detail.text + "</span>"+
                        "</div>"+
                    "</td>"+
                    "<td class='tb-tnx-action'>"+
                        "<div class='dropdown'>"+
                            "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                            "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                "<ul class='link-list-plain'>"+
                                    "<li><a class='show-modal ' data-id='"+ data.txt_detail.id + "' data-detail_type='" + data.txt_detail.detail_type + "' data-text='"+ data.txt_detail.text +"' >View</a></li>"+
                                    "<li><a class='edit-modal ' data-id='" + data.txt_detail.id + "' data-detail_type='" + data.txt_detail.detail_type + "' data-text='"+ data.txt_detail.text +"' >Edit</a></li>"+
                                    "<li><a class='delete-modal ' data-id='" + data.txt_detail.id + "' data-detail_type='" + data.txt_detail.detail_type + "' data-text='"+ data.txt_detail.text +"' >Remove</a></li>"+
                                "</ul>"+
                            "</div>"+
                        "</div>"+
                    "</td>"+
                    "</tr>");
                },
            });
                    
            $('#text').val('');
            $('#create').modal('toggle');
        });



        $(document).on('click', '.delete-modal', function() {
            $('.form-horizontal').show();
            $('.modal-title').text('Delete '+detail_type_s);
            $('.delete').show();
            $('.else').hide();
            $('#id').val($(this).data('id'));
            $('#create').modal('show');
        });

        //delete
        $("#del").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'deletetxt_detail',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.'+ detail_type_n + data.txt_detail).remove();
                },
            });
            
            $('#create').modal('hide');
        });


    </script> 
@endsection