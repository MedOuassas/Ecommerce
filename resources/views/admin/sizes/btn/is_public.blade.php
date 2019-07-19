<div class="text-center">
    @if ($is_public == 'yes')
        <span class="badge alert-success">{{$is_public}}</span>
    @else
        <span class="badge alert-danger">{{$is_public}}</span>
    @endif
</div>
