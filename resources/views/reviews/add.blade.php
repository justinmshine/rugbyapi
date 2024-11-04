@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Add New Review</h3>
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
            <form class="add-review-form" method="post" action="add/post">
                @csrf
                <label for="rating">Rating:</label><br>
                <input id="rating" name="rating" type="text"><br><br>
                <label for="comment">Comment:</label><br>
                <input id="comment" name="comment" type="text"><br><br>
                <label for="added_at">Added At:</label><br>
                <input id="added_at" name="added_at" type="date"><br><br>
                <label for="reviewer_name">Reviewer Name:</label><br>
                <input id="reviewer_name" name="reviewer_name" type="text"><br><br>
                <label for="reviewer_email">Reviewer Email:</label><br>
                <input id="reviewer_email" name="reviewer_email" type="text"><br><br>
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