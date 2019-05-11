<!DOCTYPE HTML>
@extends('index')
@section('content')
@include('_common._form')
<br/>
<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ __('messages.tableNr') }}</th>
            <th scope="col">
            <a href="{{ !is_null($page) ?
                '?page='.$page.'&sortBy=username&direction='.($request->query('direction') == 'asc' ? 'desc' : 'asc') :
                '?sortBy=username&direction='.($request->query('direction') == 'asc' ? 'desc' : 'asc') }}">
                {{ __('messages.username') }}
            </a>
            </th>
            <th scope="col">{{ __('messages.userEmail') }}</th>
            <th scope="col">{{ __('messages.urlLink') }}</th>
            <th scope="col">{{ __('messages.userMessage') }}</th>
            <th scope="col">{{ __('messages.userIpAddress') }}</th>
            <th scope="col">{{ __('messages.userBrowser') }}</th>
            <th scope="col">
                <a href="{{ !is_null($page) ?
                    '?page='.$page.'&sortBy=created_at&direction='.($request->query('direction') == 'asc' ? 'desc' : 'asc') :
                    '?sortBy=created_at&direction='.($request->query('direction') == 'asc' ? 'desc' : 'asc') }}">
                    {{ __('messages.createdDate') }}
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
    @if( !$messages->isEmpty() )
        @foreach($messages as $message)
            <tr>
                <th scope="row">{{ $message->id }}</th>
                <td>{{ $message->username }}</td>
                <td>{{ $message->userEmail }}</td>
                <td>
                    <a href="{{ $message->urlLink }}" target="_blank">
                        {{ $message->urlLink }}
                    </a>
                </td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->userIp }}</td>
                <td>{{ $message->userBrowser }}</td>
                <td>{{ $message->created_at }}</td>
            </tr>
        @endforeach
        @else
            <tr>
                <td class="text-center">{{ __('messages.tableEmpty') }}</td>
            </tr>
        @endif
    </tbody>
</table>
<div class="row no-gutters">
    <div class="col">
        <div class="d-flex justify-content-center pt-4">
            {{ $messages->links() }}
        </div>
    </div>
</div>
@stop

