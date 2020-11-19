@extends('layouts.app')

@section('content')  
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-description">

                @include('partials.header',[
                    'header'=>'Deal Rules for '.$deal->name,
                    'icon'=>'ni-plus',
                    'button'=>'Add New Deal Rule',
                    'button_id'=>'add-deal-rule',
                ])
                    
                @include('partials.error')


                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Deal Rules</h5>
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
                                                    <span> Title</span>
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
                                        @if ($dealrules->count()==0)
                                            
                                            <tr class="tb-tnx-item dealrule0 center">
                                                <td class="tb-tnx-info center text-center ">
                                                    NO DEAL RULES YET!
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endif
                                        @foreach ($dealrules as $dealrule)
                                            <tr class="tb-tnx-item dealrule{{$dealrule->id}}">
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $dealrule->title }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a class="show-modal " data-id="{{ $dealrule->id}}" data-title="{{ $dealrule->title}}" data-description="{{ $dealrule->description}}" >View</a></li>
                                                                <li><a class="edit-modal " data-id="{{ $dealrule->id}}" data-title="{{ $dealrule->title}}" data-description="{{ $dealrule->description}}" >Edit</a></li>
                                                                <li><a class="delete-modal " data-id="{{ $dealrule->id}}" data-title="{{ $dealrule->title}}" data-description="{{ $dealrule->description}}" >Remove</a></li>
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
                                                        <h4 class="nk-modal-title">Delete Deal Rule!</h4>
                                                        <div class="nk-modal-text">
                                                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this deal rule ?</div>
                                                            <span class="sub-text-sm">This action can not be revert.</span>
                                                        </div>
                                                        <div class="nk-modal-action">
                                                            <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                                            <button type="button" id="del-dealrule" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
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
                                                            <label class="form-label" for="title">Title</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="title" name="title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address">Description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea name="description" id="description" cols="" rows="5" class="form-control" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary" id="add"><em class="icon ni ni-save"></em><span>Save Deal Rule</span></button>
                                                            <button type="submit" class="btn btn-lg btn-primary" id="edit"><em class="icon ni ni-save"></em><span>Save Deal Rule</span></button>
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
                            <a href="{{ route('setflightplan',$deal->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Previous</span>
                            </a>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('dealgalleryview',$deal->id) }}" class="btn btn-primary">
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
            $('.modal-title').text('Add Deal Rule');
            $("#title").attr("disabled", false);
            $("#description").attr("disabled", false);
            $('#close').show();
            $('#add').show();
            $('#edit').hide();
            $('.else').show();
            $('.delete').hide();
            $('.show-modal').hide();
            $('#title').val('');
            $('#description').val('');
            $('#create').modal('show');
        });
        //add
        $("#add").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'adddealrule',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'title':$('#title').val(),
                    'description':$('#description').val(),
                    'deal_id':$('#deal_id').val()
                },
                success:function(data){
                    if((data.errors)){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors);
                    }
                    
                    else {
                        $('.error').remove();
                        $('.dealrule0').remove();
                        $('#table').append("<tr class='tb-tnx-item dealrule" + data.dealrule.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='title'>"+ data.dealrule.title + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-action'>"+
                            "<div class='dropdown'>"+
                                "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                    "<ul class='link-list-plain'>"+
                                        "<li><a class='show-modal ' data-id='"+ data.dealrule.id + "' data-title='" + data.dealrule.title + "' data-description='"+ data.dealrule.description +"' >View</a></li>"+
                                        "<li><a class='edit-modal ' data-id='" + data.dealrule.id + "' data-title='" + data.dealrule.title + "' data-description='"+ data.dealrule.description +"' >Edit</a></li>"+
                                        "<li><a class='delete-modal ' data-id='" + data.dealrule.id + "' data-title='" + data.dealrule.title + "' data-description='"+ data.dealrule.description +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                        "</tr>");
                    }
                },
            });
                    
            $('#title').val('');
            $('#description').val('');
            $('#create').modal('toggle');
        });



        // Show function
        $(document).on('click', '.show-modal', function() {
            $('#show-title').text($(this).data('title'));
            $('#show-desc').text($(this).data('description'));
            $("#title").attr("disabled", true);
            $("#description").attr("disabled", true);
            $('.modal-title').text('Show Itinerary');
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
            $('.modal-title').text('Update Itinerary');
            $("#title").attr("disabled", false);
            $("#description").attr("disabled", false);
            $('#close').show();
            $('#add').hide();
            $('#edit').show();
            $('#title').val($(this).data('title'));
            $('#description').val($(this).data('description'));
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
                url:'editdealrule',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'title':$('#title').val(),
                    'description':$('#description').val(),
                    'deal_id':$('#deal_id').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.dealrule' + data.dealrule.id).replaceWith("<tr class='tb-tnx-item dealrule" + data.dealrule.id + "'>"+
                    "<td class='tb-tnx-info'>"+
                        "<div class='tb-tnx-info'>"+
                            "<span class='title'>"+ data.dealrule.title + "</span>"+
                        "</div>"+
                    "</td>"+
                    "<td class='tb-tnx-action'>"+
                        "<div class='dropdown'>"+
                            "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                            "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                "<ul class='link-list-plain'>"+
                                    "<li><a class='show-modal ' data-id='"+ data.dealrule.id + "' data-title='" + data.dealrule.title + "' data-description='"+ data.dealrule.description +"' >View</a></li>"+
                                    "<li><a class='edit-modal ' data-id='" + data.dealrule.id + "' data-title='" + data.dealrule.title + "' data-description='"+ data.dealrule.description +"' >Edit</a></li>"+
                                    "<li><a class='delete-modal ' data-id='" + data.dealrule.id + "' data-title='" + data.dealrule.title + "' data-description='"+ data.dealrule.description +"' >Remove</a></li>"+
                                "</ul>"+
                            "</div>"+
                        "</div>"+
                    "</td>"+
                    "</tr>");
                },
            });
                    
            $('#title').val('');
            $('#description').val('');
            $('#create').modal('toggle');
        });



        $(document).on('click', '.delete-modal', function() {
            $('.form-horizontal').show();
            $('.modal-title').text('Delete Itinerary');
            $('.delete').show();
            $('.else').hide();
            $('#id').val($(this).data('id'));
            $('#create').modal('show');
        });

        //delete
        $("#del-dealrule").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'deletedealrule',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.dealrule' + data.dealrule).remove();
                },
            });
            
            $('#create').modal('hide');
        });


    </script> 
@endsection