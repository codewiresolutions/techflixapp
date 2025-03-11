@if ($message = Session::get('success'))
<div class="example-alert">
    <div class="alert alert-success alert-icon alert-dismissible">
        <strong>Success</strong>! {{ $message }} <button class="close" data-dismiss="alert"></button>
    </div>
</div>
@endif
@if ($message = Session::get('error'))
<div class="example-alert">
    <div class="alert alert-danger alert-icon alert-dismissible">
        <strong>Error</strong>! {{ $message }} <button class="close" data-dismiss="alert"></button>
    </div>
</div>
@endif