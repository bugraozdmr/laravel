@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h3>Edit Customer</h3>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('home') }}" class="btn" style="background-color: #4643d3; color: white;">
                            <i class="fas fa-chevron-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- overriding method -->
                    @method('PUT')

                    <div class="row">
                        <!-- Mevcut Resim -->
                        <div class="col-md-12 text-left mb-3">
                            <label style="margin-left: 0.8rem">Current Image</label><br>
                            <img src="{{ asset($customer->image) }}" alt="Profile Image" class="img-thumbnail" width="150">
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>New Image (optional)</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                       name="first_name" value="{{ old('first_name', $customer->first_name) }}">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                       name="last_name" value="{{ old('last_name', $customer->last_name) }}">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', $customer->email) }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                       name="phone" value="{{ old('phone', $customer->phone) }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>Bank Account Number</label>
                                <input type="text" class="form-control @error('bank_acc_number') is-invalid @enderror" 
                                       name="bank_acc_number" value="{{ old('bank_acc_number', $customer->bank_acc_number) }}">
                                @error('bank_acc_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label>About</label>
                                <textarea name="about" class="form-control @error('about') is-invalid @enderror">{{ old('about', $customer->about) }}</textarea>
                                @error('about')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
