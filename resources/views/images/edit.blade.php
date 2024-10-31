@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Images</h3>
        <div class="items-wrapper">
            Image Edit
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
                <label for="location">Location:</label><br>
                <input id="location" name="location" type="text" value="{{ $item['location'] }}"><br><br>
                <input class="item-update" type="submit" value="Update">
            </form>
        </div>
    </div>
@include('includes/footer')