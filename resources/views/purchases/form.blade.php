@extends('layouts.app') @section('title','Add Purchase') @section('content')<div class="pagehead">
    <div>
        <h1>Add Stock / Purchase</h1>
        <div class="muted">Purchase save hote hi item quantity barh jayegi.</div>
    </div><a class="btn secondary" href="/purchases">Back</a>
</div>
<div class="card">
    <form method="post" action="/purchases">@csrf<div class="row">
            <div class="field"><label>Purchase date *</label><input type="date" name="purchase_date" value="{{ today()->toDateString() }}" required></div>
            <div class="field"><label>Supplier name</label><input name="supplier_name"></div>
        </div>
        <div class="row">
            <div class="field"><label>Item *</label><select name="item_id" required>
                    <option value="">Choose item</option>@foreach($items as $i)<option value="{{ $i->id }}">{{ $i->name }} (stock {{ $i->quantity }})</option>@endforeach
                </select></div>
            <div class="field"><label>Quantity added *</label><input type="number" min="1" name="quantity" value="1" required></div>
            <div class="field"><label>Unit buying cost (Rs) *</label><input type="number" min="0" step="0.01" name="unit_cost" value="0" required></div>
        </div>
        <div class="field"><label>Payment made now (Rs) *</label><input type="number" min="0" step="0.01" name="paid_amount" value="0" required></div>
        <div class="field"><label>Remarks</label><textarea name="notes"></textarea></div><button class="btn">Save Purchase & Add Stock</button>
    </form>
</div>@endsection