@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Reviews</h3>
        <div class="items-wrapper">
            Review Edit
            <form class="edit-country-form" method="post" action="post/{{ $item['id'] }}">
                @csrf
                <label for="rating">Rating:</label><br>
                <input id="rating" name="rating" type="text" value="{{ $item['rating'] }}"><br>
                <label for="comment">Comment:</label><br>
                <input id="comment" name="comment" type="text" value="{{ $item['comment'] }}"><br>
                <label for="added_at">Added At:</label><br>
                <input id="added_at" name="added_at" type="text" value="{{ $item['added_at'] }}"><br>
                <label for="reviewer_name">Reviewer Name:</label><br>
                <input id="reviewer_name" name="reviewer_name" type="text" value="{{ $item['reviewer_name'] }}"><br>
                <label for="reviewer_email">Reviewer Email:</label><br>
                <input id="reviewer_email" name="reviewer_email" type="text" value="{{ $item['reviewer_email'] }}"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
@include('includes/footer')