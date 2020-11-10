@extends('layouts.app')

@section('content') 


    
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-description">

                @include('partials.header',[
                    'header'=>'Route for '.$tour->name,
                    'icon'=>'ni-plus',
                    'button'=>'Add New Location',
                    'button_id'=>'add-location',
                ])
                    
                @include('partials.error')


                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Locations</h5>
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
                                                    <span>Location Name</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span>Location Latitude</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span>Location Longitude</span>
                                                </span>
                                            </th>
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-info d-none d-sm-inline-block">
                                                    <span>Go Order</span>
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
                                        @if ($areas->count()==0)
                                            
                                            <tr class="tb-tnx-item area0 ">
                                                <td class="tb-tnx-info  ">
                                                    NO LOCATIONS YET!
                                                </td>
                                            </tr><!-- tb-tnx-item -->
                                        @endif
                                        @foreach ($areas as $area)
                                            <tr class="tb-tnx-item area{{ $area->id }}">
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $area->name }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $area->lat }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $area->lng }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-info">
                                                    <div class="tb-tnx-info">
                                                        <span class="title">{{ $area->go_order }}</span>
                                                    </div>
                                                </td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a class="edit-modal " data-id="{{ $area->id}}" data-name="{{ $area->name}}" data-lat="{{ $area->lat}}" data-lng="{{ $area->lng}}"  data-go_order="{{ $area->go_order}}" >Edit</a></li>
                                                                <li><a class="delete-modal " data-id="{{ $area->id}}" data-name="{{ $area->name}}" data-lat="{{ $area->lat}}" data-lng="{{ $area->lng}}"  data-go_order="{{ $area->go_order}}" >Remove</a></li>
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
                                                        <h4 class="nk-modal-title">Delete Location!</h4>
                                                        <div class="nk-modal-text">
                                                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this data ?</div>
                                                            <span class="sub-text-sm">This action can not be revert.</span>
                                                        </div>
                                                        <div class="nk-modal-action">
                                                            <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                                                            <button type="button" id="del-route" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                                                        </div>
                                                    </div>

                                                    <div class="show">
                                                        <div class="form-group">
                                                            <label class="form-label" for="Location Name">Location Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control name_update" id="name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-md btn-primary" id="edit_search"><em class="icon ni ni-search"></em><span>Search Location</span></button>
                                                        </div>
                                                        <div class="form-group" id="address">
                                                            <label class="form-label" for="Location Name">Location Address as Google</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="add" name="add" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="form-label" for="Latitude">Latitude</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="lat" name="lat">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <label class="form-label" for="Longitude">Longitude</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="long" name="long">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="form-label">Go Order</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select form-control form-control-lg" data-search="on" name="go_order" id="go_order">
                                                                        <option value="1" @if (isset($tour)) @if ($tour->duration=='1')  selected  @endif @endif >1</option>
                                                                        <option value="2" @if (isset($tour)) @if ($tour->duration=='2')  selected  @endif @endif >2</option>
                                                                        <option value="3" @if (isset($tour)) @if ($tour->duration=='3')  selected  @endif @endif >3</option>
                                                                        <option value="4" @if (isset($tour)) @if ($tour->duration=='4')  selected  @endif @endif >4</option>
                                                                        <option value="5" @if (isset($tour)) @if ($tour->duration=='5')  selected  @endif @endif >5</option>
                                                                        <option value="6" @if (isset($tour)) @if ($tour->duration=='6')  selected  @endif @endif >6</option>
                                                                        <option value="7" @if (isset($tour)) @if ($tour->duration=='7')  selected  @endif @endif >7</option>
                                                                        <option value="8" @if (isset($tour)) @if ($tour->duration=='8')  selected  @endif @endif >8</option>
                                                                        <option value="9" @if (isset($tour)) @if ($tour->duration=='9')  selected  @endif @endif >9</option>
                                                                        <option value="10" @if (isset($tour)) @if ($tour->duration=='10')  selected  @endif @endif >10</option>
                                                                        
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary" id="update"><em class="icon ni ni-save"></em><span>Update Location</span></button>
                                                            <button type="submit" class="btn btn-lg btn-primary" id="save"><em class="icon ni ni-save"></em><span>Save Location</span></button>
                                                            <button data-dismiss="modal" class="btn btn-lg btn-primary" ><em class="icon ni ni-back-arrow-fill"></em><span>Go Back</span></button>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="id" id="id" value="">
                                                    <div class="else">
                                                        <input type="hidden" name="tour_id" id="tour_id" value="{{ $tour->id }}">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email-address">Location Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="name_search" name="name_search">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary" id="search"><em class="icon ni ni-search"></em><span>Search Location</span></button>
                                                            <button type="submit" class="btn btn-lg btn-primary" id="edit"><em class="icon ni ni-save"></em><span>Save Location</span></button>
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
                            <a href="{{ route('galleryview' ,$tour->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Previous</span>
                            </a>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('tours.active',$tour->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-list-check"></em>
                                <span>Keep as Active Tour</span>
                            </a>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('tours.publish',$tour->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-light"></em>
                                <span>Publish Tour</span>
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

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script> 

    <script>

        $(document).on('click','.create-modal',function(){
            $('.form-horizontal').show();
            $('.modal-title').text('Add New Location');
            $('#close').show();
            $('#search').show();
            $('#save').show();
            $('#edit').hide();
            $('.else').show();
            $('.show').hide();
            $('.delete').hide();
            $('#name_search').val('');
            $('#name').val('');
            $('#add').val('');
            $('#lat').val('');
            $('#long').val('');
            $('#create').modal('show');
        });
        //search
        $("#search").click(function(e){
            e.preventDefault();
            geocode();
        });

        function geocode(){

            if($('.name_update').val()){
                var location = $('.name_update').val();
                $('#update').show();
            }
            else{
                var location = $('#name_search').val();
                $('#update').hide();
            }

            axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
                params:{
                address:location,
                key:'AIzaSyAfRSnupQVtH1oegEPhsMmgHeSsy4cn-kU'
                }
            })
            .then(function(response){
                // Log full response
                console.log(response);

                $('#name').val(location);
                $('#address').show();
                $('#add').val(response.data.results[0].formatted_address);
                $('#lat').val(response.data.results[0].geometry.location.lat);
                $('#long').val(response.data.results[0].geometry.location.lng);
                $('.else').hide();
                $('#edit_search').hide();
                $('.show').show();

               
            })
            .catch(function(error){
                console.log(error);
            });
        }


        $("#save").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'addroute',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name').val(),
                    'tour_id':$('#tour_id').val(),
                    'lat':$('#lat').val(),
                    'long':$('#long').val(),
                    'go_order':$('#go_order').val(),
                },
                success:function(data){
                    if((data.errors)){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors);
                    }
                    
                    else {
                        $('.error').remove();
                        $('.area0').remove();
                        $('#table').append("<tr class='tb-tnx-item area" + data.route.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='name'>"+ data.route.name + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='lat'>"+ data.route.lat + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='long'>"+ data.route.lng + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='long'>"+ data.route.go_order + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-action'>"+
                            "<div class='dropdown'>"+
                                "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                    "<ul class='link-list-plain'>"+
                                        "<li><a class='edit-modal ' data-id='" + data.route.id + "' data-name='" + data.route.name + "' data-lat='"+ data.route.lat + "' data-lng='"+ data.route.lng  + "' data-go_order='"+ data.route.go_order +"' >Edit</a></li>"+
                                        "<li><a class='delete-modal ' data-id='" + data.route.id + "' data-name='" + data.route.name + "' data-lat='"+ data.route.lat + "' data-lng='"+ data.route.lng  + "' data-go_order='"+ data.route.go_order +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                        "</tr>");
                    }
                },
            });
                    
            $('#name').val('');
            $('#lat').val('');
            $('#long').val('');
            $('#add').val('');
            $('#update').hide();
            $('#create').modal('toggle');
        });

        //edit
        $(document).on('click','.edit-modal',function(){

            $('.form-horizontal').show();
            $('.modal-title').text('Update Route');
            $('#close').show();
            $('#address').hide();
            $('#save').hide();
            $('#edit').hide();
            $('#name').val($(this).data('name'));
            $('#lat').val($(this).data('lat'));
            $('#long').val($(this).data('lng'));
            $('#go_order').val($(this).data('go_order'));
            $('#id').val($(this).data('id'));
            $('#edit_search').show();
            $('#update').show();
            $('.show').show();
            $('.else').hide();
            $('.delete').hide();
            $('#create').modal('show');
        });

        //search
        $("#edit_search").click(function(e){
            e.preventDefault();
            geocode();
        });

        $("#update").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'editroute',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name').val(),
                    'tour_id':$('#tour_id').val(),
                    'lat':$('#lat').val(),
                    'long':$('#long').val(),
                    'go_order':$('#go_order').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.area' + data.route.id).replaceWith("<tr class='tb-tnx-item area" + data.route.id + "'>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='name'>"+ data.route.name + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='lat'>"+ data.route.lat + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='long'>"+ data.route.lng + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-info'>"+
                            "<div class='tb-tnx-info'>"+
                                "<span class='long'>"+ data.route.go_order + "</span>"+
                            "</div>"+
                        "</td>"+
                        "<td class='tb-tnx-action'>"+
                            "<div class='dropdown'>"+
                                "<a class='text-soft dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>"+
                                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-xs'>"+
                                    "<ul class='link-list-plain'>"+
                                        "<li><a class='edit-modal ' data-id='" + data.route.id + "' data-name='" + data.route.name + "' data-lat='"+ data.route.lat + "' data-lng='"+ data.route.lng  + "' data-go_order='"+ data.route.go_order +"' >Edit</a></li>"+
                                        "<li><a class='delete-modal ' data-id='" + data.route.id + "' data-name='" + data.route.name + "' data-lat='"+ data.route.lat + "' data-lng='"+ data.route.lng  + "' data-go_order='"+ data.route.go_order +"' >Remove</a></li>"+
                                    "</ul>"+
                                "</div>"+
                            "</div>"+
                        "</td>"+
                    "</tr>");
                },
            });
                    
            $('#name').val('');
            $('#add').val('');
            $('#lat').val('');
            $('#long').val('');
            $('#go_order').val('');
            $('#create').modal('toggle');
        });

        $(document).on('click', '.delete-modal', function() {
            $('.form-horizontal').show();
            $('.modal-title').text('Delete Location');
            $('.delete').show();
            $('.else').hide();
            $('.show').hide();
            $('#id').val($(this).data('id'));
            $('#create').modal('show');
        });

        //delete
        $("#del-route").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'deleteroute',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#id').val()
                },
                success:function(data){
                    $('.area' + data.route).remove();
                },
            });
            
            $('#create').modal('hide');
        });


    </script> 
@endsection