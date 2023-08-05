@extends('layouts.app')

@section('content')
    <!-- Include the Halyk Bank JS library -->
    <script src="{{ asset('assets/js/test-epay.js') }}"></script>


    <script>
        // PHP variables passed from the controller
        const auth = @json($auth);
        const invoiceId = "{{ $invoiceID }}";
        const amount = "{{ $amount }}";
        const terminal = "{{ $terminal }}";
        // The createPaymentObject function
        const createPaymentObject = function(auth, invoiceId, amount) {
            const paymentObject = {
                invoiceId: invoiceId,
                backLink: "https://example.kz/success.html",
                failureBackLink: "https://example.kz/failure.html",
                postLink: "https://example.kz/",
                failurePostLink: "https://example.kz/order/1123/fail",
                language: "rus",
                description: "Оплата в интернет магазине",
                accountId: "testuser1",
                terminal: terminal,
                amount: amount,
                data: "{\"statement\":{\"name\":\"Arman      Ali\",\"invoiceID\":\"80000016\"}}",
                currency: "KZT",
                phone: "77777777777",
                email: "example@example.com",
                cardSave: true //Параметр должен передаваться как Boolean
            };
            paymentObject.auth = auth;
            return paymentObject;
        };


        halyk.showPaymentWidget(createPaymentObject(auth, invoiceId, amount), true);
    </script>

@endsection
