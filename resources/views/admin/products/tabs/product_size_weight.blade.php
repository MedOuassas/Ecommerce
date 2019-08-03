<div id="product_size_weight" class="tab-pane fade">
    <h3>{{ trans('admin.product_size_weight') }}</h3>
    <div class="size_weight">
        <h4>{{trans('admin.please_select_category')}}</h4>
    </div>
    <div class="form-group row">
        {!! Form::label('color_id', trans('admin.color'), ['class' => 'col-xs-12 col-md-2']) !!}
        <div class="col-xs-12 col-md-10">
            {!! Form::select('color_id', $colors->pluck('name', 'id'), $product->color_id, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group row">
                {!! Form::label('brand_id', trans('admin.brand'), ['class' => 'col-xs-12 col-md-4']) !!}
                <div class="col-xs-12 col-md-8">
                    {!! Form::select('brand_id', $brands->pluck('name_'.lang(), 'id'), $product->brand_id, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="form-group row">
                {!! Form::label('maker_id', trans('admin.maker'), ['class' => 'col-xs-12 col-md-4']) !!}
                <div class="col-xs-12 col-md-8">
                    {!! Form::select('maker_id', $makers->pluck('name_'.lang(), 'id'), $product->maker_id, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
