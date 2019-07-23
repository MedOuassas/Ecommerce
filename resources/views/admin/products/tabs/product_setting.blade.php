<div id="product_setting" class="tab-pane fade">
    <h3>{{ trans('admin.product_setting') }}</h3>
    <div class="row">
        <div class="form-group col-xs-6">
            {!! Form::label('price', trans('admin.price')) !!}
            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-xs-6">
            {!! Form::label('price_offre', trans('admin.price_offre')) !!}
            {!! Form::text('price_offre', $product->price_offre, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-xs-12">
            {!! Form::label('stock', trans('admin.stock')) !!}
            {!! Form::text('stock', $product->stock, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-xs-6">
            {!! Form::label('offre_start_at', trans('admin.offre_start_at')) !!}
            <div class='input-group date date_offer'>
                {!! Form::text('offre_start_at', $product->offre_start_at, ['class' => 'form-control']) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group col-xs-6">
            {!! Form::label('offre_end_at', trans('admin.offre_end_at')) !!}
            <div class='input-group date date_offer'>
                {!! Form::text('offre_end_at', $product->offre_end_at, ['class' => 'form-control']) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group col-xs-12">
            {!! Form::label('status', trans('admin.status')) !!}
            {!! Form::select('status', ['inactive'=>trans('admin.inactive'), 'active'=>trans('admin.active')], $product->status, ['class' => 'form-control']) !!}
        </div>
    </div>

</div>
