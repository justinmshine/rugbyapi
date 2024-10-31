@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Shirts</h3>
        <div class="items-wrapper">
            Shirt Edit
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="edit-country-form" method="post" action="post/{{ $item['id'] }}">
                @csrf
                <label for="title">Title:</label><br>
                <input id="title" name="title" type="text" value="{{ $item['title'] }}"><br>
                <label for="description">Description:</label><br>
                <input id="description" name="description" type="text" value="{{ $item['description'] }}"><br>
                <label for="category">Category:</label><br>
                <input id="category" name="category" type="text" value="{{ $item['category'] }}"><br>
                <label for="price">Price:</label><br>
                <input id="price" name="price" type="text" value="{{ $item['price'] }}"><br>
                <label for="percent_discount">Percentage Discount:</label><br>
                <input id="percent_discount" name="percent_discount" type="text" value="{{ $item['percent_discount'] }}"><br>
                <label for="stock">Stock:</label><br>
                <input id="stock" name="stock" type="text" value="{{ $item['stock'] }}"><br>
                <label for="sku">Sku:</label><br>
                <input id="sku" name="sku" type="text" value="{{ $item['sku'] }}"><br>
                <label for="warranty">Warranty:</label><br>
                <input id="warranty" name="warranty" type="text" value="{{ $item['warranty'] }}"><br>
                <label for="shipping">Shipping:</label><br>
                <input id="shipping" name="shipping" type="text" value="{{ $item['shipping'] }}"><br>
                <label for="availability">Availability:</label><br>
                <input id="availability" name="availability" type="text" value="{{ $item['availability'] }}"><br>
                <label for="return_policy">Return Policy:</label><br>
                <input id="return_policy" name="return_policy" type="text" value="{{ $item['return_policy'] }}"><br>
                <label for="min_order_quantity">Minimum Order Quantity:</label><br>
                <input id="min_order_quantity" name="min_order_quantity" type="text" value="{{ $item['min_order_quantity'] }}"><br>
                <label for="thumbnail">Thumbnail:</label><br>
                <input id="thumbnail" name="thumbnail" type="text" value="{{ $item['thumbnail'] }}"><br><br>
                <input class="item-update" type="submit" value="Update">
            </form>
        </div>
    </div>
@include('includes/footer')