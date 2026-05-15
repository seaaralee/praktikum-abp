@extends('template')

@section('title', 'Tambah Variant')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h4 class="mb-0 fw-bold">Tambah Variant</h4>
                <small class="text-muted">Produk: {{ $product->name }}</small>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('variants.store', $product) }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Variant</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Gaming Series">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi variant">{{ old('description') }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Processor</label>
                            <input type="text" name="processor" class="form-control" value="{{ old('processor') }}" placeholder="Ryzen 5">
                            @error('processor') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Memory</label>
                            <input type="text" name="memory" class="form-control" value="{{ old('memory') }}" placeholder="16 GB">
                            @error('memory') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Storage</label>
                            <input type="text" name="storage" class="form-control" value="{{ old('storage') }}" placeholder="512 GB SSD">
                            @error('storage') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Simpan Variant
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection