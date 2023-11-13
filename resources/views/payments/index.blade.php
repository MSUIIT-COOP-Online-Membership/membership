@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Payment List') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member</th>
                                    <th>Branch</th>
                                    <th>Amount</th>
                                    <th>Coop Teller</th>
                                    <!-- Add more columns as needed -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->member->lname }}, {{ $payment->member->fname }} {{ $payment->member->mname }}</td>
                                        <td>{{ $payment->branch->name }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->staff->fname }} {{ $payment->staff->lname }}</td>
                                        <!-- Add more columns as needed -->
                                        <td>
                                            <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <!-- Add delete button if you want to implement deletion -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No payments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
