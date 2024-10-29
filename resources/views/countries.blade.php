@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Countries</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-name item-width">Name</div>
                <div class="item-city item-width">Capital City</div>
                <div class="item-iso item-width">ISO Code</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-name item-width">{{ $out->name }}</div>
                    <div class="item-city item-width">{{ $out->capital_city }}</div>
                    <div class="item-iso item-width">{{ $out->iso_code }}</div>
                    <div class="item-edit"><a href="{{ url('/') }}/dashboard/countries/edit/{{ $out->id }}"><button type="button">Edit!</button></a></div>
                    <div class="item-delete"><a href="{{ url('/') }}/dashboard/countries/delete/{{ $out->id }}" onclick="return confirm('Are you sure?')"><button type="button">Delete!</button></a></div>
                </div>
            @endforeach
        </div>
    </div>
@include('includes/footer')