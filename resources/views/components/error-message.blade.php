@if ($errors->any())
    <div class="text-red-600 mb-4">
        {{__('messages.whops')}}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
 @endif
