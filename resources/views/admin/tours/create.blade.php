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
                                <p>* fields are required.</p>
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
                                            <label class="form-label" for="category_id">Tour Category *</label>
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
                                            <label class="form-label" for="country_id">Country *</label>
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
                                            <label class="form-label" for="name">Tour Name *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($tour)?$tour->name:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Tour Description *</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" style="width: 100" name="description" id="description" cols="30" rows="10">{{ isset($tour)?$tour->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="duration">Duration *</label>
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
                                            <label class="form-label" for="days">Days *</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="on" name="days" id="days">
                                                        <option value="1" @if (isset($tour)) @if ($tour->days=='1')  selected  @endif @endif >1</option>
                                                        <option value="2" @if (isset($tour)) @if ($tour->days=='2')  selected  @endif @endif >2</option>
                                                        <option value="3" @if (isset($tour)) @if ($tour->days=='3')  selected  @endif @endif >3</option>
                                                        <option value="4" @if (isset($tour)) @if ($tour->days=='4')  selected  @endif @endif >4</option>
                                                        <option value="5" @if (isset($tour)) @if ($tour->days=='5')  selected  @endif @endif >5</option>
                                                        <option value="6" @if (isset($tour)) @if ($tour->days=='6')  selected  @endif @endif >6</option>
                                                        <option value="7" @if (isset($tour)) @if ($tour->days=='7')  selected  @endif @endif >7</option>
                                                        <option value="8" @if (isset($tour)) @if ($tour->days=='8')  selected  @endif @endif >8</option>
                                                        <option value="9" @if (isset($tour)) @if ($tour->days=='9')  selected  @endif @endif >9</option>
                                                        <option value="10" @if (isset($tour)) @if ($tour->days=='10')  selected  @endif @endif >10</option>
                                                        <option value="11" @if (isset($tour)) @if ($tour->days=='11')  selected  @endif @endif >11</option>
                                                        <option value="12" @if (isset($tour)) @if ($tour->days=='12')  selected  @endif @endif >12</option>
                                                        <option value="13" @if (isset($tour)) @if ($tour->days=='13')  selected  @endif @endif >13</option>
                                                        <option value="14" @if (isset($tour)) @if ($tour->days=='14')  selected  @endif @endif >14</option>
                                                        <option value="15" @if (isset($tour)) @if ($tour->days=='15')  selected  @endif @endif >15</option>
                                                        <option value="16" @if (isset($tour)) @if ($tour->days=='16')  selected  @endif @endif >16</option>
                                                        <option value="17" @if (isset($tour)) @if ($tour->days=='17')  selected  @endif @endif >17</option>
                                                        <option value="18" @if (isset($tour)) @if ($tour->days=='18')  selected  @endif @endif >18</option>
                                                        <option value="19" @if (isset($tour)) @if ($tour->days=='19')  selected  @endif @endif >19</option>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="nights">Nights *</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg" data-search="on" name="nights" id="nights">
                                                        <option value="0" @if (isset($tour)) @if ($tour->nights=='0')  selected  @endif @endif >0</option>
                                                        <option value="1" @if (isset($tour)) @if ($tour->nights=='1')  selected  @endif @endif >1</option>
                                                        <option value="2" @if (isset($tour)) @if ($tour->nights=='2')  selected  @endif @endif >2</option>
                                                        <option value="3" @if (isset($tour)) @if ($tour->nights=='3')  selected  @endif @endif >3</option>
                                                        <option value="4" @if (isset($tour)) @if ($tour->nights=='4')  selected  @endif @endif >4</option>
                                                        <option value="5" @if (isset($tour)) @if ($tour->nights=='5')  selected  @endif @endif >5</option>
                                                        <option value="6" @if (isset($tour)) @if ($tour->nights=='6')  selected  @endif @endif >6</option>
                                                        <option value="7" @if (isset($tour)) @if ($tour->nights=='7')  selected  @endif @endif >7</option>
                                                        <option value="8" @if (isset($tour)) @if ($tour->nights=='8')  selected  @endif @endif >8</option>
                                                        <option value="9" @if (isset($tour)) @if ($tour->nights=='9')  selected  @endif @endif >9</option>
                                                        <option value="10" @if (isset($tour)) @if ($tour->nights=='10')  selected  @endif @endif >10</option>
                                                        <option value="11" @if (isset($tour)) @if ($tour->nights=='11')  selected  @endif @endif >11</option>
                                                        <option value="12" @if (isset($tour)) @if ($tour->nights=='12')  selected  @endif @endif >12</option>
                                                        <option value="13" @if (isset($tour)) @if ($tour->nights=='13')  selected  @endif @endif >13</option>
                                                        <option value="14" @if (isset($tour)) @if ($tour->nights=='14')  selected  @endif @endif >14</option>
                                                        <option value="15" @if (isset($tour)) @if ($tour->nights=='15')  selected  @endif @endif >15</option>
                                                        <option value="16" @if (isset($tour)) @if ($tour->nights=='16')  selected  @endif @endif >16</option>
                                                        <option value="17" @if (isset($tour)) @if ($tour->nights=='17')  selected  @endif @endif >17</option>
                                                        <option value="18" @if (isset($tour)) @if ($tour->nights=='18')  selected  @endif @endif >18</option>
                                                        
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="amount">Amount *</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control"  name="amount" id="amount" value="{{ isset($tour)?$tour->amount:'' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label" for="rating">Ratings</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control"  name="rating" id="rating" value="{{ isset($tour)?$tour->rating:'5' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label" for="hits">Hits</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="hits" id="hits" value="{{ isset($tour)?$tour->hits:'0' }}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary " type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Set Discount</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary " type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Set Tour Deactive Season</button>
                                    </div>

                                    <div class="collapse multi-collapse col-12" id="multiCollapseExample2">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="discount">Discount Precentage</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-text-hint">
                                                            <span class="overline-title">%</span>
                                                        </div>
                                                        <input type="text" class="form-control"  name="discount" id="discount" value="{{ isset($tour)?$tour->discount:'' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="discounton">Active From</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-calender-date"></em>
                                                        </div>
                                                        <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="discounton" id="discounton" value="{{ isset($tour)?$tour->discounton:'' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="discountout">To</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-calender-date"></em>
                                                        </div>
                                                        <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="discountout" id="discountout" value="{{ isset($tour)?$tour->discountout:'' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse multi-collapse col-12" id="multiCollapseExample1">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="seasonon">Tour Deactive From</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select form-control form-control-lg" data-search="on" name="seasonon" id="seasonon">
                                                                <option  value="0"  @if (!isset($tour->seasonon)) selected @endif>Active From</option>
                                                                <option value="1" @if (isset($tour->seasonon)) @if ($tour->seasonon=='1')  selected  @endif @endif >January</option>
                                                                <option value="2" @if (isset($tour->seasonon)) @if ($tour->seasonon=='2')  selected  @endif @endif >February</option>
                                                                <option value="3" @if (isset($tour->seasonon)) @if ($tour->seasonon=='3')  selected  @endif @endif >March</option>
                                                                <option value="4" @if (isset($tour->seasonon)) @if ($tour->seasonon=='4')  selected  @endif @endif >April</option>
                                                                <option value="5" @if (isset($tour->seasonon)) @if ($tour->seasonon=='5')  selected  @endif @endif >May</option>
                                                                <option value="6" @if (isset($tour->seasonon)) @if ($tour->seasonon=='6')  selected  @endif @endif >June</option>
                                                                <option value="7" @if (isset($tour->seasonon)) @if ($tour->seasonon=='7')  selected  @endif @endif >July</option>
                                                                <option value="8" @if (isset($tour->seasonon)) @if ($tour->seasonon=='8')  selected  @endif @endif >August</option>
                                                                <option value="9" @if (isset($tour->seasonon)) @if ($tour->seasonon=='9')  selected  @endif @endif >September</option>
                                                                <option value="10" @if (isset($tour->seasonon)) @if ($tour->seasonon=='10')  selected  @endif @endif >October</option>
                                                                <option value="11" @if (isset($tour->seasonon)) @if ($tour->seasonon=='11')  selected  @endif @endif >November</option>
                                                                <option value="12" @if (isset($tour->seasonon)) @if ($tour->seasonon=='12')  selected  @endif @endif >December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="form-label" for="seasonout">Tour Deactive To</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select form-control form-control-lg" data-search="on" name="seasonout" id="seasonout">
                                                                    <option  value="0"  @if (!isset($tour->seasonout)) selected @endif>Active To</option>
                                                                    <option value="1" @if (isset($tour)) @if ($tour->seasonout=='1')  selected  @endif @endif >January</option>
                                                                    <option value="2" @if (isset($tour)) @if ($tour->seasonout=='2')  selected  @endif @endif >February</option>
                                                                    <option value="3" @if (isset($tour)) @if ($tour->seasonout=='3')  selected  @endif @endif >March</option>
                                                                    <option value="4" @if (isset($tour)) @if ($tour->seasonout=='4')  selected  @endif @endif >April</option>
                                                                    <option value="5" @if (isset($tour)) @if ($tour->seasonout=='5')  selected  @endif @endif >May</option>
                                                                    <option value="6" @if (isset($tour)) @if ($tour->seasonout=='6')  selected  @endif @endif >June</option>
                                                                    <option value="7" @if (isset($tour)) @if ($tour->seasonout=='7')  selected  @endif @endif >July</option>
                                                                    <option value="8" @if (isset($tour)) @if ($tour->seasonout=='8')  selected  @endif @endif >August</option>
                                                                    <option value="9" @if (isset($tour)) @if ($tour->seasonout=='9')  selected  @endif @endif >September</option>
                                                                    <option value="10" @if (isset($tour)) @if ($tour->seasonout=='10')  selected  @endif @endif >October</option>
                                                                    <option value="11" @if (isset($tour)) @if ($tour->seasonout=='11')  selected  @endif @endif >November</option>
                                                                    <option value="12" @if (isset($tour)) @if ($tour->seasonout=='12')  selected  @endif @endif >December</option>
                                                                    <option value="13" @if (isset($tour)) @if ($tour->seasonout=='13')  selected  @endif @endif >Next Year January</option>
                                                                    <option value="14" @if (isset($tour)) @if ($tour->seasonout=='14')  selected  @endif @endif >Next Year February</option>
                                                                    <option value="15" @if (isset($tour)) @if ($tour->seasonout=='15')  selected  @endif @endif >Next Year March</option>
                                                                    <option value="16" @if (isset($tour)) @if ($tour->seasonout=='16')  selected  @endif @endif >Next Year April</option>
                                                                    <option value="17" @if (isset($tour)) @if ($tour->seasonout=='17')  selected  @endif @endif >Next Year May</option>
                                                                    <option value="18" @if (isset($tour)) @if ($tour->seasonout=='18')  selected  @endif @endif >Next Year June</option>
                                                                    <option value="19" @if (isset($tour)) @if ($tour->seasonout=='19')  selected  @endif @endif >Next Year July</option>
                                                                    <option value="20" @if (isset($tour)) @if ($tour->seasonout=='20')  selected  @endif @endif >Next Year August</option>
                                                                    <option value="21" @if (isset($tour)) @if ($tour->seasonout=='21')  selected  @endif @endif >Next Year September</option>
                                                                    <option value="22" @if (isset($tour)) @if ($tour->seasonout=='22')  selected  @endif @endif >Next Year October</option>
                                                                    <option value="23" @if (isset($tour)) @if ($tour->seasonout=='23')  selected  @endif @endif >Next Year November</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    <script type="text/javascript">
        $(document).on("change","#duration",function(){
            if($(this).val()=='FullDay'){
                console.log('FullDay');
                $("#days").val('2').change();
                $("#nights").val('1').change();
                $("#days").attr("disabled", true);
                $("#nights").attr("disabled", true);
            }
            if($(this).val()=='HalfDay'){
                console.log('HalfDay');
                $("#days").val('1').change();
                $("#nights").val('0').change();
                $("#days").attr("disabled", true);
                $("#nights").attr("disabled", true);
            }            
            if($(this).val()=='Overnight'){
                console.log('Overnight');
                $("#days").val('3').change();
                $("#nights").val('2').change();
                $("#days").attr("disabled", false);
                $("#nights").attr("disabled", false);
            }
        });
    </script>
@endsection