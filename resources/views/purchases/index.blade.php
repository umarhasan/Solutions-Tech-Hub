@extends('layouts.app') @section('title','Purchases') @section('content')<div class="pagehead">
    <div>
        <h1>Stock Purchases</h1>
        <div class="muted">New stock and supplier payment record.</div>
    </div><a class="btn" href="/purchases/create">+ Add Purchase</a>
</div>
<div class="card">
    <div class="tablewrap">
        <table>
            <tr>
                <th>Purchase No</th>
                <th>Date</th>
                <th>Supplier / Remarks</th>
                <th>Items</th>
                <th class="num">Total</th>
                <th class="num">Paid</th>
                <th class="num">Due</th>
                <th>Record payment</th>
            </tr>@forelse($purchases as $p)<tr>
                <td>{{ $p->purchase_no }}</td>
                <td>{{ $p->purchase_date->format('d M Y') }}</td>
                <td>{{ $p->notes ?: '—' }}</td>
                <td>@foreach($p->items as $pi){{ $pi->item?->name }} × {{ $pi->quantity }}@endforeach</td>
                <td class="num">{{ number_format($p->total,2) }}</td>
                <td class="num">{{ number_format($p->paid_amount,2) }}</td>
                <td class="num">{{ number_format($p->total-$p->paid_amount,2) }}</td>
                <td>@if($p->total>$p->paid_amount)<form method="post" action="/purchases/{{ $p->id }}/payment" class="row">@csrf<input style="width:125px" type="date" name="payment_date" value="{{ today()->toDateString() }}" required><input style="width:100px" type="number" step="0.01" min="0.01" max="{{ $p->total-$p->paid_amount }}" name="amount" placeholder="Amount" required><select style="width:95px" name="method">
                            <option>Cash</option>
                            <option>Bank</option>
                            <option>Other</option>
                        </select><button class="btn small">Pay</button></form>@else <span style="color:#18834b">Paid</span>@endif</td>
            </tr>@empty<tr>
                <td colspan="8">No purchases recorded.</td>
            </tr>@endforelse
        </table>
    </div>{{ $purchases->links() }}
</div>@endsection