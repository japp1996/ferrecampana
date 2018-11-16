@extends('layouts.welcome')
@section('title', 'Recuperar Contraseña')
@section('content')
    <div id="wrapper">
        <div id="content">
            <div class="login-panel">
                <h1>&iquest;Olvidaste tu Password?</h1>
                <form onSubmit="return validarForm();">
                    <input type="hidden" name="form" id="form" value="form"/>
                    <ul>
                        <li class="full"><input name="coduser" placeholder="Usuario" type="text" id="codisuser" required placeholder=">Email:" /></li>
                        <li class="full"><div id="errores"></div></li>
                        <li class="full"><input class="btn btn-default btn-forgot" name="button" id="button" type="submit" value="ENVIAR"></li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection