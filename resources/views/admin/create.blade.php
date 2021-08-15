@extends('layouts.app')

@section('content')

<div class="uk-background-muted content-body">
<div class="uk-container uk-container-smal">

<form class="uk-form-stacked add-zone" action="{{ url('corona/store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}



    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label " for="form-stacked-select">Country</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="country" name="Country">
                @foreach($countryshare as  $countryshare)
                  <option>{{$countryshare->Country}}</option>
                  @endforeach

</select>
        </div>
    </div>

 
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

 

        <button class="uk-button uk-button-primary" type="submit">Enregister</button>


</form>
</div>
</div>
@endsection