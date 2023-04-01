{{--		logo--}}
<a href="{{ url ('/') }}" class="flex items-center gap-4 hover:scale-75 transition">
    <div>
        <img style="height:{{ $slot }}px" src="{{ asset ('assets/image/logo.png') }}" alt="">
    </div>
    <div {{ $attributes->merge(['class' => 'font-bold text-xl ']) }}>
        <p>Smile</p>
        <p style="margin-top: -5px">Line</p>
    </div>
</a>