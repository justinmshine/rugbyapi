@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Sales</h3>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-name item-width">Name</div>
                <div class="item-surname item-width">Surname</div>
                <div class="item-address item-width">Address</div>
                <div class="item-email item-width-scan">Email</div>
                <div class="item-phone item-width">Phone</div>
                <div class="item-sales-items item-width">Breakdown</div>
                <div class="item-date item-width">Date</div>
                <div class="item-total-amount item-width">Total Amount</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-name item-width">{{ $out->name }}</div>
                    <div class="item-surname item-width">{{ $out->surname }}</div>
                    <div class="item-surname item-width">{{ $out->address1 }}, @if(!empty($out->address2)){{ $out->address2 }}, @endif{{ $out->city }}, {{ $out->country }}</div>
                    <div class="item-email item-width-scan">{{ $out->email }}</div>
                    <div class="item-phone item-width">{{ $out->phone }}</div>
                    <div class="item-sales item-width">@foreach($out->breakdown as $key => $break){{ $break['title'] }} {{ $break['type'] }} {{ $break['quantity'] }} * {{ $break['price'] }}{{ $loop->last ? '' : ', ' }}@endforeach</div>
                    <div class="item-date item-width">{{ $out->created_at }}</div>
                    <div class="item-total-amount item-width">£{{ $out->total }}</div>
                </div>
            @endforeach    
        </div>
    </div>
@include('includes/footer')