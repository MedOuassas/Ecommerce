<div id="category" class="tab-pane fade">

    <h3>{{ trans('admin.category') }}</h3>
    <div class="form-group">
        <div id="jstree_categories"></div>
        <input type="hidden" name="category_id" class="category_id" value="{{ $product->category_id }}">
    </div>

</div>
