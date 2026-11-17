
@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')

<style>
    .catalog {
        max-width: 1100px;
        margin: 35px auto;
        padding: 0 20px;
        color: #263248;
    }

    .catalog-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .catalog-header h1 {
        font-size: 30px;
        margin: 0 0 8px;
        color: #172554;
        font-weight: 800;
    }

    .catalog-header p {
        color: #64748b;
        margin: 0;
    }

    .catalog-count {
        background: #eff6ff;
        color: #2563eb;
        padding: 12px 18px;
        border-radius: 12px;
        font-weight: 700;
    }

    .catalog-search {
        display: flex;
        align-items: end;
        gap: 12px;
        flex-wrap: wrap;
        background: white;
        padding: 20px;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
    }

    .search-field {
        flex: 1;
        min-width: 200px;
    }

    .search-field label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 14px;
    }

    .search-field input {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 9px;
        outline: none;
        font-size: 14px;
        transition: .2s;
    }

    .search-field input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
    }

    .btn-search {
        background: #2563eb;
        color: white;
        padding: 12px 22px;
        border: none;
        border-radius: 9px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .btn-search:hover {
        background: #1d4ed8;
    }

    .btn-reset {
        color: #64748b;
        text-decoration: none;
        padding: 12px 10px;
        font-weight: 600;
    }

    .btn-reset:hover {
        color: #2563eb;
    }

    .table-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(15, 23, 42, .05);
    }

    .table-heading {
        padding: 18px 22px;
        border-bottom: 1px solid #e2e8f0;
        font-weight: 700;
        color: #172554;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .catalog-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 600px;
    }

    .catalog-table thead {
        background: #f1f5f9;
    }

    .catalog-table th {
        padding: 16px 20px;
        text-align: left;
        color: #475569;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .catalog-table td {
        padding: 17px 20px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 14px;
    }

    .catalog-table tbody tr:nth-child(even) {
        background: #f8fafc;
    }

    .catalog-table tbody tr {
        transition: background .2s;
    }

    .catalog-table tbody tr:hover {
        background: #eff6ff;
    }

    .product-link {
        color: #2563eb;
        text-decoration: none;
        font-weight: 700;
    }

    .product-link:hover {
        color: #1e40af;
        text-decoration: underline;
    }

    .category-label {
        display: inline-block;
        padding: 6px 11px;
        background: #f1f5f9;
        color: #475569;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .product-price {
        color: #15803d;
        font-weight: 800;
        white-space: nowrap;
    }

    .empty-state {
        text-align: center;
        padding: 45px 20px !important;
        color: #64748b;
    }

    @media (max-width: 600px) {
        .catalog {
            margin: 20px auto;
            padding: 0 12px;
        }

        .catalog-header h1 {
            font-size: 24px;
        }

        .catalog-search {
            align-items: stretch;
        }

        .btn-search {
            flex: 1;
        }
    }
</style>

<div class="catalog">

    <div class="catalog-header">
        <div>
            <h1>Katalog Produk</h1>
            <p>Kelola dan lihat informasi harga serta stok produk toko.</p>
        </div>

        <div class="catalog-count">
            {{ count($produk) }} Produk
        </div>
    </div>

    <form method="GET"
          action="{{ route('katalog.index') }}"
          class="catalog-search">

        <div class="search-field">
            <label for="q">Cari Nama Produk</label>

            <input
                type="text"
                id="q"
                name="q"
                value="{{ $q }}"
                placeholder="Masukkan nama produk..."
            >
        </div>

        <button type="submit" class="btn-search">
            Cari Produk
        </button>

        @if ($q !== '')
            <a href="{{ route('katalog.index') }}" class="btn-reset">
                Reset
            </a>
        @endif
    </form>

    <div class="table-card">

        <div class="table-heading">
            Daftar Produk Toko
        </div>

        <div class="table-responsive">

            <table class="catalog-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($produk as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <a
                                    href="{{ route('katalog.show', $item['id']) }}"
                                    class="product-link"
                                >
                                    {{ $item['nama'] }}
                                </a>
                            </td>

                            <td>
                                <span class="category-label">
                                    {{ $item['kategori'] }}
                                </span>
                            </td>

                            <td class="product-price">
                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                            </td>

                            <td>
                                <x-status-stok :stok="$item['stok']" />
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="empty-state">
                                {{ $q !== '' ? 'Produk tidak ditemukan.' : 'Belum ada produk.' }}
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
