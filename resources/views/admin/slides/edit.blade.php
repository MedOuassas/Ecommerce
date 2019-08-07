@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                {!! Form::open(['id' => 'edit', 'url' => aurl('slides/'.$slide->id), 'method' => 'put', 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('title', trans('admin.title')) !!}
                    {!! Form::text('title', $slide->title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', trans('admin.description')) !!}
                    {!! Form::text('description', $slide->description, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', trans('admin.url')) !!}
                    {!! Form::url('url', $slide->url, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo', trans('admin.photo')) !!}
                    {!! Form::file('photo', ['class' => 'form-control']) !!}
                </div>
                @if(!empty($slide->photo) and \Storage::has($slide->photo))
                <div class="form-group"><img src="{{ Storage::url($slide->photo) }}" alt="{{ $slide->title }}" style="max-width:300px"></div>
                @endif
                <div class="form-group">
                    {!! Form::label('status', trans('admin.status')) !!}
                    {!! Form::select('status', ['active'=>trans('admin.active'), 'inactive'=>trans('admin.inactive')], $slide->status ,['class' => 'form-control']) !!}
                </div>
                {!! Form::button(trans('admin.save'), ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                <a href="{{ aurl('slides') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                {!! Form::close([]) !!}
            </div>
        </div>
    </div>
</div>

@endsection
