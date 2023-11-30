@extends('layouts.print')

@section('title', __('report.finance_detailed'))

@section('content')
<htmlpageheader name="wpHeader">
    @include('reports.partials.letterhead')

    <h2 class="text-center strong">
        @if (isset(auth()->activeBook()->report_titles['finance_detailed']))
            {{ auth()->activeBook()->report_titles['finance_detailed'] }}
        @else
            {{ __('report.finance_detailed') }}
        @endif
    </h2>
</htmlpageheader>

@foreach($groupedTransactions as $weekNumber => $weekTransactions)
@include('reports.finance._internal_content_detailed')
@if ($weekNumber != $groupedTransactions->keys()->last())
    <pagebreak />
@endif
@endforeach
@endsection

@section('style')
<style>
    @page {
        size: auto;
        margin-top: @if($showLetterhead) 170px; @else 100px; @endif
        margin-bottom: 20px;
        margin-left: 50px;
        margin-right: 50px;
        margin-header: 40px;
        margin-footer: 40px;
        header: html_wpHeader;
    }
</style>
@endsection
