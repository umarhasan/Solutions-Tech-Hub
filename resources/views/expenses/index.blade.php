@extends('layouts.app') @section('title','Expenses') @section('content')<div class="pagehead">
    <div>
        <h1>Daily Expenses</h1>
        <div class="muted">Shop expenses daily record.</div>
    </div>
</div>
<div class="split">
    <div class="card">
        <h3>Add expense</h3>
        <form method="post" action="/expenses">@csrf<div class="field"><label>Date *</label><input type="date" name="expense_date" value="{{ today()->toDateString() }}" required></div>
            <div class="field"><label>Expense title *</label><input name="title" required placeholder="e.g. Transport / Electricity"></div>
            <div class="field"><label>Category</label><input name="category" placeholder="Rent, bills, transport"></div>
            <div class="field"><label>Amount (Rs) *</label><input type="number" step="0.01" min="0.01" name="amount" required></div>
            <div class="field"><label>Remarks</label><textarea name="notes"></textarea></div><button class="btn">Save expense</button>
        </form>
    </div>
    <div class="card">
        <h3>Expense history</h3>
        <div class="tablewrap">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Expense</th>
                    <th>Amount</th>
                    <th></th>
                </tr>@forelse($expenses as $e)<tr>
                    <td>{{ $e->expense_date->format('d M Y') }}</td>
                    <td>{{ $e->title }}
                        <div class="muted">{{ $e->category }}</div>
                    </td>
                    <td>Rs {{ number_format($e->amount,2) }}</td>
                    <td>
                        <form method="post" action="/expenses/{{ $e->id }}">@csrf @method('DELETE')<button class="btn danger small">Delete</button></form>
                    </td>
                </tr>@empty<tr>
                    <td colspan="4">No expenses yet.</td>
                </tr>@endforelse
            </table>
        </div>{{ $expenses->links() }}
    </div>
</div>@endsection