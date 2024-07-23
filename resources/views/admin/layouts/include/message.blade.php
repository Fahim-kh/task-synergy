@if(Session::has('success'))
    <div class="alert alert-success flash-message" role="alert">{{ Session::get('success') }}</div>
@elseif(Session::has('error'))
    <div class="alert alert-danger flash-message" role="alert">{{ Session::get('error') }}</div>
@endif
