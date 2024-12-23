@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Images</h3>
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
            <form class="edit-country-form" method="post" action="post/{{ $item['id'] }}">
                @csrf
                <label for="title">Title:</label><br>
                <input id="title" name="title" type="text" value="{{ $item['title'] }}"><br><br>
                <label for="location">Location:</label><br>
                <input id="location" name="location" type="text" value="{{ $item['location'] }}"><br><br>
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