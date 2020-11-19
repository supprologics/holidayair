@extends('layouts.app')

@section('content')  
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">


                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">Posts</h2>
                            <div class="nk-block-des text-soft">
                                <p>All posts.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                                        <em class="icon ni ni-light-fill"></em>
                                        <span>Add New Post</span>
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
                                        <th class="nk-tb-col"><span class="sub-text">Post Name</span></th>
                                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Category</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Country</span></th>
                                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col tb-col-md">
                                            <span class="tb-lead">{{ $blog->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $blog->blog_category->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $blog->country->name }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                                @if ($blog->flag==0)
                                                    <span class="tb-status text-warning">Draft</span>
                                                @elseif($blog->flag==1)
                                                    <span class="tb-status text-success">Published</span>
                                                @endif
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden">
                                                    <a href="" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Publish">
                                                        <em class="icon ni ni-light-fill"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Draft">
                                                        <em class="icon ni ni-list-check"></em>
                                                    </a>
                                                </li>
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{ route('blogs.edit', $blog->id) }}"><em class="icon ni ni-img"></em><span>Edit</span></a></li>
                                                                <li><a onclick="handleDelete({{$blog->id}})"><em class="icon ni ni-repeat"></em><span>Remove</span></a></li>
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

</div><!-- .card-inner -->


@endsection

@section('script')
    <script>
        function handleDelete(id){
            var form= document.getElementById('deleteform')
            form.action='/blogs/'+id
            $('#deleteModal').modal('show')
        }
    </script> 
@endsection