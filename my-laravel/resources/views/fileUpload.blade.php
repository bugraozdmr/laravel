@extends('app')

@section('content')
    <div class="container mt-4">
        <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" id="file" name="file" class="form-control" >
                @error('file')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <table>
            <tbody>
                @foreach ($files as $file)
                    <td><img style="width:100%;height:auto;" src="{{ asset($file->file_path) }}" alt="image"></td>
                @endforeach
            </tbody>
        </table>
        <table>
            <tbody>
                    <td>
                        <a href="{{route('file.download')}}">Download File</a>
                    </td>
            </tbody>
        </table>
    </div>
@endsection



<?php
//<input type="hidden" name="__token" value="{{ csrf_token() }}"> uzun yol csrf

// orjinal kullanım ama önermem asset public folder ona göre
//<td><img style="width:100%;height:auto;" src="{{ asset('uploads') . '/' . $file->file_path }}" alt="image"></td>
?>