@if($errors->any())
    {!! implode('', $errors->all('<div class="errors">:message</div>')) !!}
@endif

@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

