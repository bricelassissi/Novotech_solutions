@extends('front.layouts.app')

@section('main')


{{-- Debut page d'accueil --}}



<section>
    <div class="container">
        <div class="col-md-8 mt-5">
            @component('components.contact-form')@endcomponent
        </div>
    </div>
</section>

<div class="pb-5"></div>

@endsection
