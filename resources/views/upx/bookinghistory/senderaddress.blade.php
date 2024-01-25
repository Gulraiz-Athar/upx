<address>
    @if(!empty($booking->addressessender->company))
        <strong> Company: </strong>{{ $booking->addressessender->company }}<br>
    @endif
    <strong> Name: </strong> {{ $booking->addressessender->name }} {{ $booking->addressessender->lastname }}<br>
    @if(!empty($booking->addressessender->phonenumber))
        <strong>Phone: </strong> {{ $booking->addressessender->phonenumber }}<br>
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

    @if(!empty($booking->addressessender->id_type))
        <strong> ID Type: </strong> {{ $booking->addressessender->id_type }}<br>
    @endif

    @if(!empty($booking->addressessender->id_number))
        <strong>ID Number: </strong> {{ $booking->addressessender->id_number }}<br>
    @endif


    <strong> ID doc image: </strong>
    @if(!empty($booking->addressessender->id_doc_image))
        <a href="{{ url('public/images/id_document/'.$booking->addressessender->id_doc_image) }}" target="_blank"><i
                class="fa fa-eye"></i></a> | <a
            href="{{ url('public/images/id_document/'.$booking->addressessender->id_doc_image) }}" download=""><i
                class="fa fa-download"></i></a><br>
    @else
        <a data-toggle="modal" data-id="{{$booking->addressessender->id}}" data-target=".myModal" class="bookingid"
           title="Upload document">
            <i class="fa fa-upload"></i>
        </a>
    @endif
</address>
