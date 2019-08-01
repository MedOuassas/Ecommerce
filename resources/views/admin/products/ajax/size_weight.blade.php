<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label for="size_id" class="col-md-4">{{ trans('admin.size_name') }}</label>
            <div class="col-md-8">
                {!! Form::select('size_id', $sizes, '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="size" class="col-md-4">{{ trans('admin.size') }}</label>
            <div class="col-md-8">
                {!! Form::text('size', $product->size, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label for="weight_id" class="col-md-4">{{ trans('admin.weight_name') }}</label>
            <div class="col-md-8">
                {!! Form::select('weight_id', $weights, '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="weight" class="col-md-4">{{ trans('admin.weight') }}</label>
            <div class="col-md-8">
                {!! Form::text('weight', $product->weight, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>
