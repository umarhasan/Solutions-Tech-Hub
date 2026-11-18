
@extends('layouts.app')

@section('title', 'Items & Stock')

@section('content')

<style>
    .items-page {
        width: 100%;
        max-width: 100%;
        min-width: 0;
    }

    .items-page * {
        box-sizing: border-box;
    }

    .items-page .pagehead {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 22px;
    }

    .items-page .pagehead h1 {
        margin: 0 0 6px;
        font-size: 26px;
        font-weight: 700;
        color: #172033;
    }

    .items-page .muted {
        color: #64748b;
        font-size: 13px;
    }

    .items-page .card {
        width: 100%;
        min-width: 0;
        padding: 22px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .items-page .row {
        display: flex;
        align-items: flex-end;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 20px;
    }

    .items-page .field {
        flex: 1 1 200px;
        min-width: 0;
    }

    .items-page label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
    }

    .items-page input,
    .items-page select {
        display: block;
        width: 100%;
        min-height: 42px;
        padding: 9px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 7px;
        background: #fff;
        color: #1e293b;
        font-size: 14px;
        outline: none;
    }

    .items-page input:focus,
    .items-page select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
    }

    .items-page .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        min-height: 38px;
        padding: 9px 14px;
        border: 1px solid #2563eb;
        border-radius: 7px;
        background: #2563eb;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .items-page .btn:hover {
        background: #1d4ed8;
        color: #fff;
    }

    .items-page .btn.secondary {
        background: #fff;
        color: #334155;
        border-color: #cbd5e1;
    }

    .items-page .btn.secondary:hover {
        background: #f1f5f9;
    }

    .items-page .btn.danger {
        background: #fff;
        color: #dc2626;
        border-color: #fecaca;
    }

    .items-page .btn.danger:hover {
        background: #fef2f2;
    }

    .items-page .btn.small {
        min-height: 31px;
        padding: 6px 10px;
        font-size: 12px;
    }

    .items-page .tablewrap {
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
    }

    .items-page table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
        border-spacing: 0;
        table-layout: auto;
    }

    .items-page table th {
        padding: 13px 12px;
        background: #f8fafc;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
        border-bottom: 1px solid #e2e8f0;
    }

    .items-page table td {
        padding: 13px 12px;
        color: #334155;
        font-size: 13px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }

    .items-page table tbody tr:last-child td {
        border-bottom: none;
    }

    .items-page table tbody tr:hover {
        background: #f8fafc;
    }

    .items-page .num {
        text-align: right;
        white-space: nowrap;
        font-variant-numeric: tabular-nums;
    }

    .items-page .item-name {
        color: #0f172a;
        font-weight: 600;
    }

    .items-page .badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 20px;
        background: #fff7ed;
        color: #c2410c;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .items-page .in-stock {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 20px;
        background: #ecfdf5;
        color: #047857;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .items-page .actions {
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .items-page .actions form {
        display: inline-flex;
        margin: 0;
    }

    .items-page .empty-state {
        padding: 35px 15px;
        color: #64748b;
        text-align: center;
    }

    /* Compact pagination: arrows and page numbers stay in one row */
    .items-page .items-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        width: 100%;
        margin-top: 18px;
        padding-top: 16px;
        border-top: 1px solid #e5e7eb;
    }

    .items-page .pagination-info {
        color: #64748b;
        font-size: 13px;
    }

    .items-page .pagination-buttons {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 5px;
    }

    .items-page .page-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 10px;
        margin: 0;
        border: 1px solid #e2e8f0;
        border-radius: 7px;
        background: #fff;
        color: #334155;
        font-size: 13px;
        line-height: 1;
        text-decoration: none;
        white-space: nowrap;
    }

    .items-page .page-btn:hover {
        background: #f1f5f9;
    }

    .items-page .page-btn.active {
        background: #2563eb;
        border-color: #2563eb;
        color: #fff;
    }

    .items-page .page-btn.disabled {
        background: #f8fafc;
        color: #94a3b8;
        cursor: not-allowed;
    }

    .items-page .page-ellipsis {
        padding: 0 4px;
        color: #64748b;
    }

    @media (max-width: 700px) {
        .items-page .card {
            padding: 14px;
        }

        .items-page .pagehead h1 {
            font-size: 22px;
        }

        .items-page .items-pagination {
            align-items: flex-start;
            flex-direction: column;
        }

        .items-page .pagination-buttons {
            justify-content: flex-start;
        }
    }
</style>

<div class="items-page">

    <div class="pagehead">
        <div>
            <h1>Items &amp; Stock</h1>
            <div class="muted">
                Items, purchase cost, sale price and remaining quantity
            </div>
        </div>

        <a class="btn" href="{{ url('/items/create') }}">
            + Add Item
        </a>
    </div>

    <div class="card">

        {{-- Search and category filter --}}
        <form method="GET" action="{{ url('/items') }}" class="row">

            <div class="field">
                <label for="item-search">Search item</label>
                <input
                    id="item-search"
                    type="search"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Search by item name or SKU"
                >
            </div>

            <div class="field">
                <label for="category-filter">Category</label>

                <select id="category-filter" name="category_id">
                    <option value="">All categories</option>

                    @foreach ($categories as $c)
                        <option
                            value="{{ $c->id }}"
                            @selected((string) request('category_id') === (string) $c->id)
                        >
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                <button type="submit" class="btn">
                    Search
                </button>

                <a href="{{ url('/items') }}" class="btn secondary">
                    Reset
                </a>
            </div>

        </form>

        {{-- Items table --}}
        <div class="tablewrap">
            <table>
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th class="num">Buy (Rs.)</th>
                        <th class="num">Sale (Rs.)</th>
                        <th class="num">Qty</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>
                                {{ $item->sku ?: '—' }}
                            </td>

                            <td>
                                <div class="item-name">
                                    {{ $item->name }}
                                </div>

                                @if (!empty($item->source_sheet))
                                    <div class="muted">
                                        {{ $item->source_sheet }}
                                    </div>
                                @endif
                            </td>

                            <td>
                                {{ $item->category?->name ?: '—' }}
                            </td>

                            <td class="num">
                                {{ number_format((float) $item->buying_price, 2) }}
                            </td>

                            <td class="num">
                                {{ number_format((float) $item->selling_price, 2) }}
                            </td>

                            <td class="num">
                                {{ number_format((int) $item->quantity) }}
                            </td>

                            <td>
                                @if ($item->quantity <= $item->low_stock_limit)
                                    <span class="badge">Low stock</span>
                                @else
                                    <span class="in-stock">In stock</span>
                                @endif
                            </td>

                            <td>
                                <div class="actions">
                                    <a
                                        class="btn secondary small"
                                        href="{{ url('/items/' . $item->id . '/edit') }}"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ url('/items/' . $item->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this item?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn danger small">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty-state">
                                No items found. Add your first item.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($items->hasPages())
            <div class="items-pagination">

                <div class="pagination-info">
                    Showing {{ $items->firstItem() }}
                    to {{ $items->lastItem() }}
                    of {{ $items->total() }} items
                </div>

                <nav class="pagination-buttons" aria-label="Items pagination">

                    {{-- Previous --}}
                    @if ($items->onFirstPage())
                        <span class="page-btn disabled">‹ Previous</span>
                    @else
                        <a class="page-btn"
                           href="{{ $items->previousPageUrl() }}">
                            ‹ Previous
                        </a>
                    @endif

                    {{-- First page and left ellipsis --}}
                    @if ($items->currentPage() > 3)
                        <a class="page-btn"
                           href="{{ $items->url(1) }}">1</a>
                    @endif

                    @if ($items->currentPage() > 4)
                        <span class="page-ellipsis">…</span>
                    @endif

                    {{-- Nearby page numbers --}}
                    @foreach ($items->getUrlRange(
                        max(1, $items->currentPage() - 2),
                        min($items->lastPage(), $items->currentPage() + 2)
                    ) as $page => $url)
                        <a
                            href="{{ $url }}"
                            class="page-btn {{ $page == $items->currentPage() ? 'active' : '' }}"
                            @if ($page == $items->currentPage()) aria-current="page" @endif
                        >
                            {{ $page }}
                        </a>
                    @endforeach

                    {{-- Right ellipsis and last page --}}
                    @if ($items->currentPage() < $items->lastPage() - 3)
                        <span class="page-ellipsis">…</span>
                    @endif

                    @if ($items->currentPage() < $items->lastPage() - 2)
                        <a class="page-btn"
                           href="{{ $items->url($items->lastPage()) }}">
                            {{ $items->lastPage() }}
                        </a>
                    @endif

                    {{-- Next --}}
                    @if ($items->hasMorePages())
                        <a class="page-btn"
                           href="{{ $items->nextPageUrl() }}">
                            Next ›
                        </a>
                    @else
                        <span class="page-btn disabled">Next ›</span>
                    @endif

                </nav>
            </div>
        @endif

    </div>
</div>

@endsection
