 @if($flash = session('success'))
    <div class="alert alert-success notifications_panel" role="alert" style="position: fixed; top: 100px; width: 30%; z-index: 60; right: 10%;">
        {{$flash}}
    </div>
@endif
@if($flash = session('error'))
    <div class="alert alert-danger notifications_panel" role="alert" style="position: fixed; top: 100px; width: 30%; z-index: 60; right: 10%;">
        {{$flash}}
    </div>
@endif