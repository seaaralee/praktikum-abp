@extends('template')

@section('title', 'Form Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h4 class="mb-0 fw-bold">Form {{ $title }} Produk</h4>
                <small class="text-muted">Isi data produk dengan benar</small>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ $route }}">
                    @csrf

                    @if($method === 'PUT')
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $product->name) }}"
                            placeholder="Contoh: Laptop Asus">

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="price"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', $product->price) }}"
                            placeholder="Contoh: 10000000">

                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection