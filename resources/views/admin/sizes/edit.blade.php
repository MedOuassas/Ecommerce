@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                {!! Form::open(['id' => 'edit', 'url' => aurl('sizes/'.$size->id), 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', trans('admin.name')) !!}
                    {!! Form::text('name', $size->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('is_public', trans('admin.public')) !!}
                    {!! Form::select('is_public', ['yes'=>trans('admin.yes'), 'no'=>trans('admin.no')], $size->is_public ,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <div id="jstree_categories"></div>
                    <input type="hidden" name="category_id" class="category_id" value="{{ $size->category_id }}">
                </div>
                {!! Form::button(trans('admin.save'), ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                <a href="{{ aurl('sizes') }}" class="btn btn-default">{{ trans('admin.cancel') }}</a>
                {!! Form::close([]) !!}
            </div>
        </div>
    </div>
</div>

@push('jscript')
<script>
    $(function () {
        $('#jstree_categories').jstree({
            "core": {
                "themes": {
                    "variant": "large"
                },
                'data' : {!! load_category( $size->category_id ) !!}
            },
            "checkbox": {
                "keep_selected_style": false
            },
            "plugins": ["wholerow"]
        });

        $('#jstree_categories').on('changed.jstree', function (e,data) {
            /* var i, j, r = [];
            for (i = 0, j=data.selected; i < j.length; i++) {
                r.push(data.instance.get_node(data.selected[i]).id);
            }
            $('.category_id').val(r.join(', ')); */
            //console.log(data.selected[0]);
            $('.category_id').val(data.selected[0]);
        });
    });
</script>
@endpush

@endsection
