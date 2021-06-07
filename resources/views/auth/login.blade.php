@extends('Plantillas.principal')
@push('st')
<link rel="stylesheet" href="{{ asset('css/Institucional.css') }}">
@endpush
@section('title', 'Acceso')


@section('FormularioInicioSesion')

<div class="row justify-content-center mt-1">
    <div class="col-md-8 col-xl-7 m-lg-5  m-sm-1" >
       
        <div class="sticky-top "> <img src="{{asset('storage/imagenes/ods/circulo-UASLP-SOCIEDAD-e1587668903442.png')}}" class="img-fluid" id="imglogo" alt=""></div>
        <div class="card" id="loginCard">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <!--
                            <label for="email" class="col-md-12 col-form-label ">{{ __('Email') }}</label>
                        
                        -->
                        <div class="col-md-12">
                            <input id="email" placeholder="EMAIL" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <!--
                        <label for="password" class="col-md-4 col-form-label ">{{ __('Contraseña') }}</label>
                        -->
                        <div class="col-md-12">
                            <input id="password" placeholder="CONTRASEÑA" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <div class="col-md-12 col-sm-12 col-lg-12 pt-4 ">
                           
                            <button type="submit" class="btn btn-light btn-lg btn-block font-weight-bold">
                                {{ __('Entrar') }}
                            </button>
                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
        <div class="card-footer" id="loginCardFooter">
            <div class="container">
                <p class="text-center h4 font-weight-bold">TITULO DE TEXTO</p>
                
            </div>
            <p class="text-justify h5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo quaerat rerum tempora iste quisquam ipsum adipisci praesentium eveniet aut ducimus. Soluta quisquam distinctio ut? Harum obcaecati omnis numquam iste sit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque quasi illo quis consectetur veniam iste veritatis quibusdam quas debitis ex! Saepe eos aut excepturi, quo numquam aperiam atque perferendis debitis?</p>
        </div>
    </div>
</div>
@endsection
aviso de privacidad 
NO perteneces a la comunidad universitaria de la UASLP?
Registrate aqui
