@if (session('message'))
    <div class="alert alert-success" id="ms_message">
        {{ session('message') }}
    </div>
@endif