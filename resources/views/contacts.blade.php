@extends('layouts.app')
@section('content')

<div class="container h-75">
    <div class="row h-75 justify-content-center">

        <div id="ContactForm" class="col-12 text-center align-self-end">

            <h1 class="mb-3 ">Inviaci i tuoi dati per essere ricontattato</h1>

            {{-- FORM --}}
            <form method="POST" action="{{route('contacts.submit')}}">

                @csrf

                <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Nome</label>
                <input class="form-control" type="text" placeholder="Inserisci Nome" name="name">

                <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Cognome</label>
                <input class="form-control" type="text" placeholder="Inserisci Cognome" name="surname">

                <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Email</label>
                <input class="form-control" type="email" placeholder="Inserisci e-mail" name="email">

                <label class="float-left mt-3 mb-0 mx-1" for="exampleFormControlSelect1">Mobile</label>
                <input class="form-control" type="tel" placeholder="Inserisci Tel" name="mobile">

                <button type="reset" class="btn btn-secondary mt-5 px-5">Reset</button>
                <button type="submit" class="btn btn-primary mt-5 px-5">Invia</button>


            </form>
            {{-- FORM --}}
        </div>
    </div>

</div>





@endsection