@extends('layouts.app')

@section('title', 'Representativ Management' . ' | ' . 'Representativ Update')

@section('breadcrumb-links')
<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="{{ route('admin.auth.representativ.index') }}" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Representativ</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
            <a class="dropdown-item" href="{{ route('admin.auth.representativ.create') }}">Create Representativ</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
@endsection

@section('content')
{{ Form::model($representativ, ['route' => ['admin.auth.representativ.update', $representativ], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Representativ Management
                    <small class="text-muted">Update Sales Team</small>
                </h4>
            </div>
            <div class="col-sm-5">
            </diV>
            <div class="col-sm-2">
            <a class="btn btn-secondary" href="{{ route('admin.auth.representativ.index') }}">Back To List</a>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <hr>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ Form::label('name', 'Full Name', [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('name', $representativ->name, ['class' => 'form-control', 'placeholder' => trans('Name')]) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ Form::label('email', __('Email Address'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('email', $representativ->email, ['class' => 'form-control', 'placeholder' => trans('Email')]) }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->
                <div class="form-group row">
                    {{ Form::label('telephone', __('Phone'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('telephone', $representativ->telephone, ['class' => 'form-control', 'placeholder' => trans('Phone')]) }}
                    </div>
                    <!--col-->
                </div>
                <div class="form-group row">
                    {{ Form::label('address', 'Address', [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('address', $representativ->address, ['class' => 'form-control', 'placeholder' => trans('Address')]) }}
                    </div>
                    <!--col-->
                </div>
                <div class="form-group row">
                    {{ Form::label('routes', 'Current Routes', [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('routes', $representativ->rouets, ['class' => 'form-control', 'placeholder' => trans('Current Routes')]) }}
                    </div>
                    <!--col-->
                </div>
                <div class="form-group row">
                    {{ Form::label('comments', trans('Comments'), ['class' => 'col-md-2 from-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::textarea('comments', $representativ->comments, ['class' => 'form-control', 'placeholder' => trans('Comments')]) }}
                    </div>
                <!--col-->
                 </div>
            </div>
            <!--col-->
        </div>
        <!--row-->
    </div>
    <!--card-body-->

    {{ Form::submit('Update', ['class' => 'btn btn-success btn-sm pull-right']) }}
</div>
<!--card-->
{{ Form::close() }}
@endsection

@section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Users.edit.init("create");
    });
</script>
@endsection