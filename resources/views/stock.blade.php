@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Stock</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-stock item-width-numeric">Stock</div>
                <div class="item-size item-width-numeric">Size</div>
                <div class="item-shirt item-width">Shirt</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-stock item-width-numeric">{{ $out->stock }}</div>
                    <select name="size_id" id="size_id" class="size-select">
                        @foreach($size as $dimension)
                            <option @if($out->size_id == $dimension['id']) selected="selected" @endif value="{{ $dimension['id'] }}">{{ $dimension['type'] }}</option>
                        @endforeach
                    </select><br><br>
                    <select name="shirt_id" id="shirt_id" class="shirt-select">
                        @foreach($country as $locate)
                            <option @if($out->shirt_id == $locate['id']) selected="selected" @endif value="{{ $locate['id'] }}">{{ $locate['title'] }}</option>
                        @endforeach
                    </select><br><br>
                    <div class="item-edit"><a href="{{ url('/') }}/dashboard/stock/edit/{{ $out->id }}"><button type="button">Edit!</button></a></div>
                    <div class="item-delete"><a href="{{ url('/') }}/dashboard/stock/delete/{{ $out->id }}" onclick="return confirm('Are you sure?')"><button type="button">Delete!</button></a></div>
                </div>
            @endforeach
            <div class="item-add"><a href="{{ url('/') }}/dashboard/stock/add"><button type="button">Add!</button></a></div>
        </div>
    </div>
@include('includes/footer')