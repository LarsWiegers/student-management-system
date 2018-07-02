@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Your registration is not yet completed
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-6">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Register</p>
                </header>

                <div class="card-content">
                    <p>
                        Your registration is not yet completed, the admins have been notified of it and will either
                        accept or decline it. You will receive an email when this happens. Sorry for the inconvenience.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
