@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h2>Your Sessions:</h2>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Session</th>
                                <th>Last Activity</th>
                                <th>User Agent</th>
                                <th>IP Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userSessions as $key => $session)
                            <tr>
                                <td>Session {{ $key + 1 }}</td>
                                <td>{{ $lastActivities[$key] }}</td>
                                <td>{{ $session->browser }} / {{ $session->os }}</td>
                                <td>{{ $session->ip_address }}</td>
                                <td>
                                    <form method="POST" action="{{ route('endOneSession', $session->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">End Session</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('endAllSession') }}">
                                @csrf

                                <button type="submit" class="btn btn-primary btn-lg">End All Sessions</button>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('endAllSessionExceptOne') }}">
                                @csrf

                                <button type="submit" class="btn btn-secondary btn-lg">End All Sessions Except Current</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
