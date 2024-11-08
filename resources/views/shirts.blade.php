@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Shirts</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-title item-width">Title</div>
                <div class="item-description item-width">Description</div>
                <div class="item-category item-width">Category</div>
                <div class="item-price item-width-numeric">Price</div>
                <div class="item-percentage-discount item-width-numeric">Percentage Discount</div>
                <div class="item-sku item-width">Sku</div>
                <div class="item-warranty item-width">Warranty</div>
                <div class="item-shipping item-width">Shipping</div>
                <div class="item-availability item-width">Availability</div>
                <div class="item-return-policy item-width">Return policy</div>
                <div class="item-min-order-quantity item-width-numeric">Minimun Order Quantity</div>
                <div class="item-thumbnail item-width">Thumbnail</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-title item-width">{{ $out->title }}</div>
                    <div class="item-description item-width">{{ $out->description }}</div>
                    <div class="item-category item-width">{{ $out->category }}</div>
                    <div class="item-price item-width-numeric">{{ $out->price }}</div>
                    <div class="item-percentage-discount item-width-numeric">{{ $out->percentage_discount }}</div>
                    <div class="item-sku item-width">{{ $out->sku }}</div>
                    <div class="item-warranty item-width">{{ $out->warranty }}</div>
                    <div class="item-shipping item-width">{{ $out->shipping }}</div>
                    <div class="item-availability item-width">{{ $out->availability }}</div>
                    <div class="item-return-policy item-width">{{ $out->return_policy }}</div>
                    <div class="item-min-order-quantity item-width-numeric">{{ $out->min_order_quantity }}</div>
                    <div class="item-thumbnail item-width">{{ $out->thumbnail }}</div>
                    <div class="item-edit"><a href="{{ url('/') }}/dashboard/shirts/edit/{{ $out->id }}"><button type="button">Edit!</button></a></div>
                    <div class="item-delete"><a href="{{ url('/') }}/dashboard/shirts/delete/{{ $out->id }}" onclick="return confirm('Are you sure?')"><button type="button">Delete!</button></a></div>
                </div>
            @endforeach
            <br><br>
            <div class="item-add"><a href="{{ url('/') }}/dashboard/shirts/add"><button type="button">Add!</button></a></div>
        </div>
    </div>
@include('includes/footer')