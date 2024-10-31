@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Dimensions</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-type item-width">Type</div>
                <div class="item-waste item-width-numeric">Waste</div>
                <div class="item-length item-width-numeric">Length</div>
                <div class="item-chest item-width-numeric">Chest</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-type item-width">{{ $out->type }}</div>
                    <div class="item-waste item-width-numeric">{{ $out->waste }}</div>
                    <div class="item-length item-width-numeric">{{ $out->length }}</div>
                    <div class="item-chest item-width-numeric">{{ $out->chest }}</div>
                    <div class="item-edit"><a href="{{ url('/') }}/dashboard/dimensions/edit/{{ $out->id }}"><button type="button">Edit!</button></a></div>
                    <div class="item-delete"><a href="{{ url('/') }}/dashboard/dimensions/delete/{{ $out->id }}" onclick="return confirm('Are you sure?')"><button type="button">Delete!</button></a></div>
                </div>
            @endforeach
        </div>
    </div>
@include('includes/footer')