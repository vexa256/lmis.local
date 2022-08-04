<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {!! Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Almost done. Just provide us with few more details, ',
        $Msg = 'Enter the details of your lagage items to be tracked',
    ) !!}


</div>

<div class="row">
    <div class="col-12 float-end">
        <div class="card-body float-end">
            <a href="{{ route('PIR_Step_Three') }}" type="button" class="btn mx-1 float-end   mb-2  btn-dark">
                <i class="fas me-1 fa-check " aria-hidden="true"></i>

                Go to Final Step

            </a>

        </div>
    </div>
</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    {{ HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'Add New Lagage Item', $Icon = 'fa-plus') }}
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Place Last Seen</th>
                <th>Destination of Baggage Tag</th>
                <th class="bg-dark text-light">Tag Number</th>
                {{-- <th>Date Created</th> --}}
                <th class="bg-danger fw-bolder text-light"> Color Type </th>
                <th class="bg-danger fw-bolder text-light"> Brand Name </th>
                <th class="bg-danger fw-bolder text-light"> 3 Distinctive Items in The Bag </th>

                <th>Date last Seen</th>
                <th class="bg-danger fw-bolder text-light">Delete Entry</th>



            </tr>
        </thead>
        <tbody>
            @isset($Details)
                @foreach ($Details as $data)
                    <tr>

                        <td>{{ $data->PlaceWhereBagWasLastSeen }}</td>
                        <td>{{ $data->DestinationOnBaggageTag }}</td>
                        <td>{{ $data->{'TagNumber(OmmitIfUnknown)'} }}</td>
                        <td>{{ $data->{'ColorType(OmmitIfUnknown)'} }}</td>
                        <td>{{ $data->{'BrandNameOfBaggage(OmmitIfUnknown)'} }}</td>
                        {{-- <td> --}}

                        <td>
                            <a data-bs-toggle="modal" class="btn btn-dark shadow-lg btn-sm" href="#Desc{{ $data->id }}">

                                <i class="fas fa-binoculars" aria-hidden="true"></i>
                            </a>

                        </td>

                        {{-- </td> --}}
                        <td class="bg-dark text-light">
                            {!! date('F j, Y', strtotime($data->Date)) !!}



                        </td>



                        <td>

                            {!! ConfirmBtn(
                                $data = [
                                    'msg' => 'You want to delete this record',
                                    'route' => route('DeleteData', ['id' => $data->id, 'TableName' => 'passenger_laguage_details']),
                                    'label' => '<i class="fas fa-trash"></i>',
                                    'class' => 'btn btn-danger btn-sm deleteConfirm admin',
                                ],
                            ) !!}

                        </td>



                    </tr>
                @endforeach
            @endisset



        </tbody>
    </table>
</div>
<!--end::Card body-->
@include('Passenger.NewItem')


@isset($Details)
    @include('viewer.viewer', [
        'PassedData' => $Details,
        'Title' => 'Distinctive items in the selected lagage',
        'DescriptionTableColumn' => 'ListThreeDistinctiveItemsInTheBag',
    ])
@endisset
