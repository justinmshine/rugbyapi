@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Scan</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-bar-code item-width-scan">Bar Code</div>
                <div class="item-qr-code item-width-scan">QR Code</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-bar-code item-width-scan">{{ $out->bar_code }}</div>
                    <div class="item-qr-code item-width-scan">{{ $out->qr_code }}</div>
                    <div class="item-edit"><a href="{{ url('/') }}/dashboard/scan/edit/{{ $out->id }}"><button type="button">Edit!</button></a></div>
                    <div class="item-delete"><a href="{{ url('/') }}/dashboard/scan/delete/{{ $out->id }}" onclick="return confirm('Are you sure?')"><button type="button">Delete!</button></a></div>
                </div>
            @endforeach
        </div>
    </div>
@include('includes/footer')