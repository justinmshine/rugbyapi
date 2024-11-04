@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Add New Dimension</h3>
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
            <form class="add-dimension-form" method="post" action="add/post">
                @csrf
                <label for="type">Type:</label><br>
                <input id="type" name="type" type="text"><br><br>
                <label for="waste">Waste:</label><br>
                <input id="waste" name="waste" type="text"><br><br>
                <label for="length">Length:</label><br>
                <input id="length" name="length" type="text"><br><br>
                <label for="chest">Chest:</label><br>
                <input id="chest" name="chest" type="text"><br><br>
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