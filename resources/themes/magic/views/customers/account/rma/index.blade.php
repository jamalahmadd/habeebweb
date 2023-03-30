
@php
$messages = [];

if (isset($errors) && count($errors)) {
    $messages = $errors->getMessages();
}
@endphp
@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('account-content')
    
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-wrap">
                    <h3 class="page-title">RMA</h3>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
