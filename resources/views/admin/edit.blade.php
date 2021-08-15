@extends('layouts.app')

@section('content')

<div class="uk-background-muted content-body">


<div class="uk-container uk-container-smal">
    <button class="uk-button uk-button-default" type="button">Menu</button>
<div uk-dropdown>
    <ul class="uk-nav uk-dropdown-nav">
        <li class="uk-active"><a href="{{url('corona')}}">Country</a></li>
        <li class="uk-active"><a href="{{url('state')}}">States</a></li>
    </ul>
</div>

<form class="uk-form-stacked " action="{{ url('corona/'.$coronadata->id) }}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
{{ csrf_field() }}



    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label " for="form-stacked-select">Country</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="country" name="Country">
               <option  selected>{{ $coronadata->Country}}</option>
                  @foreach($countryshare as  $countryshare)
                  <option>{{$countryshare->Country}}</option>
                  @endforeach

               </select>
        </div>
    </div>

 
    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label" for="form-stacked-text">Confirmed</label>
        <div class="uk-form-controls">
            <input name="Confirmed" class="uk-input" type="number" placeholder="1" value="{{ $coronadata->Confirmed}}">
        </div>
    </div>

    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label" for="form-stacked-text">Deaths</label>
        <div class="uk-form-controls">
            <input name="Deaths" class="uk-input" type="number" placeholder="1" value="{{ $coronadata->Deaths}}">
        </div>
    </div>

    <div class="uk-margin uk-form-width-large">
        <label class="uk-form-label" for="form-stacked-text">Recovered</label>
        <div class="uk-form-controls">
            <input name="Recovered" class="uk-input" type="number" placeholder="1" value="{{ $coronadata->Recovered}}">
        </div>
    </div>



        <button class="uk-button uk-button-primary" type="submit">Save</button>


</form>
</div>
</div>
@endsection