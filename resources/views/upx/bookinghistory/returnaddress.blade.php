@if(!empty($booking->addressesreturn))
    <address>
        @if(!empty($booking->addressesreturn->company))
            <strong> Company: </strong> {{ $booking->addressesreturn->company }}<br>
        @endif
        <strong> Name: </strong> {{ $booking->addressesreturn->name }} {{ $booking->addressesreturn->lastname }}<br>

        @if(!empty($booking->addressesreturn->phonenumber))
            <strong> Phone: </strong>{{ $booking->addressesreturn->phonenumber }}
            <br>
        @endif

        @if(!empty($booking->addressesreturn->email))
            <strong> Email: </strong>{{ $booking->addressesreturn->email }}<br>
        @endif
        <strong> Address:</strong>
        @if(!empty($booking->addressesreturn->address1))
            {{ $booking->addressesreturn->address1 }}
        @endif
        @if(!empty($booking->addressesreturn->address2))
            , {{ $booking->addressesreturn->address2 }}
        @endif
        @if(!empty($booking->addressesreturn->address3))
            , {{ $booking->addressesreturn->address3 }}
        @endif<br>


        @if(!empty($booking->addressesreturn->city))
            {{ $booking->addressesreturn->city }}
        @endif
        @if(!empty($booking->addressesreturn->state))
            , {{ $booking->addressesreturn->state }}
        @endif

        @if(!empty($booking->addressesreturn->country->name))
            , {{ $booking->addressesreturn->country->name }}
        @endif

        @if(!empty($booking->addressesreturn->country->name))
            - {{ $booking->addressesreturn->postalcode }}
        @endif<br>


    </address>
@else
    <address>
        @if(!empty($booking->addressessender->company))
            <strong> Company: </strong> {{ $booking->addressessender->company }} <br>
        @endif
        {{--<strong>{{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}</strong><br>--}}
        <strong> Name: </strong> {{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}<br>

        @if(!empty($booking->addressessender->phonenumber))
            <strong> Phone: </strong> {{ $booking->addressessender->phonenumber }}<br>
        @endif

        @if(!empty($booking->addressessender->email))
            <strong> Email: </strong>{{ $booking->addressessender->email }}<br>
        @endif
        <strong> Address: </strong>
        @if(!empty($booking->addressessender->address1))
            {{ $booking->addressessender->address1 }}
        @endif
        @if(!empty($booking->addressessender->address2))
            , {{ $booking->addressessender->address2 }}
        @endif
        @if(!empty($booking->addressessender->address3))
            , {{ $booking->addressessender->address3 }}
        @endif<br>

        @if(!empty($booking->addressessender->city))
            {{ $booking->addressessender->city }}
        @endif
        @if(!empty($booking->addressessender->state))
            , {{ $booking->addressessender->state }}
        @endif

        @if(!empty($booking->addressessender->country->name))
            , {{ $booking->addressessender->country->name }}
        @endif

        @if(!empty($booking->addressessender->country->name))
            - {{ $booking->addressessender->postalcode }}
        @endif<br>


    </address>
@endif
