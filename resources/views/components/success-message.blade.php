@if ($message = Session::get('success'))
    <div class="text-green-600">
        <p>{{ $message }}</p>
    </div>
@endif
