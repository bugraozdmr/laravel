<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-dark leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Ürün Ekle</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="enter product name" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Catory</label>
                        <select name="category" class="form-select" required>
                            <option value="" selected disabled>Choose Category</option>
                            <option value="Elektronik">Electronics</option>
                            <option value="Giyilebilir">Clothing</option>
                            <option value="Aksesuar">Accessory</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Fiyat (₺)</label>
                        <input type="number" name="price" class="form-control" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock Amount</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
