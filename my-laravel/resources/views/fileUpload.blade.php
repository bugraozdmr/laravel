@extends('app')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" id="file" name="file" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection



<?php
//<input type="hidden" name="__token" value="{{ csrf_token() }}"> uzun yol csrf
?>