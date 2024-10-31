@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Country</h3>
        <div class="items-wrapper">
            Country Edit
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
                <label for="name">Country:</label><br>
                <input id="name" name="name" type="text" value="{{ $item['name'] }}"><br>
                <label for="capital">Capital City:</label><br>
                <input id="capital" name="capital" type="text" value="{{ $item['capital_city'] }}"><br>
                <label for="iso">ISO Code:</label><br>
                <input id="iso" name="iso" type="text" value="{{ $item['iso_code'] }}"><br><br>
                <input class="item-update" type="submit" value="Update">
            </form>
        </div>
    </div>
@include('includes/footer')