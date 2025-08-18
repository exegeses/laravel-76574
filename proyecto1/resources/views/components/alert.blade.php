
@if( session('mensaje') )
    <div class="alert alert-{{ session('color') }}">
        {{ session('mensaje') }}
    </div>
@endif
