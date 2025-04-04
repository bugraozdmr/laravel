<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-dark leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">All Products</h4>
                <a href="{{ route('product.create') }}" class="btn btn-light text-success fw-bold">
                    <i class="fas fa-plus me-1"></i> New Product
                </a>
            </div>            
            <div class="card-body">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stok</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Örnek veri, bunu @foreach ile dinamik yapabilirsin --}}
                        <tr>
                            <td>1</td>
                            <td>Kablosuz Kulaklık</td>
                            <td>Elektronik</td>
                            <td>₺999,00</td>
                            <td>25</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Düzenle</a>
                                <a href="#" class="btn btn-sm btn-danger">Sil</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Akıllı Saat</td>
                            <td>Giyilebilir</td>
                            <td>₺1499,00</td>
                            <td>15</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Düzenle</a>
                                <a href="#" class="btn btn-sm btn-danger">Sil</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
