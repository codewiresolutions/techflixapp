{{--<?php--}}
{{--/**--}}
{{-- *--}}
{{-- * @author Charles Patterson <charlesassets@gmail.com>--}}
{{-- *--}}
{{-- */--}}
{{--?>--}}
{{--<form action="https://perfectmoney.is/api/step1.asp" method="POST">--}}
{{--    <input type="hidden" name="PAYEE_ACCOUNT" value="{{ 'U43049592' }}">--}}
{{--    <input type="hidden" name="PAYEE_NAME" value="{{ "Irfan Iqbal" }}">--}}
{{--    <input type="ieve payment method lists for dropdown--}}
{{--        $payment_method_lists = PaymentMethodList::all();--}}

{{--        // Return the view with the retrieved data--}}
{{--        return view('admin.pages.payment-method.edit', compact('payment_method', 'payment_method_lists'));--}}
{{--    } catch (ModelNotFoundException $e) text" name="PAYMENT_AMOUNT" value="{{ 23 }}" placeholder="Amount">--}}
{{--    <input type="text" name="PAYMENT_UNITS" value="1">--}}
{{--	<input type="hidden" name="PAYMENT_URL" value="{{ '/perfect-money/payment' }}">--}}
{{--	<input type="hidden" name="NOPAYMENT_URL" value="{{ '/payment/cancel' }}">--}}
{{--	@if(isset($PAYMENT_ID))--}}
{{--		<input type="hidden" name="PAYMENT_ID" value="{{ $PAYMENT_ID }}">--}}
{{--	@endif--}}
{{--	@if(isset($STATUS_URL))--}}
{{--		<input type="hidden" name="STATUS_URL" value="{{ $STATUS_URL }}">--}}
{{--	@endif--}}
{{--	@if(isset($PAYMENT_URL_METHOD))--}}
{{--		<input type="hidden" name="PAYMENT_URL_METHOD" value="{{ $PAYMENT_URL_METHOD }}">--}}
{{--	@endif--}}
{{--	@if( isset($NOPAYMENT_URL_METHOD) )--}}
{{--		<input type="hidden" name="NOPAYMENT_URL_METHOD" value="{{ $NOPAYMENT_URL_METHOD }}">--}}
{{--	@endif--}}

{{--	@if( isset($MEMO) )--}}
{{--		<input type="hidden" name="SUGGESTED_MEMO" value="{{ $MEMO }}">--}}
{{--	@endif--}}
{{--    <input type="submit" value="Proceed">--}}
{{--</form>--}}


<form action="https://perfectmoney.is/api/step1.asp" method="POST" id="pmForm" accept-charset="utf-8">
    <input type="hidden" name="PAYEE_ACCOUNT" value="{{$data['PAYEE_ACCOUNT']}}">
    <input type="hidden" name="PAYEE_NAME" value="{{$data['PAYEE_NAME']}}">
    <input type="hidden" name="PAYMENT_ID" value="{{$data['PAYMENT_ID']}}">
    <input type="hidden" name="PAYMENT_UNITS" value="USD">
    <input type="hidden" name="STATUS_URL" value="{{$data['STATUS_URL']}}">
    <input type="hidden" name="PAYMENT_URL" value="{{$data['PAYMENT_URL']}}">
    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="NOPAYMENT_URL" value="{{$data['NOPAYMENT_URL']}}">

    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
    <input type="hidden" name="SUGGESTED_MEMO" value="{{$data['SUGGESTED_MEMO']}}">
    <input type="hidden" name="BAGGAGE_FIELDS" value="{{$data['BAGGAGE_FIELDS']}}">
    <input type="hidden" name="FIELD_1" value="{{$data['FIELD_1']}}">
    <input type="hidden" name="PAYMENT_AMOUNT" value="{{$data['PAYMENT_AMOUNT']}}">
</form>

<script>

    //$('form#pmForm').submit();
    document.getElementById("pmForm").submit();
</script>
