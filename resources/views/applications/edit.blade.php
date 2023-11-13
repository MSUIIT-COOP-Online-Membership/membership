@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Application') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('applications.update', $application->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Type -->
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="New Member" {{ $application->type == 'New Member' ? 'selected' : '' }}>New Member</option>
                                    <option value="For Updating" {{ $application->type == 'For Updating' ? 'selected' : '' }}>For Updating</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Pending" {{ $application->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="In Review" {{ $application->status == 'In Review' ? 'selected' : '' }}>In Review</option>
                                    <option value="Approved" {{ $application->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                </select>
                            </div>

                            <!-- Member -->
                            <div class="form-group">
                                <label for="member_id">Member</label>
                                <select id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id" required>
                                    <option value="" disabled>Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $application->member_id == $member->id ? 'selected' : '' }}>{{ $member->lname }}, {{ $member->fname }} {{ $member->mname }}</option>
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
                                        <option value="{{ $branch->id }}" {{ $application->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Approved By -->
                            <div class="form-group">
                                <label for="approved_by">Approved By</label>
                                <select class="form-control" id="approved_by" name="approved_by" required>
                                    @foreach($staffMembers as $staff)
                                        <option value="{{ $staff->id }}" {{ $application->approved_by == $staff->id ? 'selected' : '' }}>{{ $staff->fname }} {{ $staff->lname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Payment -->
                            <div class="form-group">
                                <label for="payment_id">Payment</label>
                                <select class="form-control" id="payment_id" name="payment_id" required>
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}" {{ $application->payment_id == $payment->id ? 'selected' : '' }}>{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
