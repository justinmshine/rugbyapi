@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Images</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-title item-width">Title</div>
                <div class="item-location item-width-scan">Location</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-title item-width">{{ $out->title }}</div>
                    <div class="item-location item-width-scan">{{ $out->location }}</div>
                    <div class="item-edit"><a href="{{ url('/') }}/dashboard/images/edit/{{ $out->id }}"><button type="button">Edit!</button></a></div>
                    <div class="item-delete"><a href="{{ url('/') }}/dashboard/images/delete/{{ $out->id }}" onclick="return confirm('Are you sure?')"><button type="button">Delete!</button></a></div>
                </div>
            @endforeach
            <br><br>
            <div class="item-add"><a href="{{ url('/') }}/dashboard/images/add"><button type="button">Add!</button></a></div>
        </div>
    </div>
@include('includes/footer')