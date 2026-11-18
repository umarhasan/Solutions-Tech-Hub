<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Dashboard') | Solutions Tech Hub</title>
    <style>
        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: Inter, Arial, sans-serif;
            background: #f4f7fb;
            color: #172033
        }

        .top {
            background: #111c3a;
            color: #fff;
            padding: 17px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .top strong {
            font-size: 19px
        }

        .top form {
            margin: 0
        }

        .shell {
            display: flex;
            min-height: calc(100vh - 60px)
        }

        nav {
            width: 225px;
            background: #fff;
            border-right: 1px solid #e4e9f2;
            padding: 18px 12px;
            flex-shrink: 0
        }

        nav a {
            display: block;
            padding: 11px 13px;
            margin: 3px 0;
            color: #34415c;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px
        }

        nav a:hover,
        nav a.active {
            background: #eaf0ff;
            color: #2448b5
        }

        .main {
            padding: 26px;
            width: calc(100% - 225px);
            min-width: 0
        }

        .pagehead {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px
        }

        .pagehead h1 {
            font-size: 25px;
            margin: 0
        }

        .muted {
            color: #7b879c;
            font-size: 13px
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 14px
        }

        .card {
            background: white;
            border: 1px solid #e6ebf3;
            border-radius: 13px;
            padding: 18px;
            margin-bottom: 17px;
            box-shadow: 0 3px 12px #14213d05
        }

        .metric {
            font-size: 25px;
            font-weight: 750;
            margin-top: 9px
        }

        .btn {
            display: inline-block;
            background: #3156c8;
            color: #fff;
            border: 0;
            border-radius: 8px;
            padding: 10px 14px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px
        }

        .btn.secondary {
            background: #e9eef9;
            color: #293b70
        }

        .btn.danger {
            background: #b42338
        }

        .btn.small {
            padding: 6px 9px
        }

        .row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap
        }

        .field {
            flex: 1;
            min-width: 160px;
            margin-bottom: 12px
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 6px
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d6deeb;
            border-radius: 7px;
            background: white;
            font: inherit;
            font-size: 14px
        }

        textarea {
            min-height: 70px
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 13px
        }

        th,
        td {
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid #edf0f5;
            vertical-align: top
        }

        th {
            background: #f8faff;
            color: #526079;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .03em
        }

        td.num,
        th.num {
            text-align: right
        }

        .tablewrap {
            overflow-x: auto
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            background: #e0f7e9;
            color: #17633a
        }

        .alert.error {
            background: #ffebed;
            color: #9f1d2d
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 30px;
            background: #fff0d3;
            color: #8b5c00;
            font-size: 11px
        }

        .pagination {
            margin-top: 16px
        }

        .pagination a,
        .pagination span {
            padding: 6px 10px;
            background: white;
            border-radius: 5px;
            margin-right: 4px;
            text-decoration: none;
            color: #345
        }

        .split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px
        }

        .authbox {
            max-width: 430px;
            margin: 8vh auto
        }

        .authbox .card {
            padding: 28px
        }

        @media(max-width:800px) {
            .shell {
                display: block
            }

            nav {
                width: 100%;
                display: flex;
                overflow: auto;
                padding: 7px
            }

            nav a {
                white-space: nowrap
            }

            .main {
                width: 100%;
                padding: 15px
            }

            .split {
                grid-template-columns: 1fr
            }

            .top {
                padding: 14px
            }

            .pagehead {
                align-items: flex-start;
                flex-direction: column
            }
        }
    </style>
</head>

<body>
    <header class="top"><strong>Solutions Tech Hub <span style="font-weight:400;color:#b9c7ef">/ Inventory</span></strong>@auth<div style="display:flex;align-items:center;gap:14px;font-size:13px">{{ auth()->user()->name }}
            <form method="post" action="/logout">@csrf<button class="btn secondary" type="submit">Logout</button></form>
        </div>@endauth</header>
    <div class="shell">@auth<nav><a href="/" class="{{ request()->is('/')?'active':'' }}">▦ Dashboard</a><a href="/items" class="{{ request()->is('items*')?'active':'' }}">▣ Items & Stock</a><a href="/categories">▤ Categories</a><a href="/sales" class="{{ request()->is('sales*')?'active':'' }}">↗ Daily Sales</a><a href="/purchases" class="{{ request()->is('purchases*')?'active':'' }}">↙ Stock Purchases</a><a href="/expenses">− Expenses</a><a href="/laptops">▣ Laptop Details</a><a href="/reports">▥ Reports</a></nav>@endauth<main class="main">@if(session('success'))<div class="alert">{{ session('success') }}</div>@endif @if(session('error'))<div class="alert error">{{ session('error') }}</div>@endif @if($errors->any())<div class="alert error"><b>Please check:</b>
                <ul style="margin-bottom:0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>@endif @yield('content')</main>
    </div>
</body>

</html>