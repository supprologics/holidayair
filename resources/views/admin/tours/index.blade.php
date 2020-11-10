@extends('layouts.app')

@section('content')  
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">


                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">Tours</h2>
                            <div class="nk-block-des text-soft">
                                <p>All tours.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('tours.create') }}" class="btn btn-primary">
                                        <em class="icon ni ni-light-fill"></em>
                                        <span>Add New Tour</span>
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
                                        <th class="nk-tb-col"><span class="sub-text">Tour Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Country</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Duration</span></th>
                                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Amount</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Rating</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tours as $tour)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-lead">{{ $tour->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $tour->category->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $tour->country->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $tour->duration }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $tour->amount }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $tour->rating }} Stars</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                                @if ($tour->online==0)
                                                    <span class="tb-status text-danger">Inactive</span>
                                                @elseif($tour->online==1)
                                                    <span class="tb-status text-warning">Active</span>
                                                @elseif($tour->online==2)
                                                    <span class="tb-status text-success">Published</span>
                                                @endif
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('tours.publish',$tour->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Publish">
                                                        <em class="icon ni ni-light-fill"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('tours.active',$tour->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Active">
                                                        <em class="icon ni ni-list-check"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{ route('tours.inactive',$tour->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Inactive">
                                                        <em class="icon ni ni-cross-fill-c"></em>
                                                    </a>
                                                </li>
                                                <li>
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{ route('tours.edit', $tour->id) }}"><em class="icon ni ni-light"></em><span>Tour Full View</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ route('setitineraries', $tour->id) }}"><em class="icon ni ni-eye"></em><span>Itineraries</span></a></li>
                                                                <li><a href="{{ route('setinculdes', $tour->id) }}"><em class="icon ni ni-unarchive"></em><span>Includes</span></a></li>
                                                                <li><a href="{{ route('setexcludes', $tour->id) }}"><em class="icon ni ni-archive"></em><span>Excludes</span></a></li>
                                                                <li><a href="{{ route('setconditions', $tour->id) }}"><em class="icon ni ni-shield-star"></em><span>Conditions</span></a></li>
                                                                <li><a href="{{ route('setcancellations', $tour->id) }}"><em class="icon ni ni-shield-off"></em><span>Cancellations</span></a></li>
                                                                <li><a href="{{ route('sethints', $tour->id) }}"><em class="icon ni ni-notes"></em><span>Hints</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ route('galleryview', $tour->id) }}"><em class="icon ni ni-img"></em><span>Gallery</span></a></li>
                                                                <li><a href="{{ route('route.index', $tour->id) }}"><em class="icon ni ni-repeat"></em><span>Route</span></a></li>
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
@endsection