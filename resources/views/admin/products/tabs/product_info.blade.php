<div id="product_info" class="tab-pane fade in active">
    <h3>{{ trans('admin.product_info') }}</h3>
    <div class="form-group">
        {!! Form::label('title', trans('admin.title')) !!}
        {!! Form::text('title', $product->title, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', trans('admin.description')) !!}
        {!! Form::text('description', $product->description, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', trans('admin.content')) !!}
        {!! Form::textarea('content', $product->content, ['class' => 'form-control']) !!}
    </div>
</div>
