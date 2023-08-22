<form {{ $attributes->merge(['action' => '#']) }} method="post" enctype="multipart/form-data">
    @csrf
    @if (!empty($method))
        @method($method)
    @endif

    {{ $slot }}
</form>
