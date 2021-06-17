@extends('layouts/basic')

@section('content')

    <div class="row flex-grow-1">
        <form class="w-50 m-auto" action="{{ route('login.attempt') }}" method="POST">
            
            @csrf
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            
            <h2 class="text-center">Logowanie</h2>

            <div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group mt-2">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Hasło">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </div>

        </form>
    </div>

@endsection
