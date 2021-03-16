@extends('layouts.app')

@section('content')
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Blog Categories</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total {{ $blog_categories->count() }} categories.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li class="nk-block-tools-opt">
                                                    <a href="{{ route('blogcategories.create') }}" class="btn btn-primary">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>Add New Blog Category</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                
                                @include('partials.session')
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h5 class="title">All Blog Categories</h5>
                                                    </div>
                                                </div><!-- .card-title-group -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <table class="table table-tranx">
                                                    <thead>
                                                        <tr class="tb-tnx-head">
                                                            <th class="tb-tnx-id"><span class="">#</span></th>
                                                            <th class="tb-tnx-info">
                                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                    <span>Category Name</span>
                                                                </span>
                                                            </th>
                                                            <th class="tb-tnx-info">
                                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                                    <span class="d-md-none">Date</span>
                                                                    <span class="d-none d-md-block">
                                                                        <span>Created Date</span>
                                                                        <span>Updated Date</span>
                                                                    </span>
                                                                </span>
                                                            </th>
                                                            <th class="tb-tnx-action">
                                                                <span>&nbsp;</span>
                                                            </th>
                                                        </tr><!-- tb-tnx-item -->
                                                        
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($blog_categories as $blog_category)
                                                            <tr class="tb-tnx-item">
                                                                <td class="tb-tnx-id">
                                                                    <a href="#"><span>{{ $blog_category->id }}</span></a>
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    <div class="tb-tnx-desc">
                                                                        <span class="title">{{ $blog_category->name }}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="tb-tnx-info">
                                                                    <div class="tb-tnx-date">
                                                                        <span class="date">{{ $blog_category->created_at }}</span>
                                                                        <span class="date">{{ $blog_category->updated_at }}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="tb-tnx-action">
                                                                    <div class="dropdown">
                                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                            <ul class="link-list-plain">
                                                                                <li><a href="{{ route('blogcategories.edit',$blog_category->id)}}">Edit</a></li>
                                                                                <li><a role="button" onclick="handleDelete({{$blog_category->id}})">Remove</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr><!-- tb-tnx-item -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
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

                                            </div><!-- .card-inner -->
                                            
                                            <div class="card-inner"><!--
                                                <ul class="pagination justify-content-center justify-content-md-start">
                                                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul> -->
                                            </div> 
                                             
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->    
@endsection

@section('script')
    <script>
        function handleDelete(id){
            var form= document.getElementById('deleteform')
            form.action='/blogcategories/'+id
            $('#deleteModal').modal('show')
        }
    </script> 
@endsection