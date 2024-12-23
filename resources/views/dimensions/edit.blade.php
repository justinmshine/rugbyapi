@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Dimensions</h3>
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
            <form class="edit-dimensions-form" method="post" action="post/{{ $item['id'] }}">
                @csrf
                <label for="type">Type:</label><br>
                <input id="type" name="type" type="text" value="{{ $item['type'] }}"><br><br>
                <label for="waste">Waste:</label><br>
                <input id="waste" name="waste" type="text" value="{{ $item['waste'] }}"><br><br>
                <label for="length">Length:</label><br>
                <input id="length" name="length" type="text" value="{{ $item['length'] }}"><br><br>
                <label for="chest">Chest:</label><br>
                <input id="chest" name="chest" type="text" value="{{ $item['chest'] }}"><br><br>
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