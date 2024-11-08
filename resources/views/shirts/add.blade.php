@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Add New Shirt</h3>
        <div class="items-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="add-shirt-form" method="post" action="add/post">
                @csrf
                <label for="title">Title:</label><br>
                <input id="title" name="title" type="text"><br><br>
                <label for="description">Description:</label><br>
                <input id="description" name="description" type="text"><br><br>
                <label for="category">Category:</label><br>
                <input id="category" name="category" type="text"><br><br>
                <label for="price">Price:</label><br>
                <input id="price" name="price" type="text"><br><br>
                <label for="percent_discount">Percentage Discount:</label><br>
                <input id="percent_discount" name="percent_discount" type="text"><br><br>
                <label for="sku">Sku:</label><br>
                <input id="sku" name="sku" type="text"><br><br>
                <label for="warranty">Warranty:</label><br>
                <input id="warranty" name="warranty" type="text"><br><br>
                <label for="shipping">Shipping:</label><br>
                <input id="shipping" name="shipping" type="text""><br><br>
                <label for="availability">Availability:</label><br>
                <input id="availability" name="availability" type="text""><br><br>
                <label for="return_policy">Return Policy:</label><br>
                <input id="return_policy" name="return_policy" type="text""><br><br>
                <label for="min_order_quantity">Minimum Order Quantity:</label><br>
                <input id="min_order_quantity" name="min_order_quantity" type="text""><br><br>
                <label for="thumbnail">Thumbnail:</label><br>
                <input id="thumbnail" name="thumbnail" type="text"><br><br>
                <input class="item-insert" type="submit" value="Insert">
            </form>
        </div>
    </div>
@include('includes/footer')