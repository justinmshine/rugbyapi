@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Add New Scan</h3>
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
            <form class="add-scan-form" method="post" action="add/post">
                @csrf
                <label for="bar_code">Bar Code:</label><br>
                <input id="bar_code" name="bar_code" type="text"><br><br>
                <label for="qr_code">QR Code:</label><br>
                <input id="qr_code" name="qr_code" type="text"><br><br>
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