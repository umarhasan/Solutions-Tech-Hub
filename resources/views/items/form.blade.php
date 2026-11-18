@extends('layouts.app') @section('title',$item->exists?'Edit Item':'Add Item') @section('content')<div class="pagehead">
    <div>
        <h1>{{ $item->exists?'Edit Item':'Add New Item' }}</h1>
        <div class="muted">Excel sheet ke fields ko inventory item mein maintain karein.</div>
    </div><a class="btn secondary" href="/items">Back</a>
</div>
<div class="card">
    <form method="post" action="{{ $item->exists?'/items/'.$item->id:'/items' }}">@csrf @if($item->exists)@method('PUT')@endif<div class="row">
            <div class="field"><label>Item name *</label><input name="name" required value="{{ old('name',$item->name) }}"></div>
            <div class="field"><label>SKU / Code</label><input name="sku" value="{{ old('sku',$item->sku) }}"></div>
            <div class="field"><label>Category</label><select name="category_id">
                    <option value="">Uncategorized</option>@foreach($categories as $c)<option value="{{ $c->id }}" @selected(old('category_id',$item->category_id)==$c->id)>{{ $c->name }}</option>@endforeach
                </select></div>
        </div>
        <div class="row">
            <div class="field"><label>Brand</label><input name="brand" value="{{ old('brand',$item->brand) }}"></div>
            <div class="field"><label>Excel sheet source</label><select name="source_sheet">
                    <option value="ITEMS">ITEMS</option>
                    <option value="RAMS-HARDS" @selected(old('source_sheet',$item->source_sheet)=='RAMS-HARDS')>RAMS-HARDS</option>
                    <option value="SCRAPED ALL" @selected(old('source_sheet',$item->source_sheet)=='SCRAPED ALL')>SCRAPED ALL</option>
                </select></div>
        </div>
        <div class="row">
            <div class="field"><label>Buying price (Rs) *</label><input type="number" min="0" step="0.01" name="buying_price" required value="{{ old('buying_price',$item->buying_price??0) }}"></div>
            <div class="field"><label>Selling price (Rs) *</label><input type="number" min="0" step="0.01" name="selling_price" required value="{{ old('selling_price',$item->selling_price??0) }}"></div>
            <div class="field"><label>Opening / current quantity *</label><input type="number" min="0" name="quantity" required value="{{ old('quantity',$item->quantity??0) }}"></div>
            <div class="field"><label>Low-stock limit *</label><input type="number" min="0" name="low_stock_limit" required value="{{ old('low_stock_limit',$item->low_stock_limit??2) }}"></div>
        </div>
        <div class="field"><label>Remarks / Description</label><textarea name="description">{{ old('description',$item->description) }}</textarea></div><button class="btn">Save Item</button>
    </form>
</div>@endsection