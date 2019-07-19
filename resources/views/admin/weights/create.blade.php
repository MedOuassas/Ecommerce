@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                {!! Form::open(['id' => 'create', 'url' => aurl('weights'), 'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                {!! Form::button(trans('admin.send'), ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                <a href="{{ aurl('weights') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                {!! Form::close([]) !!}
            </div>
        </div>
    </div>
</div>

@endsection
