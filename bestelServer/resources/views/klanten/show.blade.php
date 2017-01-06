@extends('layouts.home')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-lg-12">
        	<h1>Welkom bij <u>{{$winkel->naam}}</u></h1>
        	<h3>Kies hieronder wat u wenst te bestellen.</h3>
        	<hr>
            <form method="POST" action="{{$winkel->id}}/bestellen">
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
            	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Hoeveel</th>
                                <th>Naam</th>
                                <th>Prijs per stuk</th>
                            </tr>
                        </thead>
    	            @foreach ($winkel->winkelItems as $item)
    	            	<tr class="odd gradeX">
                            <td><input type="text" class="form-control" value="0" name="hoeveel[]"></td>
                            <td>{{ $item->naam }}</td>
                            <td>{{ $item->prijs }} euro</td>
                            <input type="hidden" name="naamItem[]" value="{{ $item->naam}}">
                            <input type="hidden" name="id[]" value="{{ $item->id}}">        
                        </tr>
    	            @endforeach
                </table>
                <hr>
                <h3>Enkele persoonlijke gegevens.</h3>
                <div class="form-group">
                    <label for="naam">Naam</label>
                    <input type="text" class="form-control" id="naam" name="naam" aria-describedby="naam" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="mail">E-mail</label>
                    <input type="mail" class="form-control" id="mail" name="mail" aria-describedby="mail" placeholder="Mail">
                    <small id="mailhelp" class="form-text text-muted">Hier zal een bevestegingsmail naar verzonden worden.</small>
                </div>
                <div class="form-group">
                    <label for="tel">Tel</label>
                    <input type="text" class="form-control" id="tel" name="tel" aria-describedby="tel" placeholder="Tel">
                    <small id="telHelp" class="form-text text-muted">Indien er iets mis blijkt te zijn met het e-mail adres kunnen we u toch nog bereiken.</small>
                </div>
                <div class="form-group">
                    <label for="afhaalUur">Afhaal uur</label>
                    <input type="time" class="form-control" id="afhaalUur" name="afhaalUur" aria-describedby="afhaalUur" placeholder="Afhaal Uur">
                    <small id="naamAfhaalUur" class="form-text text-muted">Dit is het uur waarop u uw bestelling zal komen afhalen.</small>
                </div>
                <div class="form-group">
                    <label for="afhaalDatum">Afhaal dag</label>
                    <input type="date" class="form-control" id="afhaalDatum" name="afhaalDatum" aria-describedby="afhaalDatum" placeholder="Afhaal Datum">
                    <small id="naamHelp" class="form-text text-muted">Dit is de dag waarop u uw bestelling zal komen afhalen.</small>
                </div>
                <input type="submit" class="btn btn-primary" value="bestellen" name="bestellen">
            </form>
            @if (count($errors))
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            @endif
            <hr>
        </div>
    </div>
</div>
@endsection