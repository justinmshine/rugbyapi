@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Add new Stock</h3>
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
            <form class="edit-stock-form" method="post" action="add/post">
                @csrf
                <label for="stock">Stock:</label><br>
                <input id="stock" name="stock" type="text"><br><br>
                <select name="size_id" id="size_id" class="size-select">
                    @foreach($size as $dimension)
                        <option value="{{ $dimension['id'] }}">{{ $dimension['type'] }}</option>
                    @endforeach
                </select><br><br>
                <select name="shirt_id" id="shirt_id" class="shirt-select">
                    @foreach($items as $out)
                        <option value="{{ $out['id'] }}">{{ $out['title'] }}</option>
                    @endforeach
                </select><br><br>
                <input class="item-insert" type="submit" value="Insert">
            </form>
        </div>
    </div>
@include('includes/footer')