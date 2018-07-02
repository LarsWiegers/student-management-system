@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Registration denied
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-6">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Registration denied</p>
                </header>
                <div class="card-content">
                    What is the reason for denying this request?
                    {!! Form::open(['route' => ['registration-denied-post', $id]]) !!}
                        {!! Form::textarea('reason') !!}
                        {!! Form::submit('Submit') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
