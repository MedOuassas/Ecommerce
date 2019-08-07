@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                {!! Form::open(['id' => 'create', 'url' => aurl('slides'), 'method' => 'post', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('title', trans('admin.title')) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans('admin.description')) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', trans('admin.url')) !!}
                    {!! Form::url('url', old('url'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo', trans('admin.photo')) !!}
                    {!! Form::file('photo', old('photo'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', trans('admin.status')) !!}
                    {!! Form::select('status', ['active'=>trans('admin.active'), 'inactive'=>trans('admin.inactive')], old('status') ,['class' => 'form-control']) !!}
                </div>
                {!! Form::button(trans('admin.send'), ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                <a href="{{ aurl('slides') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                {!! Form::close([]) !!}
            </div>
        </div>
    </div>
</div>

@endsection
