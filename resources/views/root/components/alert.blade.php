<div class="m-alert m-alert--icon alert alert-{{ $type ?? 'info' }}" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-danger"></i>
    </div>
    <div class="m-alert__text">
        {{ $slot }}
    </div>
    <div class="m-alert__actions" style="width: 200px;">
        <a href="{{ $action_route ?? '#' }}" class="btn btn-outline-light btn-sm m-btn m-btn--hover-metal"
            data-dismiss="alert" aria-label="Close">{{ $action_label ?? 'Dismiss' }}
        </a>
    </div>
</div>