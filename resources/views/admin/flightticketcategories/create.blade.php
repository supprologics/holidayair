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
                                            <div class="nk-block-head-sub"><a class="back-to" href="{{ route('flightticketcategories.index') }}"><em class="icon ni ni-arrow-left"></em><span>Back</span></a></div>
                                            <h2 class="nk-block-title fw-normal">{{ isset($flightticketcategory)?'Edit':'Add'}} Flight Ticket Categories</h2>
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
                                                    <h5 class="card-title">{{ isset($flightticketcategory)?'':'New'}} Flight Ticket Category Setup</h5>
                                                </div>
                                                <form action="{{ isset($flightticketcategory)? route('flightticketcategories.update',$flightticketcategory->id):route('flightticketcategories.store') }}" class="gy-3" class="is-alter form-validate" method="POST">
                                                    {{ csrf_field() }}
                                                    @if (isset($flightticketcategory))
                                                        {{ method_field('PUT') }}
                                                    @endif
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label">Category Name</label>
                                                                <span class="form-note"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($flightticketcategory)?$flightticketcategory->name:'' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-lg-7 offset-lg-5">
                                                            <div class="form-group mt-2">
                                                                <button type="submit" class="btn btn-lg btn-primary">{{ isset($flightticketcategory)?'Update':'Add' }}</button>
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