<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinars / Create</title>
</head>
<body>
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Webinar Schedule</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('webinars.index') }}">Webinars</a></li>
                        <li class="breadcrumb-item active">Create Schedule</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h7 class="mb-0">{{ __('Please input fields to add webinar schedule.') }}</h7>
                        </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('webinars.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="web_tool" class="col-md-4 col-form-label text-md-right">{{ __('Web Tool') }}</label>

                                <div class="col-md-6">
                                    <select id="web_tool" class="form-control @error('web_tool') is-invalid @enderror" name="web_tool" required autofocus>
                                        <option value="" disabled selected>Select Web Tool</option>
                                        <option value="Youtube" {{ old('web_tool') === 'Youtube' ? 'selected' : '' }}>Youtube</option>
                                        <option value="Google Meet" {{ old('web_tool') === 'Google Meet' ? 'selected' : '' }}>Google Meet</option>
                                    </select>

                                    @error('web_tool')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required>

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Start Time') }}</label>

                                <div class="col-md-6">
                                    <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" required>

                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_time" class="col-md-4 col-form-label text-md-right">{{ __('End Time') }}</label>

                                <div class="col-md-6">
                                    <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" required>

                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="resource_speaker" class="col-md-4 col-form-label text-md-right">{{ __('Resource Speaker') }}</label>

                                <div class="col-md-6">
                                    <textarea id="resource_speaker" class="form-control @error('resource_speaker') is-invalid @enderror" name="resource_speaker"></textarea>

                                    @error('resource_speaker')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="web_link" class="col-md-4 col-form-label text-md-right">{{ __('Web Link') }}</label>

                                <div class="col-md-6">
                                    <input id="web_link" type="url" class="form-control @error('web_link') is-invalid @enderror" name="web_link">

                                    @error('web_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('webinars.index') }}" class="btn btn-danger"><i class="fas fa-times-circle mr-1"></i>{{ __('Cancel') }}</a>
                                    <div>
                                        <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt mr-1"></i>{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle mr-1"></i>{{ __('Create Schedule') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    @endsection
</body>
</html>