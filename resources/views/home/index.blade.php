@extends('master')

@section('title' , 'Desarrollo web - Prueba Manuel Alejandro Chávez Núñez')

@section('content')
    
    <section id="mainContent" class="pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    @include('home.sections.sidebar')
                </div>
                <div class="col-sm-8">
                    @include('home.sections.tables')
                </div>
            </div>
        </div>
    </section>
    
@endsection