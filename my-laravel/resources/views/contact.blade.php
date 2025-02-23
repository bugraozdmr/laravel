@extends('app')

@section('content')
    <div class="container mt-4">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="text-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <form action="{{ route('contact.submit') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection



<?php
//<input type="hidden" name="__token" value="{{ csrf_token() }}"> uzun yol csrf
?>