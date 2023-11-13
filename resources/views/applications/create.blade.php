@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Application') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('applications.store') }}">
                            @csrf

                            <!-- Type -->
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="New Member">New Member</option>
                                    <option value="For Updating">For Updating</option>
                                </select>
                            </div>


                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Pending">Pending</option>
                                    <option value="In Review">In Review</option>
                                    <option value="Approved">Approved</option>
                                </select>
                            </div>


                            <!-- Member -->
                            <div class="form-group">
                                <label for="member_id">Member</label>
                                <select id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id" required>
                                    <option value="" disabled selected>Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->lname }}, {{ $member->fname }} {{ $member->mname }}</option>
                                    @endforeach
                                </select>
                                @error('member_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- Branch -->
                            <div class="form-group">
                                <label for="branch_id">Branch</label>
                                <select class="form-control" id="branch_id" name="branch_id" required>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Approved By -->
                            <div class="form-group">
                                <label for="approved_by">Approved By</label>
                                <select class="form-control" id="approved_by" name="approved_by" required>
                                    @foreach($staffMembers as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->fname }} {{ $staff->lname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Payment -->
                            <div class="form-group">
                                <label for="payment_id">Payment</label>
                                <select class="form-control" id="payment_id" name="payment_id" required>
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
