@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Edit Scans</h3>
        <div class="items-wrapper">
            Scan Edit
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
                <label for="bar_code">Bar Code:</label><br>
                <input id="bar_code" name="bar_code" type="text" value="{{ $item['bar_code'] }}"><br>
                <label for="qr_code">QR Code:</label><br>
                <input id="qr_code" name="qr_code" type="text" value="{{ $item['qr_code'] }}"><br><br>
                <input class="item-update" type="submit" value="Update">
            </form>
        </div>
    </div>
@include('includes/footer')