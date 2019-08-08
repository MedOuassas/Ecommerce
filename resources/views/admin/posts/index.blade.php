@extends('admin.index')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{ $title }}</h3>
    </div>
    <div class="box-body table-responsive">
        {!! Form::open(['id' => 'form_data', 'url' => aurl('posts/destroy/all'), 'method' => 'delete']) !!}
        {!! $dataTable->table(['class' => 'table table-striped table-hover table-bordered'], true) !!}
        {!! Form::close([]) !!}
    </div>
</div>
<div id="deleteall_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans('admin.delete_all')}}</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <div class="empty_record hidden">
                        <h1>{{ trans('admin.please_check_some_records')}}</h1>
                    </div>
                    <div class="not_empty_record hidden">
                        <h3>{{ trans('admin.ask_delete_item')}} <span class="record_count">{{-- count checked item --}}</span> ?</h3>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="empty_record hidden">
                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">{{ trans('admin.close')}}</button>
                </div>
                <div class="not_empty_record hidden">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no')}}</button>
                    <button type="submit" class="btn btn-danger del_all" name="del_all">{{ trans('admin.yes')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
<link rel="stylesheet" href="{{ asset('/design/admin')}}/css/dataTables.bootstrap.min.css">
@endpush
@push('jscript')
<script src="{{ asset('/design/admin')}}/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/design/admin')}}/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('/design/admin')}}/js/dataTables.buttons.min.js"></script>
<script src="{{ url('')}}/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
<script>
    $(function () {
        $(document).on('click', '.btn_status', function (e) {
            e.preventDefault();
            var $this = this,
                sld_id = $($this).data('id');
                var status = '';
                $($this).hasClass('btn-success') ? status = 'active' : status = 'inactive';
            $.ajax({
                url: '{{ aurl("posts/change-status") }}',
                dataType: 'json',
                type: 'post',
                data: {_token:'{{csrf_token()}}', post_id: sld_id, post_status: status },
                success: function (data) {
                    $($this).attr('data-status', data.status);
                    if(data.status === 'active'){
                        $($this).removeClass('btn-danger').addClass('btn-success');
                    } else {
                        $($this).removeClass('btn-success').addClass('btn-danger');
                    }
                }
            });
        });
    });
</script>
@endpush

@endsection
