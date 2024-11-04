@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Reviews</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-rating item-width-numeric">Rating</div>
                <div class="item-comment item-width">Comment</div>
                <div class="item-added-at item-width">Added At</div>
                <div class="item-reviewer-name item-width">Reviewer Name</div>
                <div class="item-reviewer-email item-width">Reviewer Email</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-rating item-width-numeric">{{ $out->rating }}</div>
                    <div class="item-comment item-width">{{ $out->comment }}</div>
                    <div class="item-added-at item-width">{{ $out->added_at }}</div>
                    <div class="item-reviewer-name item-width">{{ $out->reviewer_name }}</div>
                    <div class="item-reviewer-email item-width">{{ $out->reviewer_email }}</div>
                    <div class="item-edit"><a href="{{ url('/') }}/dashboard/reviews/edit/{{ $out->id }}"><button type="button">Edit!</button></a></div>
                    <div class="item-delete"><a href="{{ url('/') }}/dashboard/reviews/delete/{{ $out->id }}" onclick="return confirm('Are you sure?')"><button type="button">Delete!</button></a></div>
                </div>
            @endforeach
            <br><br>
            <div class="item-add"><a href="{{ url('/') }}/dashboard/reviews/add"><button type="button">Add!</button></a></div>
        </div>
    </div>
@include('includes/footer')