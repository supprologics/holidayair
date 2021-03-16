@extends('layouts.app')



@section('content')  


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">{{ isset($post)?'Update':'Add' }} Post</h2>
                            <div class="nk-block-des text-soft">
                                <p>* fields are required.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('blogs.index') }}" class="btn btn-primary">
                                        <em class="icon ni ni-arrow-left"></em>
                                        <span>Back</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-head -->
                </div><!-- .nk-block-head -->
                    
                @include('partials.session')
                @include('partials.error')
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">{{ isset($post)?'Edit':'New' }} Post Setup</h5>
                            </div>
                            <form action="{{ isset($post)? route('blogs.update',$post->id):route('blogs.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                                {{ csrf_field() }}
                                @if (isset($post))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="row g-4">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Blog Category *</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="blog_category_id" id="blog_category_id" data-search="on">
                                                    @foreach ($blogcategories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (isset($post))
                                                                @if ($category->id==$post->blog_category_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Post Name *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($post)?$post->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Short Description *</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control"  name="description_short" id="description_short" cols="30" rows="2">{{ isset($post)?$post->description_short:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Post Content *</label>
                                            <div class="form-control-wrap">
                                                <textarea class="summernote-minimal"  name="description_full" id="description_full" cols="30" rows="10">{{ isset($post)?$post->description_full:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Post Tags</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="tags" id="tags" value="{{ isset($post)?$post->tags:'' }}">
                                            </div>
                                        </div>
                                    </div>


                                    

                            
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save"></em><span>Save & Next</span> </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
    <link rel="stylesheet" href="{{ asset('admin-assets/css/editors/summernote.css?ver=2.0.0')}}">
    <script src="{{ asset('admin-assets/js/libs/editors/summernote.js?ver=2.0.0')}}"></script>
    <script src="{{ asset('admin-assets/js/editors.js?ver=2.0.0')}}"></script>



@endsection