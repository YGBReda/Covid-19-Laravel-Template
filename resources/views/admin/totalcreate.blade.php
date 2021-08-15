@extends('layouts.app')

@section('content')

<div class="uk-background-muted content-body">
<div class="uk-container uk-container-smal">

<form class="uk-form-stacked add-zone" action="{{ url('total/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}

    
 
 
    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label" for="form-stacked-text">Confirmed</label>
        <div class="uk-form-controls">
            <input name="Confirmed" class="uk-input" type="number" placeholder="1">
        </div>
    </div>

    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label" for="form-stacked-text">Deaths</label>
        <div class="uk-form-controls">
            <input name="Deaths" class="uk-input" type="number" placeholder="1">
        </div>
    </div>

    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label" for="form-stacked-text">Recovered</label>
        <div class="uk-form-controls">
            <input name="Recovered" class="uk-input" type="number" placeholder="1">
        </div>
    </div>

 

        <button class="uk-button uk-button-primary" type="submit">Save</button>


</form>
</div>
</div>
@endsection