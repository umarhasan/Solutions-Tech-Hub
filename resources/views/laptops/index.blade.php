@extends('layouts.app') @section('title','Laptop Details') @section('content')<div class="pagehead">
    <div>
        <h1>Laptop Details</h1>
        <div class="muted">Client ki “Laptops detals” Excel sheet ke mutabiq condition record.</div>
    </div>
</div>
<div class="card">
    <h3>Add laptop record</h3>
    <form method="post" action="/laptops">@csrf<div class="row">
            <div class="field"><label>Model *</label><input name="model" required></div>
            <div class="field"><label>Brand</label><input name="brand"></div>
            <div class="field"><label>Processor</label><input name="processor"></div>
            <div class="field"><label>RAM</label><input name="ram" placeholder="8GB DDR4"></div>
            <div class="field"><label>Storage</label><input name="storage"></div>
        </div>
        <div class="row">
            <div class="field"><label>Display size</label><input name="display_size"></div>
            <div class="field"><label>Display ON/OFF</label><select name="display_status">
                    <option value="">Unknown</option>
                    <option>ON</option>
                    <option>OFF</option>
                </select></div>
            <div class="field"><label>Screen condition</label><select name="screen_condition">
                    <option value="">Select</option>
                    <option>OK</option>
                    <option>Not OK</option>
                </select></div>
            <div class="field"><label>Battery condition</label><input name="battery_condition"></div>
            <div class="field"><label>Quantity</label><input type="number" min="1" name="quantity" value="1"></div>
        </div>
        <div class="row">
            <div class="field"><label>Buying price</label><input type="number" min="0" step="0.01" name="buying_price" value="0"></div>
            <div class="field"><label>Selling price</label><input type="number" min="0" step="0.01" name="selling_price" value="0"></div>
        </div>
        <div class="field"><label>Remarks</label><textarea name="remarks"></textarea></div><button class="btn">Save laptop</button>
    </form>
</div>
<div class="card">
    <h3>Laptop register</h3>
    <div class="tablewrap">
        <table>
            <tr>
                <th>Model</th>
                <th>Specs</th>
                <th>Display</th>
                <th>Screen</th>
                <th>Qty</th>
                <th>Buy</th>
                <th>Sale</th>
                <th>Remarks</th>
            </tr>@forelse($laptops as $l)<tr>
                <td>{{ $l->brand }} {{ $l->model }}</td>
                <td>{{ $l->processor }} · {{ $l->ram }} · {{ $l->storage }}</td>
                <td>{{ $l->display_status }}</td>
                <td>{{ $l->screen_condition }}</td>
                <td>{{ $l->quantity }}</td>
                <td>{{ number_format($l->buying_price,0) }}</td>
                <td>{{ number_format($l->selling_price,0) }}</td>
                <td>{{ $l->remarks }}</td>
            </tr>@empty<tr>
                <td colspan="8">No laptop records yet.</td>
            </tr>@endforelse
        </table>
    </div>{{ $laptops->links() }}
</div>@endsection