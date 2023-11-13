@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Webinar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('webinars.update', ['webinar' => $webinar->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="web_tool" class="col-md-4 col-form-label text-md-right">{{ __('Web Tool') }}</label>

                                <div class="col-md-6">
                                    <select id="web_tool" class="form-control @error('web_tool') is-invalid @enderror" name="web_tool" required autofocus>
                                        <option value="" disabled>Select Web Tool</option>
                                        <option value="Youtube" {{ $webinar->web_tool === 'Youtube' ? 'selected' : '' }}>Youtube</option>
                                        <option value="Google Meet" {{ $webinar->web_tool === 'Google Meet' ? 'selected' : '' }}>Google Meet</option>
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
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $webinar->date) }}" required>

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
                                    <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time', $webinar->start_time) }}" required>

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
                                    <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time', $webinar->end_time) }}" required>

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
                                    <textarea id="resource_speaker" class="form-control @error('resource_speaker') is-invalid @enderror" name="resource_speaker" required>{{ old('resource_speaker', $webinar->resource_speaker) }}</textarea>

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
                                    <input id="web_link" type="url" class="form-control @error('web_link') is-invalid @enderror" name="web_link" value="{{ old('web_link', $webinar->web_link) }}">

                                    @error('web_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Webinar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
