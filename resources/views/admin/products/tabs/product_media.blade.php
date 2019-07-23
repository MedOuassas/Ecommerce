<div id="product_media" class="tab-pane fade">
    <h3>{{ trans('admin.product_media') }}</h3>
    <div class="form-group">
        {!! Form::label('photo', trans('admin.photo')) !!}
        {!! Form::file('photo', ['class' => 'form-control']) !!}
    </div>
</div>
