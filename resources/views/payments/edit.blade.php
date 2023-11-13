@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Payment') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('payments.update', $payment->id) }}">
                            @csrf
                            @method('PATCH')

                            <!-- Member -->
                            <div class="form-group">
                                <label for="member_id">Member</label>
                                <select id="member_id" class="form-control @error('member_id') is-invalid @enderror" name="member_id" required>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $payment->member_id == $member->id ? 'selected' : '' }}>{{ $member->lname }}, {{ $member->fname }} {{ $member->mname }}</option>
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
                                        <option value="{{ $branch->id }}" {{ $payment->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Amount -->
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}" required>
                            </div>

                            <!-- Coop Teller -->
                            <div class="form-group">
                                <label for="coop_teller">Coop Teller</label>
                                <select class="form-control" id="coop_teller" name="coop_teller" required>
                                    @foreach($staffMembers as $staff)
                                        <option value="{{ $staff->id }}" {{ $payment->coop_teller == $staff->id ? 'selected' : '' }}>{{ $staff->fname }} {{ $staff->lname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
