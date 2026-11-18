@extends('layouts.app') @section('title','Dashboard') @section('content')<div class="pagehead">
    <div>
        <h1>Dashboard</h1>
        <div class="muted">Daily business summary · {{ now()->format('d M Y') }}</div>
    </div>
    <div class="row"><a class="btn" href="/sales/create">+ Add Sale</a><a class="btn secondary" href="/purchases/create">+ Add Stock</a></div>
</div>
<div class="grid">
    <div class="card">
        <div class="muted">Today's Sale</div>
        <div class="metric">Rs {{ number_format($todaySale,0) }}</div>
    </div>
    <div class="card">
        <div class="muted">This Month Sale</div>
        <div class="metric">Rs {{ number_format($monthSale,0) }}</div>
    </div>
    <div class="card">
        <div class="muted">Current Stock Cost</div>
        <div class="metric">Rs {{ number_format($stockValue,0) }}</div>
    </div>
    <div class="card">
        <div class="muted">Total Items</div>
        <div class="metric">{{ number_format($itemsCount) }}</div>
    </div>
    <div class="card">
        <div class="muted">Customer Credit Due</div>
        <div class="metric">Rs {{ number_format($saleDue,0) }}</div>
    </div>
    <div class="card">
        <div class="muted">Supplier Payment Due</div>
        <div class="metric">Rs {{ number_format($purchaseDue,0) }}</div>
    </div>
</div>
<div class="split">
    <div class="card">
        <h3>Selected period summary</h3>
        <form method="get" class="row">
            <div class="field"><label>From</label><input type="date" name="from" value="{{ $from }}"></div>
            <div class="field"><label>To</label><input type="date" name="to" value="{{ $to }}"></div>
            <div style="align-self:end;margin-bottom:12px"><button class="btn">Apply</button></div>
        </form>
        <table>
            <tr>
                <td>Sale total</td>
                <td class="num">Rs {{ number_format($rangeSale,2) }}</td>
            </tr>
            <tr>
                <td>Purchases</td>
                <td class="num">Rs {{ number_format($rangePurchases,2) }}</td>
            </tr>
            <tr>
                <td>Expenses</td>
                <td class="num">Rs {{ number_format($rangeExpenses,2) }}</td>
            </tr>
        </table>
    </div>
    <div class="card">
        <h3>Low stock alert</h3>@if($lowStock->isEmpty())<p class="muted">No low-stock items.</p>@else<table>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Limit</th>
            </tr>@foreach($lowStock as $item)<tr>
                <td>{{ $item->name }}</td>
                <td><span class="badge">{{ $item->quantity }}</span></td>
                <td>{{ $item->low_stock_limit }}</td>
            </tr>@endforeach
        </table>@endif<a href="/items" class="btn secondary" style="margin-top:12px">Manage stock</a>
    </div>
</div>
<div class="card">
    <div class="pagehead">
        <h3>Recent sales</h3><a href="/sales" class="btn secondary">All sales</a>
    </div>
    <div class="tablewrap">
        <table>
            <tr>
                <th>Invoice</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Credit</th>
            </tr>@forelse($recentSales as $s)<tr>
                <td><a href="/sales/{{ $s->id }}">{{ $s->invoice_no }}</a></td>
                <td>{{ $s->sale_date->format('d M Y') }}</td>
                <td>{{ $s->customer_name ?: 'Walk-in' }}</td>
                <td>Rs {{ number_format($s->total,2) }}</td>
                <td>Rs {{ number_format($s->total-$s->paid_amount,2) }}</td>
            </tr>@empty<tr>
                <td colspan="5">No sales entered yet.</td>
            </tr>@endforelse
        </table>
    </div>
</div>@endsection