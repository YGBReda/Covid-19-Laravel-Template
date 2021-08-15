<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Corona Statistics</title>
        
        <link href="{{ url('/assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ url('/assets/css/uikit.min.css') }}" rel="stylesheet">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:500&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        
        <script src="{{ url('/assets/js/uikit.min.js') }}"></script>
        <script src="{{ url('/assets/js/uikit-icons.min.js') }}"></script>

        <script src="{{ url('/assets/js/core.js') }}"></script>
        <script src="{{ url('/assets/js/maps.js') }}"></script>
        <script src="{{ url('/assets/js/worldLow.js') }}"></script>
        <script src="{{ url('/assets/js/material.js') }}"></script>
        <script src="{{ url('/assets/js/animated.js') }}"></script>
        <script src="{{ url('/assets/js/charts.js') }}"></script>
        <script src="{{ url('/assets/js/usaLow.js') }}"></script>
        <script src="{{ url('/assets/js/algeriaLow.js') }}"></script>



<!-- Resources 
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/maps.js"></script>
<script src="https://www.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>-->





    </head>
<body>

<nav class=" uk-margin menu-top ">
    <div id="logo">
        <h4><a href="{{url('/')}}">Covid-19</a></h4>
    </div>


     <div class="uk-inline language">
    <button class="uk-button uk-button-default" type="button">Langue <span  uk-icon="chevron-down"></span>
</button>
    <div uk-dropdown>
        <ul class="uk-nav uk-dropdown-nav">
            <li class="uk-active"><a href="{{url('/')}}">Anglais</a></li>
            <li class="uk-active"><a href="{{url('/fr')}}">Français</a></li>
        </ul>
    </div>
</div>


<div id="select-country" class="uk-flex uk-flex-center">
    
<form class="uk-form-horizontal select-country-form uk-flex-center">
<div class="uk-margin uk-form-width-large ">
        <label class="uk-form-label " for="form-horizontal-select">Pays</label>
        <div class="uk-form-controls">
    <select class="uk-select" id="country" name="Country">
    <option value="All World">All World </option>
    @foreach($countryshare as  $countryshare)
                  <option>{{$countryshare->Country}}</option>
    @endforeach

      </select>
        </div>
    </div>

    <div class=" uk-form-width-large select-state">

    </div>
      
</form>

</div>



</nav>



@yield('content')
<div style="
    font-size: 12px;
    color: #a0a0a0;
    margin-left: 10px;
">Take care of yourself</div>
<div class="footer uk-flex uk-flex-center">
   <p>Developed By LunaWest.</p>
</div>

</body>
</html>