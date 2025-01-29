@include('includes/head')
    <div class="">
        <h1>Shine Rugby Shirts CMS</h1>
        @include('includes/menu')
        <h3>Prize draw entrants</h3>
        <form class="prize-draw-form" method="post" action="{{ url('/') }}/prizedraw/rundraw">
            @csrf
            <input class="item-update" type="submit" value="Run prize draw">
        </form>
        <div class="items-wrapper">
            <div class="item-single-title">
                <div class="item-name item-width">Name</div>
                <div class="item-surname item-width">Surname</div>
                <div class="item-address item-width">Address</div>
                <div class="item-email item-width-scan">Email</div>
                <div class="item-phone item-width">Phone</div>
                <div class="item-phone item-width">Result</div>
            </div>
            @foreach($items as $out)
                <div class="item-single">
                    <div class="item-name item-width">{{ $out->name }}</div>
                    <div class="item-surname item-width">{{ $out->surname }}</div>
                    <div class="item-surname item-width">{{ $out->address1 }}, @if(!empty($out->address2)){{ $out->address2 }}, @endif{{ $out->city }}, {{ $out->country }}</div>
                    <div class="item-email item-width-scan">{{ $out->email }}</div>
                    <div class="item-phone item-width">{{ $out->phone }}</div>
                    <div class="@if($out->result == 1)item-result-gold @elseif($out->result == 2)item-result-silver @elseif($out->result == 3)item-result-bronze @endif item-width">@if(!empty($out->result)){{ $out->result }}@endif</div>
                </div>
            @endforeach    
        </div>
    </div>
@include('includes/footer')