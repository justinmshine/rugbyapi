@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Stock</h3>
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
            <form class="edit-stock-form" method="post" action="post/{{ $item['id'] }}">
                @csrf
                <label for="stock">Stock:</label><br>
                <input id="stock" name="stock" type="text" value="{{ $item['stock'] }}"><br><br>
                <select name="size_id" id="size_id" class="size-select">
                    @foreach($size as $dimension)
                        <option @if($item['size_id'] == $dimension['id']) selected="selected" @endif value="{{ $dimension['id'] }}">{{ $dimension['type'] }}</option>
                    @endforeach
                </select><br><br>
                <select name="shirt_id" id="shirt_id" class="shirt-select">
                    @foreach($items as $out)
                        <option @if($item['shirt_id'] == $out['id']) selected="selected" @endif value="{{ $out['id'] }}">{{ $out['title'] }}</option>
                    @endforeach
                </select><br><br>
                <input class="item-update" type="submit" value="Update">
            </form>
        </div>
    </div>
@include('includes/footer')