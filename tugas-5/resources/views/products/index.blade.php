@extends('template')

@section('title', 'Daftar Produk')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <div>
            <h4 class="mb-0 fw-bold">Daftar Produk</h4>
            <small class="text-muted">Kelola data produk dan variant produk</small>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Variant</th>
                        <th class="text-center" width="220">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="fw-semibold">{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                            @forelse($product->variants as $variant)
                                <div class="border rounded p-2 mb-2 bg-light">
                                    <b>{{ $variant->name }}</b><br>
                                    <small class="text-muted">
                                        {{ $variant->description }} <br>
                                        Proc: {{ $variant->processor }} |
                                        RAM: {{ $variant->memory }} |
                                        Storage: {{ $variant->storage }}
                                    </small>
                                </div>
                            @empty
                                <span class="badge bg-secondary">Belum ada variant</span>
                            @endforelse
                        </td>
                        <td class="text-center">
                            <a href="{{ route('variants.create', $product) }}" class="btn btn-sm btn-success mb-1">
                                Variant
                            </a>

                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning mb-1">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger mb-1" onclick="return confirm('Yakin hapus produk?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Data produk belum tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection