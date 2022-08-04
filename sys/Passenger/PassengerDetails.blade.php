<form method="POST" action="{{ route('SavePassengerData') }}">

    @csrf
    <div class="row">

        @include('Passenger.Welcome')

        <div class="row">
            @foreach ($Form as $data)
                @if ($data['type'] == 'string')
                    {{ CreateInputText($data, $placeholder = null, $col = '4') }}
                @elseif ('smallint' == $data['type'] ||
                    'bigint' === $data['type'] ||
                    'integer' == $data['type'] ||
                    'bigint' == $data['type'])
                    {{ CreateInputInteger($data, $placeholder = null, $col = '4') }}
                @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')
                    {{ CreateInputDate($data, $placeholder = null, $col = '6') }}
                @endif
            @endforeach

        </div>

        <input type="hidden" name="created_at" value="{{ date('Y-m-d h:i:s') }}">


        <input type="hidden" name="FullName" value="{{ Auth::user()->name }}">

        <input type="hidden" name="Email" value="{{ Auth::user()->email }}">

        <input type="hidden" name="TableName" value="passengers">

        <input type="hidden" name="PID" value="{{ Auth::user()->uuid }}">

        <input type="hidden" name="status" value="pending">


    </div>
</form>
