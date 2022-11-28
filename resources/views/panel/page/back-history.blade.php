@extends('panel.layout.main')
@section('title' , 'زندگی نامه کارکتر')
@section('content')
    <div class="card  flex-lg-column flex-md-row ">
        <livewire:panel.back-history.list-and-make/>
    </div>
@endsection
