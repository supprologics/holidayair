<div class="modal fade zoom" tabindex="-1" id="user-create">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create User</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        {{Form::model(null, array('route' => array('itineraries.store'),'method'=>'post','enctype'=>'multipart/form-data','class'=>'js-form' )}}
                        <div class="preview-block">
                            <div class="row gy-4">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        {!! Form::label('role_id','Role *',['class'=>'form-label']); !!}
                                        <div class="form-control-wrap">
                                            {!! Form::select('role_id', withDefaults($roles),null,
                                            ['class' => ['form-control',errorClass($errors,'role_id')],'id'=>'role_id']) !!}
                                            {!! errorMessage($errors,'role_id') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        {!! Form::label('first_name *','',['class'=>'form-label']); !!}
                                        <div class="form-control-wrap">
                                            {!! Form::text('first_name', null, ['class' =>['form-control',
                                            errorClass($errors,'first_name')],'id'=>'first_name'])!!}
                                            {!! errorMessage($errors,'first_name') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        {!! Form::label('last_name *','',['class'=>'form-label']); !!}
                                        <div class="form-control-wrap">
                                            {!! Form::text('last_name', null, ['class' =>
                                            ['form-control',errorClass($errors,'last_name')],'id'=>'last_name'])!!}
                                            {!! errorMessage($errors,'last_name') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('department_id','department *',['class'=>'form-label']); !!}
                                        <div class="form-control-wrap">
                                            {!! Form::select('department_id',withDefaults($departments) ,null, ['class' =>
                                            ['form-control',errorClass($errors,'department_id')],'id'=>'department_id']); !!}
                                            {!! errorMessage($errors,'department_id') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('designation','designation *',['class'=>'form-label']); !!}
                                        <div class="form-control-wrap">
                                            {!! Form::select('designation_id',withDefaults($designations), null, ['class' =>
                                            ['form-control',errorClass($errors,'designation_id')],'id'=>'designation_id']); !!}
                                            {!! errorMessage($errors,'designation_id') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('supervisor','supervisor *',['class'=>'form-label']); !!}
                                        <div class="form-control-wrap">
                                            {!! Form::select('supervisor',withDefaults($supervisors), null, ['class' =>
                                            ['form-control',errorClass($errors,'supervisor')],'id'=>'supervisor']);!!}
                                            {!! errorMessage($errors,'supervisor') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('email *','',['class'=>'form-label']); !!}
                                        <div class="form-control-wrap">
                                            {!! Form::text('email', null, ['class' =>
                                            ['form-control',errorClass($errors,'email')],'id'=>'email']); !!}
                                            {!! errorMessage($errors,'email') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4"><br>
                                    <div class="preview-block">
                                        <div class="custom-control custom-checkbox">
                                            {!! Form::checkbox('status',1,null,['class'=>'custom-control-input','id'=>'status',$model?$model->status==1?'checked':'':'']); !!}
                                            {!! Form::label('status','Is Active',['class'=>'custom-control-label']); !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" style="text-align:right">
                                    @if ($model)
                                    <button class="btn btn-primary" type="submit">
                                        <em class="icon ni ni-update"></em>
                                        <span>Update</span>
                                    </button>
                                    @else
                                    <button class="btn btn-primary" type="submit">
                                        <em class="icon ni ni-save"></em> <span>Save</span> </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>