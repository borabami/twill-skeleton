@extends('twill::layouts.free')

@section('customPageContent')

<div class="table-container">
    <table border="1" class="contacts">
        <thead>
            <tr>
                <th>To</th>
                <th>Subject</th>
                <th>Success Message</th>
                <th>Privacy Disclaimer</th>
                <th>Form data</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $item)
            <tr>
                <td>{{ $item->to }}</td>
                <td>{{ $item->subject }}</td>
                <td>{!! $item->success_message !!}</td>
                <td>{!! $item->privacy_disclaimer !!}</td>
                <td>
                    <ul>
                        @foreach($item->form_data as $key => $value)
                        <li><strong>{{ ucfirst(str_replace('-', ' ', $key)) }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

<style>
    .table-container {
        overflow-x: auto;
    }
    table,
    th,
    td {
        border: 1px solid black !important;
        border-collapse: collapse !important;
        padding: 10px!important;
    }
</style>