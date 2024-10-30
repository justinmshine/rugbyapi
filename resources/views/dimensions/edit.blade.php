@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Dimensions</h3>
        <div class="items-wrapper">
            Dimensions Edit
            <form class="edit-dimensions-form" method="post" action="post/{{ $item['id'] }}">
                @csrf
                <label for="type">Type:</label><br>
                <input id="type" name="type" type="text" value="{{ $item['type'] }}"><br>
                <label for="waste">Waste:</label><br>
                <input id="waste" name="waste" type="text" value="{{ $item['waste'] }}"><br>
                <label for="length">Length:</label><br>
                <input id="length" name="length" type="text" value="{{ $item['length'] }}"><br>
                <label for="chest">Chest:</label><br>
                <input id="chest" name="chest" type="text" value="{{ $item['chest'] }}"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
@include('includes/footer')