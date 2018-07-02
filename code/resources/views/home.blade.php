@extends('layouts.app')

@section('content')
    <div class="columns is-marginless">
        @can('approve-registrations')
            @include('admin.approve-registration')
        @endcan
    </div>
@endsection
