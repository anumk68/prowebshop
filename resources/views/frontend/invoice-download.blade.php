<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333; margin: 0; padding: 40px; background: #f9f9f9; }
        .invoice-box { max-width: 800px; margin: auto; background: #fff; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0,0,0,0.15); }
        .invoice-box table { width: 100%; line-height: inherit; text-align: left; border-collapse: collapse; }
        .invoice-box table td { padding: 8px; vertical-align: top; }
        .invoice-box table tr.heading td { background: #f2f2f2; border-bottom: 1px solid #ddd; font-weight: bold; }
        .invoice-box table tr.item td { border-bottom: 1px solid #eee; }
        .invoice-box table tr.total td:nth-child(4) { font-weight: bold; border-top: 2px solid #eee; }
        .logo { width: 150px; margin-bottom: 20px; }
        .title { font-size: 28px; margin: 0; }
        .info p { margin: 4px 0; }
    </style>
</head>
<body>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <img src="{{ public_path('frontend/img/prowebshop_logo_head.png') }}" alt="Company Logo" class="logo">

                                <h1 class="title">ProWebShop</h1>
                            </td>

                            <td style="text-align:right;">
                                <strong>Invoice #: </strong>{{ $order->id }}<br>
                                <strong>Date: </strong>{{ $order->created_at->format('d M, Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4" class="info">
                    <table>
                        <tr>
                            <td>
                                <strong>Billing Address:</strong><br>
                                {{ $order->address }}
                            </td>

                            <td style="text-align:right;">
                                <strong>Customer Details:</strong><br>
                                Name: {{ optional($order->user)->name }}<br>
                                Email: {{ optional($order->user)->email }}<br>
                                @if(optional($order->user)->phone)
                                    Phone: {{ $order->user->phone }}<br>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td style="width:5%;">#</td>
                <td style="width:55%;">Package</td>
                <td style="width:20%;">Quantity</td>
                <td style="width:20%;">Subtotal</td>
            </tr>

            @foreach ($order->items as $index => $item)
            <tr class="item">
                <td>{{ $index + 1 }}</td>
                <td>{{ optional($item->package)->title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach

            <tr class="total">
                <td></td>
                <td></td>
                <td style="text-align:right;"><strong>Total:</strong></td>
                <td><strong>{{ number_format($order->total_amount, 2) }}</strong></td>
            </tr>
        </table>
    </div>

</body>
</html>
