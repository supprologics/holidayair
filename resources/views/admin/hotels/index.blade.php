@extends('layouts.app')

@section('content')  
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">


                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">Hotels</h2>
                            <div class="nk-block-des text-soft">
                                <p>All hotels.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('hotels.create') }}" class="btn btn-primary">
                                        <em class="icon ni ni-light-fill"></em>
                                        <span>Add New Hotel</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-head -->
                </div><!-- .nk-block-head -->
                    
                @include('partials.session')
                <div class="nk-block ">
                    <div class="card card-preview">
                        <div class="card-inner">


                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col"><span class="sub-text">Hotel Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Country</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">City</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Rating</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotels as $hotel)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <img src="{{ asset('storage/'. $hotel->logo) }}" style="overflow: hidden; width:50px; height:50px" alt="">
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $hotel->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $hotel->hotelcategory->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $hotel->country->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $hotel->city }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $hotel->rating }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                                @if ($hotel->flag==0)
                                                    <span class="tb-status text-danger">Draft</span>
                                                @elseif($hotel->flag==1)
                                                    <span class="tb-status text-warning">Published</span>
                                                @elseif($hotel->flag==2)
                                                    <span class="tb-status text-success">Recommended</span>
                                                @elseif($hotel->flag==3)
                                                    <span class="tb-status text-success">Travelers Choice</span>
                                                @endif
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('hotels.published',$hotel->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Published">
                                                        <em class="icon ni ni-cross-fill-c"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('hotels.draft',$hotel->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Draft">
                                                        <em class="icon ni ni-list-check"></em>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{ route('hotels.travelerchoice', $hotel->id) }}"><em class="icon ni ni-light"></em><span>Travelers Choice</span></a></li>
                                                                <li><a href="{{ route('hotels.recommended', $hotel->id) }}"><em class="icon ni ni-light"></em><span>Recommended</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ route('hotelamenities.index',$hotel->id) }}"><em class="icon ni ni-repeat"></em><span>Amenities</span></a></li>
                                                                <li><a href="{{ route('hotelgalleryview', $hotel->id) }}"><em class="icon ni ni-img"></em><span>Gallery</span></a></li>
                                                                <li><a href="{{ route('rooms.setrooms',$hotel->id) }}"><em class="icon ni ni-repeat"></em><span>Rooms</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ route('hotels.edit', $hotel->id) }}"><em class="icon ni ni-light"></em><span>Hotel Full View</span></a></li>
                                                                <li><a role="button" onclick="handleDelete({{$hotel->id}})"><em class="icon ni ni-light"></em><span>Delete Hotel</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Alert -->
<div class="modal fade" tabindex="-1"  role="dialog" id="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" id="deleteform">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-alert bg-warning"></em>
                        <h4 class="nk-modal-title">Delete Category!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this category ?</div>
                            <span class="sub-text-sm">This action can not be revert.</span>
                        </div>
                        <div class="nk-modal-action">
                            <button type="button" class="btn-lg btn-mw btn-primary" data-dismiss="modal">No, Go back</button>
                            <button type="submit" class="btn-lg btn-mw btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        function handleDelete(id){
            var form= document.getElementById('deleteform')
            form.action='/hotels/'+id
            $('#deleteModal').modal('show')
        }
    </script> 
@endsection