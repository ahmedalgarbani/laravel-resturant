<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RazorPay</title>
    <style>
        .razorpay-payment-button{
            display: none;
        }
    </style>
</head>
<body>
@php
$grant_total = session()->get('grant_total');
$totalAmount = $grant_total * config('PaymentGetwaySetting.razorpay_rate') *100;

@endphp
    <form action="{{route('razorpay-payment')}}" method="post">
        @method('POST')
        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{config('PaymentGetwaySetting.razorpay_api_key')}}"
        data-amount="{{$totalAmount}}"
        data-currency="{{config('PaymentGetwaySetting.razorpay_currency')}}"
        data-buttontext="Pay"
        data-name="Payment"
        data-description="Payment For Product"
        data-prefill.name="Ahmed"
        data-prefill.email="user@gmail.com"
        data-theme-color="#ff7529"

        >

        </script>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.razorpay-payment-button').click()
        });

    </script>
</body>
</html>
