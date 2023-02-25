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

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>
        async function get() {
            const Ud = await axios.get('http://127.0.0.1:8000/api/instansi/', {
                headers: {
                    "Authorization": `Bearer {{ \Session::get('token') }}`,
                }
            }).catch(() => {
                console.log("ok");
            });
            console.log(Ud);
        }
        get();
    </script>
@endsection
