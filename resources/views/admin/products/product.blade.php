@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                {!! Form::open(['id' => 'create_product', 'url' => aurl('products/'.$product->id), 'method' => 'post', 'files' => true]) !!}

                {!! Form::button(trans('admin.save'), ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                <a href="{{ aurl('products') }}" class="btn btn-info">{{ trans('admin.save_continue') }}</a>
                <a href="{{ aurl('products') }}" class="btn btn-default">{{ trans('admin.clone_product') }}</a>
                <a href="{{ aurl('products') }}" class="btn btn-danger">{{ trans('admin.delete') }}</a>

                <hr>

                <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#product_info"><i class="fa fa-info margin"></i>{{ trans('admin.product_info') }}</a></li>
                    <li><a data-toggle="tab" href="#category"><i class="fa fa-list margin"></i>{{ trans('admin.category') }}</a></li>
                    <li><a data-toggle="tab" href="#product_setting"><i class="fa fa-cog margin"></i>{{ trans('admin.product_setting') }}</a></li>
                    <li><a data-toggle="tab" href="#product_media"><i class="fa fa-photo margin"></i>{{ trans('admin.product_media') }}</a></li>
                    <li><a data-toggle="tab" href="#product_size_weight"><i class="fa fa-arrows-alt margin"></i>{{ trans('admin.product_size_weight') }}</a></li>
                    <li><a data-toggle="tab" href="#other_data"><i class="fa fa-database margin"></i>{{ trans('admin.other_data') }}</a></li>
                </ul>

                <div class="tab-content">
                    @include('admin.products.tabs.product_info')
                    @include('admin.products.tabs.category')
                    @include('admin.products.tabs.product_setting')
                    @include('admin.products.tabs.product_media')
                    @include('admin.products.tabs.product_size_weight')
                    @include('admin.products.tabs.other_data')
                </div>

                <hr>

                {!! Form::button(trans('admin.save'), ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                <a href="{{ aurl('products') }}" class="btn btn-info">{{ trans('admin.save_continue') }}</a>
                <a href="{{ aurl('products') }}" class="btn btn-default">{{ trans('admin.clone_product') }}</a>
                <a href="{{ aurl('products') }}" class="btn btn-danger">{{ trans('admin.delete') }}</a>
                {!! Form::close([]) !!}
            </div>
        </div>
    </div>
</div>
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
@endpush

@push('jscript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(function () {
        $('#jstree_categories').jstree({
            "core": {
                "themes": {
                    "variant": "large"
                },
                'data' : {!! load_category( $product->category_id ) !!}
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

        $('.date_offer').datetimepicker();
    });
</script>
@endpush

@endsection
