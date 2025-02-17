@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Reviews</h3>
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
                <label for="rating">Rating:</label><br>
                <input id="rating" name="rating" type="text" value="{{ $item['rating'] }}"><br><br>
                <label for="comment">Comment:</label><br>
                <input id="comment" name="comment" type="text" value="{{ $item['comment'] }}"><br><br>
                <label for="added_at">Added At:</label><br>
                <input id="added_at" name="added_at" type="date" value="{{\Illuminate\Support\Carbon::parse($item['added_at'])->format('Y-m-d')}}"><br><br>
                <label for="reviewer_name">Reviewer Name:</label><br>
                <input id="reviewer_name" name="reviewer_name" type="text" value="{{ $item['reviewer_name'] }}"><br><br>
                <label for="reviewer_email">Reviewer Email:</label><br>
                <input id="reviewer_email" name="reviewer_email" type="text" value="{{ $item['reviewer_email'] }}"><br><br>
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