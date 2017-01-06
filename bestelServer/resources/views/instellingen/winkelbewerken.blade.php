@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Winkel Bewerken</h1>
            <form method="POST" action="bewerken">
                {{method_field('patch')}}
                <div class="form-group">
                    <label for="naam">Naam</label>
                    <input type="text" class="form-control" id="naam" name="naam" aria-describedby="naam" placeholder="Naam" value="{{ $winkel->naam}}">
                </div>
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <input type="text" class="form-control" id="adres" name="adres" aria-describedby="adres" placeholder="Adres" value="{{$winkel->adres}}">
                </div>
                <div class="form-group">
                    <label for="tel">Tel</label>
                    <input type="text" class="form-control" id="tel" name="tel" aria-describedby="tel" placeholder="Tel" value="{{$winkel->tel}}">
                </div>
                <div class="form-group">
                    <label for="mail">E-mail</label>
                    <input type="mail" class="form-control" id="mail" name="mail" aria-describedby="mail" placeholder="Mail" value="{{$winkel->mail}}">
                </div>
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Winkel bewerken</button>
                </div>
            </form>
            <a href="../../instellingen" class="btn btn-primary">Terug</a>
            @if (count($errors))
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
