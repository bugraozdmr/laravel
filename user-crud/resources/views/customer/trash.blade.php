@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h3>Trash</h3>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('customers.index') }}" class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('customers.index') }}" method="GET" id="search-form">
                            <div class="input-group mb-3">
                                <input type="text" name="query" class="form-control" placeholder="Search anything..." aria-describedby="button-addon2" value="{{ request()->query('query') }}">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group mb-3">
                            <!-- Sort Dropdown -->
                            <form action="{{ route('customers.index') }}" method="GET" id="sort-form">
                                <select class="form-select" name="order" id="sort" onchange="submitSortForm()">
                                    <option @selected(request()->query('order') == 'desc') value="desc">Newest to Old</option>
                                    <option @selected(request()->query('order') == 'asc') value="asc">Old to Newest</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 text-end">
                        <a href="{{ route('customers.trash') }}" class="btn btn-dark"
                            <i class="fas fa-trash-alt"> Trash</i>
                        </a>
                    </div>                                   
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" style="border: 1px solid #dddddd">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">BAN</th>
                            <th scope="col">Created At</th> <!-- New Column -->
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->bank_acc_number }}</td>
                            <td>{{ $customer->created_at->format('d-m-Y H:i') }}</td> <!-- Display created_at -->
                            <td>
                                <a href="{{ route('customers.edit', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-edit"></i></a>
                                <a href="{{ route('customers.show', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-eye"></i></a>
                                <form id="delete-form-{{ $customer->id }}" action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('{{ $customer->id }}')" style="background: none; border: none; color: #2c2c2c;" class="ms-1 me-1">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(customerId) {
        Swal.fire({
            title: "Are you sure want to delete this?",
            text: "This can't be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, wipe it out!",
            cancelButtonText: "No, I'm begging you"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("delete-form-" + customerId).submit();
            }
        });
    }
</script>

<script>
    // onceki parametreler kaybolmasın amaç o
    // hala duzeltilebilir tum istekler burdan gitsin denebilir
    // mesela suan search direkt controllara gidiyor sevmiyom ama kalsın daha mantıklı bence
    // once ararsın ona göre sort edersin
    function submitSortForm() {
        let query = new URLSearchParams(window.location.search).get('query');
        let sortValue = document.getElementById('sort').value;

        let form = document.getElementById('sort-form');
        
        if (query) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'query';
            input.value = query;
            form.appendChild(input);
        }

        form.submit();
    }
</script>



<!-- first load the script -- reload page after flush -->
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
    </script>
@endif

@endsection
