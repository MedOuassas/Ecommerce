@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                {!! Form::open(['id' => 'create', 'url' => aurl('posts'), 'method' => 'post', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('title', trans('admin.title')) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans('admin.description')) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('date', trans('admin.date')) !!}
                    <div class='input-group date date_publish'>
                        {!! Form::text('date', old('date'), ['class' => 'form-control']) !!}
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('category', trans('admin.category')) !!}
                    {!! Form::text('category', old('category'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', trans('admin.content')) !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo', trans('admin.photo')) !!}
                    {!! Form::file('photo', old('photo'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('keywords', trans('admin.keywords')) !!}
                    {!! Form::text('keywords', old('keywords'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', trans('admin.status')) !!}
                    {!! Form::select('status', ['active'=>trans('admin.active'), 'inactive'=>trans('admin.inactive')], old('status') ,['class' => 'form-control']) !!}
                </div>
                {!! Form::button(trans('admin.send'), ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                <a href="{{ aurl('posts') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                {!! Form::close([]) !!}
            </div>
        </div>
    </div>
</div>

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
@endpush

@push('jscript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(function(){
        $('.date_publish').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            minDate: new Date(),
            showClose: true,
            showClear: true
        });
    });
</script>
@endpush

@endsection
