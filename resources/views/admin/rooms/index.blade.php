@extends('layouts.app')

@section('content')  
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">


                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                        <h2 class="nk-block-title page-title">Rooms for {{ $hotel->name }}</h2>
                            <div class="nk-block-des text-soft">
                                <p>All rooms.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt"><a href="{{ route('rooms.createrooom',$hotel->id) }}" class="btn btn-primary  text-white"><em class="icon ni ni-plus"></em><span>Add New Room</span></a></li>
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
                                        <th class="nk-tb-col"><span class="sub-text">Room Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Amount</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Rooms</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Adults</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                    <img src="{{ asset('storage/'. $room->image) }}" style="overflow: hidden; width:50px; height:50px" alt="">
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $room->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $room->amount }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $room->rooms }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $room->adults }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                                @if ($room->flag==0)
                                                    <span class="tb-status text-danger">Draft</span>
                                                @elseif($room->flag==1)
                                                    <span class="tb-status text-warning">Published</span>
                                                @elseif($room->flag==2)
                                                    <span class="tb-status text-success">Best Choice</span>
                                                @endif
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('rooms.publishedroom',$room->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Published">
                                                        <em class="icon ni ni-cross-fill-c"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('rooms.draftroom',$room->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Draft">
                                                        <em class="icon ni ni-list-check"></em>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{ route('rooms.bestroom', $room->id) }}"><em class="icon ni ni-light"></em><span>Best Choice</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ route('rooms.edit', $room->id) }}"><em class="icon ni ni-light"></em><span>Room Full View</span></a></li>
                                                                <li><a role="button" onclick="handleDelete({{$room->id}})"><em class="icon ni ni-light"></em><span>Delete Room</span></a></li>
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
                        <h4 class="nk-modal-title">Delete Room!</h4>
                        <div class="nk-modal-text">
                            <div class="caption-text">Are you sure, you want to <strong>delete</strong> this room ?</div>
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
            form.action='/rooms/'+id
            $('#deleteModal').modal('show')
        }
    </script> 
@endsection