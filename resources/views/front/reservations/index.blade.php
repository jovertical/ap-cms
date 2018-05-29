@extends(user_env().'.layouts.main')

@section('content')
    @include(user_env().'.partials.breadcrumbs')

    <section class="collection-content">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="cart-inner">
                        <div id="cart">
                            <div class="cart-form">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Number</th>
                                            <th>Amount Payable</th>
                                            <th>Amount Paid</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reservations as $index => $reservation)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $reservation->number }} </td>
                                                <td>{{ $reservation->amount_payable }} </td>
                                                <td>{{ $reservation->amount_paid }} </td>
                                                <td>{{ $reservation->status}} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection