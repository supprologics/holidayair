@extends('layouts.app')

@section('content')  


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">

            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">{{ isset($tour)?'Update':'Add' }} Tour</h2>
                            <div class="nk-block-des text-soft">
                                <p>All fields are required.</p>
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ route('tours.index') }}" class="btn btn-primary">
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
                                <h5 class="card-title">{{ isset($tour)?'Edit':'New' }} Tour Setup</h5>
                            </div>
                            <form action="{{ isset($tour)? route('tours.update',$tour->id):route('tours.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                                {{ csrf_field() }}
                                @if (isset($tour))
                                    {{ method_field('PUT') }}
                                @endif
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Tour Category</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="category_id" id="category_id" data-search="on">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (isset($tour))
                                                                @if ($category->id==$tour->category_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" name="country_id" id="country_id" data-search="on">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            @if (isset($tour))
                                                                @if ($country->id==$tour->country_id)
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Tour Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($tour)?$tour->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Tour Description</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" style="width: 100" name="description" id="description" cols="30" rows="10">{{ isset($tour)?$tour->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Duration</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="off" name="duration" id="duration">
                                                        <option value="Overnight"
                                                            @if (isset($tour))
                                                                @if ($tour->duration=='Overnight')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >Overnight</option>
                                                        <option value="FullDay"
                                                            @if (isset($tour))
                                                                @if ($tour->duration=='FullDay')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >Full Day</option>
                                                        <option value="HalfDay"
                                                            @if (isset($tour))
                                                                @if ($tour->duration=='HalfDay')
                                                                    selected
                                                                @endif
                                                            @endif
                                                        >Half Day</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Days</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="on" name="days" id="days">
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
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Nights</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="on" name="nights" id="nights">
                                                        <option value="0" @if (isset($tour)) @if ($tour->duration=='0')  selected  @endif @endif >0</option>
                                                        <option value="1" @if (isset($tour)) @if ($tour->duration=='1')  selected  @endif @endif >1</option>
                                                        <option value="2" @if (isset($tour)) @if ($tour->duration=='2')  selected  @endif @endif >2</option>
                                                        <option value="3" @if (isset($tour)) @if ($tour->duration=='3')  selected  @endif @endif >3</option>
                                                        <option value="4" @if (isset($tour)) @if ($tour->duration=='4')  selected  @endif @endif >4</option>
                                                        <option value="5" @if (isset($tour)) @if ($tour->duration=='5')  selected  @endif @endif >5</option>
                                                        <option value="6" @if (isset($tour)) @if ($tour->duration=='6')  selected  @endif @endif >6</option>
                                                        <option value="7" @if (isset($tour)) @if ($tour->duration=='7')  selected  @endif @endif >7</option>
                                                        <option value="8" @if (isset($tour)) @if ($tour->duration=='8')  selected  @endif @endif >8</option>
                                                        <option value="9" @if (isset($tour)) @if ($tour->duration=='9')  selected  @endif @endif >9</option>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Amount</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control"  name="amount" id="amount" value="{{ isset($tour)?$tour->amount:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Ratings</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control"  name="rating" id="rating" value="{{ isset($tour)?$tour->rating:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount-1">Hits</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="hits" id="hits" value="{{ isset($tour)?$tour->hits:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"  name="is_highlight" id="is_highlight" value='1'
                                            @if (isset($tour))
                                                @if ($tour->is_highlight=='1')
                                                    checked
                                                @endif
                                            @endif>
                                            <label class="custom-control-label" for="is_highlight">As Highlighted</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="online" id="online" value='1'
                                            @if (isset($tour))
                                                @if ($tour->online=='1')
                                                    checked
                                                @endif
                                            @endif>
                                            <label class="custom-control-label" for="online">Is Actived</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save"></em><span>Save and Next</span> </button>
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