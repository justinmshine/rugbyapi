@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Add New Country</h3>
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
            <form class="add-country-form" method="post" action="add/post">
                @csrf
                <label for="name">Country:</label><br>
                <input id="name" name="name" type="text"><br><br>
                <label for="capital">Capital City:</label><br>
                <input id="capital" name="capital" type="text"><br><br>
                <label for="iso">ISO Code:</label><br>
                <input id="iso" name="iso" type="text"><br><br>
                <select name="shirt_id" id="shirt_id" class="shirt-select">
                    @foreach($items as $item)
                        <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                    @endforeach
                </select><br><br>
                <input class="item-insert" type="submit" value="Insert">
            </form>
        </div>
    </div>
@include('includes/footer')