@extends('layouts.app')

@section('content')
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub"><a class="back-to" href="{{ route('airlines.index') }}"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></div>
                                            <h2 class="nk-block-title fw-normal">{{ isset($airline)?'Edit':'Add'}} Airline</h2>
                                            <div class="nk-block-des">
                                                <p class="">All fields are required.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->
                                    <div class="nk-block nk-block-lg">
                                        <!--
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title"></h4>
                                                <div class="nk-block-des">
                                                    <p class="lead"></p>
                                                </div>
                                            </div>
                                        </div> -->
                                        @include('partials.error')
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-head">
                                                    <h5 class="card-title">{{ isset($airline)?'':'New'}} Airline Setup</h5>
                                                </div>
                                                <form action="{{ isset($airline)? route('airlines.update',$airline->id):route('airlines.store') }}" class="gy-3" class="is-alter form-validate" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    @if (isset($airline))
                                                        {{ method_field('PUT') }}
                                                    @endif
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Code</label>
                                                                <span class="form-note"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="code" name="code" value="{{ isset($airline)?$airline->code:'' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Name</label>
                                                                <span class="form-note"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="name" name="name"  value="{{ isset($airline)?$airline->name:'' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Country</label>
                                                                <span class="form-note"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select name="country_id" id="country_id" class="form-control" >
                                                                        @foreach ($countries as $country)
                                                                            <option value="{{ $country->id }}"
                                                                                @if (isset($airline))
                                                                                    @if ($country->id==$airline->country_id)
                                                                                        selected
                                                                                    @endif
                                                                                @endif
                                                                                >{{ $country->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Logo</label>
                                                                <span class="form-note"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="file"  class="custom-file-input" id="logo" name="logo" value="{{ isset($airline)?$airline->logo:''}}">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (isset($airline))
                                                        
                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <img src="{{ asset('storage/'.$airline->logo) }}" style="width:100%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    
                                                    <div class="row g-3">
                                                        <div class="col-lg-7 offset-lg-5">
                                                            <div class="form-group mt-2">
                                                                <button type="submit" class="btn btn-lg btn-primary">{{ isset($airline)?'Update':'Add' }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- card -->
                                    </div><!-- .nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@endsection