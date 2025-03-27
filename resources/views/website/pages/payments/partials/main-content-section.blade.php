<!DOCTYPE html>

<html lang="en">



<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <style type="text/css">

        .payments-main-div {

            margin: 0 auto;

        }



        .payment-buttons {

            margin: 0 auto;

            margin-top: 20px;

            margin-bottom: 20px;

        }

    </style>

</head>



<body>

    <div id="page-content-wrapper" class="payments d-flex">

        <!-- Page content-->

        <div class="container">

            <div class="pay-methods text-center">

                <label>Perfect Money Payment Method</label>

                <div class="col-4 flex">

                    <div class="flex payment-buttons">

                        <?php

                        /**

                         *

                         * @author Charles Patterson <charlesassets@gmail.com>

                         *

                         */

                        ?>

                                 {{ $subCategory_detail }}

                        <form action="https://perfectmoney.com/api/step1.asp" method="POST">

                            @csrf

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



                            <input type="hidden" value="{{ $subCategory_detail->id }}" name="subcategory_id">

                            <input type="hidden" value="{{ $subCategory_detail->name }}" name="name">

                            <input type="hidden" value="{{ $subCategory_detail->description }}" name="description">

                            <input type="hidden" value="{{ $subCategory_detail->price }}" name="checkout_detail">

                            <input type="hidden" value="{{ $subCategory_detail->status }}" name="status">



                            <input type="hidden" name="PAYEE_ACCOUNT" value="U15411735">

                            <input type="hidden" name="PAYEE_NAME" value="techflix">

                            <input type="hidden" name="PAYMENT_ID" value="{{\Illuminate\Support\Str::uuid()}}">

                            <input type="hidden" name="PAYMENT_AMOUNT" value="{{ $subCategory_detail->price }}">

                            <input type="hidden" name="PAYMENT_UNITS" value="USD">
                            <input type="hidden" name="STATUS_URL" value="{{ route('perfectmoney.status') }}">
                            <input type="hidden" name="PAYMENT_URL" value="{{ route('perfectmoney.payment') }}">

                            <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">

                            <input type="hidden" name="NOPAYMENT_URL" value="{{ route('payment.cancel') }}">

                            <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">

                            <input type="hidden" name="SUGGESTED_MEMO" value="Pay Now">

                            <input type="hidden" name="BAGGAGE_FIELDS" value="IDENT">

                            <input type="submit" name="PAYMENT_METHOD" value="Pay Now!">



                        </form>



                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Add this script tag to your Blade template -->

<script>
    document.getElementById('yourFormId').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately

        // Gather your form data
        var formData = {
            "_token": "{{ csrf_token() }}",
            "subcategory_id": "{{ $subCategory_detail->id }}",
            // Include other fields as needed
        };

        fetch("{{ route('store.order.details') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': formData['_token']
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // After successful storage, submit the form to Perfect Money
                event.target.submit();
            } else {
                // Handle failure
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>


</body>



</html>

