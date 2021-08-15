@extends('layouts.master')

@section('content')

@php
    $total_confirmed = 0;
    $total_recovered = 0;
    $total_deaths = 0;
    $last_update = 0;

@endphp
@foreach($countryshare as $tota)
   

@php
$total_confirmed = $total_confirmed + $tota->Confirmed;
$total_recovered = $total_recovered + $tota->Recovered;
$total_deaths = $total_deaths + $tota->Deaths;
$last_update = $tota->updated_at;
@endphp


@endforeach


<div class=" welcome">


<div class="uk-text-center" uk-grid>
    <div class="uk-width-auto@m uk-text-left sidebar-left uk-background-muted">
        <ul class="uk-list uk-list-divider" id="datalist">
        
			    <li style="color: #00a8ff ;">Confirmed : {{$total->Confirmed}}</li>
			    <li style="color: #27ae60;">Recovered : {{$total->Recovered}}</li>
			    <li style="color: #d63031;">Deaths : {{$total->Deaths}}</li>
          <li style="color: #555 ;font-size: 12px;padding-top: 17px;">Updated : {{$total->updated_at}}</li>

		</ul>
    </div>

    <div class="uk-width-expand@m sidebar-right uk-background-muted">
        <div id="chartdiv"></div>
    
    </div>
</div>

</div>



<!-- Chart code -->
<script>

$( document ).ready(function() {

var confirmed=[];
var confirmed_state=[];
var mapData;
var chart;

/** prepare data for state*/
getstateData();


$.ajax({
           type:"GET",
           url:"{{url('getalldata')}}",
           success:function(res){               
            if(res){

            	$.each(res,function(key,value){
                    idd = value.id;
                    confirmed[idd] = value.Confirmed;
                   
                });

            }


am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
// Themes end

// Create map instance
 chart = am4core.create("chartdiv", am4maps.MapChart);

//var title = chart.titles.create();
//title.text = "[bold font-size: 20]Population of the World in 2011[/]\nsource: Gapminder";
//title.textAlign = "middle";
  mapData = [
  { "id":"AF", "name":"Afghanistan", "value":parseFloat(confirmed[1]), "color": chart.colors.getIndex(0) },
  { "id":"AL", "name":"Albania", "value":parseFloat(confirmed[2]), "color":chart.colors.getIndex(1) },
  { "id":"DZ", "name":"Algeria", "value":null, "color":chart.colors.getIndex(2) },
  { "id":"AO", "name":"Angola", "value":parseFloat(confirmed[6]), "color":chart.colors.getIndex(2) },
  { "id":"AR", "name":"Argentina", "value":parseFloat(confirmed[10]), "color":chart.colors.getIndex(3) },
  { "id":"AM", "name":"Armenia", "value":parseFloat(confirmed[11]), "color":chart.colors.getIndex(1) },
  { "id":"AU", "name":"Australia", "value":parseFloat(confirmed[13]), "color":"#8aabb0" },
  { "id":"AT", "name":"Austria", "value":parseFloat(confirmed[14]), "color":chart.colors.getIndex(1) },
  { "id":"AZ", "name":"Azerbaijan", "value":parseFloat(confirmed[15]), "color":chart.colors.getIndex(1) },
  { "id":"BH", "name":"Bahrain", "value":parseFloat(confirmed[17]), "color": chart.colors.getIndex(0) },
  { "id":"BD", "name":"Bangladesh", "value":parseFloat(confirmed[18]), "color": chart.colors.getIndex(0) },
  { "id":"BY", "name":"Belarus", "value":parseFloat(confirmed[20]), "color":chart.colors.getIndex(1) },
  { "id":"BE", "name":"Belgium", "value":parseFloat(confirmed[21]), "color":chart.colors.getIndex(1) },
  { "id":"BJ", "name":"Benin", "value":parseFloat(confirmed[23]), "color":chart.colors.getIndex(2) },
  { "id":"BT", "name":"Bhutan", "value":parseFloat(confirmed[25]), "color": chart.colors.getIndex(0) },
  { "id":"BO", "name":"Bolivia", "value":parseFloat(confirmed[26]), "color":chart.colors.getIndex(3) },
  { "id":"BA", "name":"Bosnia and Herzegovina", "value":parseFloat(confirmed[26]), "color":chart.colors.getIndex(1) },
  { "id":"BW", "name":"Botswana", "value":parseFloat(confirmed[28]), "color":chart.colors.getIndex(2) },
  { "id":"BR", "name":"Brazil", "value":parseFloat(confirmed[30]), "color":chart.colors.getIndex(3) },
  { "id":"BN", "name":"Brunei", "value":parseFloat(confirmed[32]), "color": chart.colors.getIndex(0) },
  { "id":"BG", "name":"Bulgaria", "value":parseFloat(confirmed[33]), "color":chart.colors.getIndex(1) },
  { "id":"BF", "name":"Burkina Faso", "value":parseFloat(confirmed[34]), "color":chart.colors.getIndex(2) },
  { "id":"BI", "name":"Burundi", "value":parseFloat(confirmed[35]), "color":chart.colors.getIndex(2) },
  { "id":"KH", "name":"Cambodia", "value":parseFloat(confirmed[36]), "color": chart.colors.getIndex(0) },
  { "id":"CM", "name":"Cameroon", "value":parseFloat(confirmed[37]), "color":chart.colors.getIndex(2) },
  { "id":"CA", "name":"Canada", "value":parseFloat(confirmed[38]), "color":chart.colors.getIndex(4) },
  { "id":"CV", "name":"Cape Verde", "value":parseFloat(confirmed[39]), "color":chart.colors.getIndex(2) },
  { "id":"CF", "name":"Central African Rep.", "value":parseFloat(confirmed[41]), "color":chart.colors.getIndex(2) },
  { "id":"TD", "name":"Chad", "value":parseFloat(confirmed[42]), "color":chart.colors.getIndex(2) },
  { "id":"CL", "name":"Chile", "value":parseFloat(confirmed[43]), "color":chart.colors.getIndex(3) },
  { "id":"CN", "name":"China", "value":parseFloat(confirmed[44]), "color": chart.colors.getIndex(0) },
  { "id":"CO", "name":"Colombia", "value":parseFloat(confirmed[47]), "color":chart.colors.getIndex(3) },
  { "id":"KM", "name":"Comoros", "value":parseFloat(confirmed[48]), "color":chart.colors.getIndex(2) },
  { "id":"CD", "name":"Congo, Dem. Rep.", "value":parseFloat(confirmed[50]), "color":chart.colors.getIndex(2) },
  { "id":"CG", "name":"Congo, Rep.", "value":parseFloat(confirmed[49]), "color":chart.colors.getIndex(2) },
  { "id":"CR", "name":"Costa Rica", "value":parseFloat(confirmed[52]), "color":chart.colors.getIndex(4) },
  { "id":"CI", "name":"Cote d'Ivoire", "value":parseFloat(confirmed[53]), "color":chart.colors.getIndex(2) },
  { "id":"HR", "name":"Croatia", "value":parseFloat(confirmed[54]), "color":chart.colors.getIndex(1) },
  { "id":"CU", "name":"Cuba", "value":parseFloat(confirmed[55]), "color":chart.colors.getIndex(4) },
  { "id":"CY", "name":"Cyprus", "value":parseFloat(confirmed[56]), "color":chart.colors.getIndex(1) },
  { "id":"CZ", "name":"Czech Rep.", "value":parseFloat(confirmed[57]), "color":chart.colors.getIndex(1) },
  { "id":"DK", "name":"Denmark", "value":parseFloat(confirmed[58]), "color":chart.colors.getIndex(1) },
  { "id":"DJ", "name":"Djibouti", "value":parseFloat(confirmed[59]), "color":chart.colors.getIndex(2) },
  { "id":"DO", "name":"Dominican Rep.", "value":parseFloat(confirmed[61]), "color":chart.colors.getIndex(4) },
  { "id":"EC", "name":"Ecuador", "value":parseFloat(confirmed[62]), "color":chart.colors.getIndex(3) },
  { "id":"EG", "name":"Egypt", "value":parseFloat(confirmed[63]), "color":chart.colors.getIndex(2) },
  { "id":"SV", "name":"El Salvador", "value":parseFloat(confirmed[64]), "color":chart.colors.getIndex(4) },
  { "id":"GQ", "name":"Equatorial Guinea", "value":parseFloat(confirmed[65]), "color":chart.colors.getIndex(2) },
  { "id":"ER", "name":"Eritrea", "value":parseFloat(confirmed[66]), "color":chart.colors.getIndex(2) },
  { "id":"EE", "name":"Estonia", "value":parseFloat(confirmed[67]), "color":chart.colors.getIndex(1) },
  { "id":"ET", "name":"Ethiopia", "value":parseFloat(confirmed[68]), "color":chart.colors.getIndex(2) },
  { "id":"FJ", "name":"Fiji", "value":parseFloat(confirmed[71]), "color":"#8aabb0" },
  { "id":"FI", "name":"Finland", "value":parseFloat(confirmed[72]), "color":chart.colors.getIndex(1) },
  { "id":"FR", "name":"France", "value":parseFloat(confirmed[73]), "color":chart.colors.getIndex(1) },
  { "id":"GA", "name":"Gabon", "value":parseFloat(confirmed[74]), "color":chart.colors.getIndex(2) },
  { "id":"GM", "name":"Gambia", "value":parseFloat(confirmed[78]), "color":chart.colors.getIndex(2) },
  { "id":"GE", "name":"Georgia", "value":parseFloat(confirmed[79]), "color":chart.colors.getIndex(1) },
  { "id":"DE", "name":"Germany", "value":parseFloat(confirmed[80]), "color":chart.colors.getIndex(1) },
  { "id":"GH", "name":"Ghana", "value":parseFloat(confirmed[81]), "color":chart.colors.getIndex(2) },
  { "id":"GR", "name":"Greece", "value":parseFloat(confirmed[83]), "color":chart.colors.getIndex(1) },
  { "id":"GT", "name":"Guatemala", "value":parseFloat(confirmed[88]), "color":chart.colors.getIndex(4) },
  { "id":"GN", "name":"Guinea", "value":parseFloat(confirmed[89]), "color":chart.colors.getIndex(2) },
  { "id":"GW", "name":"Guinea-Bissau", "value":parseFloat(confirmed[90]), "color":chart.colors.getIndex(2) },
  { "id":"GY", "name":"Guyana", "value":parseFloat(confirmed[91]), "color":chart.colors.getIndex(3) },
  { "id":"HT", "name":"Haiti", "value":parseFloat(confirmed[92]), "color":chart.colors.getIndex(4) },
  { "id":"HN", "name":"Honduras", "value":parseFloat(confirmed[95]), "color":chart.colors.getIndex(4) },
  { "id":"HK", "name":"Hong Kong, China", "value":parseFloat(confirmed[96]), "color": chart.colors.getIndex(0) },
  { "id":"HU", "name":"Hungary", "value":parseFloat(confirmed[97]), "color":chart.colors.getIndex(1) },
  { "id":"IS", "name":"Iceland", "value":parseFloat(confirmed[98]), "color":chart.colors.getIndex(1) },
  { "id":"IN", "name":"India", "value":parseFloat(confirmed[99]), "color": chart.colors.getIndex(0) },
  { "id":"ID", "name":"Indonesia", "value":parseFloat(confirmed[100]), "color": chart.colors.getIndex(0) },
  { "id":"IR", "name":"Iran", "value":parseFloat(confirmed[101]), "color": chart.colors.getIndex(0) },
  { "id":"IQ", "name":"Iraq", "value":parseFloat(confirmed[102]), "color": chart.colors.getIndex(0) },
  { "id":"IE", "name":"Ireland", "value":parseFloat(confirmed[103]), "color":chart.colors.getIndex(1) },
  { "id":"IL", "name":"Israel", "value":parseFloat(confirmed[104]), "color": chart.colors.getIndex(0) },
  { "id":"IT", "name":"Italy", "value":parseFloat(confirmed[105]), "color":chart.colors.getIndex(1) },
  { "id":"JM", "name":"Jamaica", "value":parseFloat(confirmed[106]), "color":chart.colors.getIndex(4) },
  { "id":"JP", "name":"Japan", "value":parseFloat(confirmed[107]), "color": chart.colors.getIndex(0) },
  { "id":"JO", "name":"Jordan", "value":parseFloat(confirmed[108]), "color": chart.colors.getIndex(0) },
  { "id":"KZ", "name":"Kazakhstan", "value":parseFloat(confirmed[109]), "color": chart.colors.getIndex(0) },
  { "id":"KE", "name":"Kenya", "value":parseFloat(confirmed[110]), "color":chart.colors.getIndex(2) },
  { "id":"KP", "name":"Korea, Dem. Rep.", "value":parseFloat(confirmed[112]), "color": chart.colors.getIndex(0) },
  { "id":"KR", "name":"Korea, Rep.", "value":parseFloat(confirmed[113]), "color": chart.colors.getIndex(0) },
  { "id":"KW", "name":"Kuwait", "value":parseFloat(confirmed[114]), "color": chart.colors.getIndex(0) },
  { "id":"KG", "name":"Kyrgyzstan", "value":parseFloat(confirmed[115]), "color": chart.colors.getIndex(0) },
  { "id":"LA", "name":"Laos", "value":parseFloat(confirmed[116]), "color": chart.colors.getIndex(0) },
  { "id":"LV", "name":"Latvia", "value":parseFloat(confirmed[117]), "color":chart.colors.getIndex(1) },
  { "id":"LB", "name":"Lebanon", "value":parseFloat(confirmed[118]), "color": chart.colors.getIndex(0) },
  { "id":"LS", "name":"Lesotho", "value":parseFloat(confirmed[119]), "color":chart.colors.getIndex(2) },
  { "id":"LR", "name":"Liberia", "value":parseFloat(confirmed[120]), "color":chart.colors.getIndex(2) },
  { "id":"LY", "name":"Libya", "value":parseFloat(confirmed[121]), "color":chart.colors.getIndex(2) },
  { "id":"LT", "name":"Lithuania", "value":parseFloat(confirmed[123]), "color":chart.colors.getIndex(1) },
  { "id":"LU", "name":"Luxembourg", "value":parseFloat(confirmed[124]), "color":chart.colors.getIndex(1) },
  { "id":"MK", "name":"Macedonia, FYR", "value":parseFloat(confirmed[126]), "color":chart.colors.getIndex(1) },
  { "id":"MG", "name":"Madagascar", "value":parseFloat(confirmed[127]), "color":chart.colors.getIndex(2) },
  { "id":"MW", "name":"Malawi", "value":parseFloat(confirmed[128]), "color":chart.colors.getIndex(2) },
  { "id":"MY", "name":"Malaysia", "value":parseFloat(confirmed[129]), "color": chart.colors.getIndex(0) },
  { "id":"ML", "name":"Mali", "value":parseFloat(confirmed[131]), "color":chart.colors.getIndex(2) },
  { "id":"MR", "name":"Mauritania", "value":parseFloat(confirmed[135]), "color":chart.colors.getIndex(2) },
  { "id":"MU", "name":"Mauritius", "value":parseFloat(confirmed[126]), "color":chart.colors.getIndex(2) },
  { "id":"MX", "name":"Mexico", "value":parseFloat(confirmed[138]), "color":chart.colors.getIndex(4) },
  { "id":"MD", "name":"Moldova", "value":parseFloat(confirmed[140]), "color":chart.colors.getIndex(1) },
  { "id":"MN", "name":"Mongolia", "value":parseFloat(confirmed[142]), "color": chart.colors.getIndex(0) },
  { "id":"ME", "name":"Montenegro", "value":0, "color":chart.colors.getIndex(1) },
  { "id":"MA", "name":"Morocco", "value":parseFloat(confirmed[144]), "color":chart.colors.getIndex(2) },
  { "id":"MZ", "name":"Mozambique", "value":parseFloat(confirmed[145]), "color":chart.colors.getIndex(2) },
  { "id":"MM", "name":"Myanmar", "value":parseFloat(confirmed[146]), "color": chart.colors.getIndex(0) },
  { "id":"NA", "name":"Namibia", "value":parseFloat(confirmed[147]), "color":chart.colors.getIndex(2) },
  { "id":"NP", "name":"Nepal", "value":parseFloat(confirmed[149]), "color": chart.colors.getIndex(0) },
  { "id":"NL", "name":"Netherlands", "value":parseFloat(confirmed[150]), "color":chart.colors.getIndex(1) },
  { "id":"NZ", "name":"New Zealand", "value":parseFloat(confirmed[153]), "color":"#8aabb0" },
  { "id":"NI", "name":"Nicaragua", "value":parseFloat(confirmed[154]), "color":chart.colors.getIndex(4) },
  { "id":"NE", "name":"Niger", "value":parseFloat(confirmed[155]), "color":chart.colors.getIndex(2) },
  { "id":"NG", "name":"Nigeria", "value":parseFloat(confirmed[156]), "color":chart.colors.getIndex(2) },
  { "id":"NO", "name":"Norway", "value":parseFloat(confirmed[160]), "color":chart.colors.getIndex(1) },
  { "id":"OM", "name":"Oman", "value":parseFloat(confirmed[161]), "color": chart.colors.getIndex(0) },
  { "id":"PK", "name":"Pakistan", "value":parseFloat(confirmed[162]), "color": chart.colors.getIndex(0) },
  { "id":"PA", "name":"Panama", "value":parseFloat(confirmed[165]), "color":chart.colors.getIndex(4) },
  { "id":"PG", "name":"Papua New Guinea", "value":parseFloat(confirmed[166]), "color":"#8aabb0" },
  { "id":"PY", "name":"Paraguay", "value":parseFloat(confirmed[167]), "color":chart.colors.getIndex(3) },
  { "id":"PE", "name":"Peru", "value":parseFloat(confirmed[168]), "color":chart.colors.getIndex(3) },
  { "id":"PH", "name":"Philippines", "value":parseFloat(confirmed[169]), "color": chart.colors.getIndex(0) },
  { "id":"PL", "name":"Poland", "value":parseFloat(confirmed[171]), "color":chart.colors.getIndex(1) },
  { "id":"PT", "name":"Portugal", "value":parseFloat(confirmed[172]), "color":chart.colors.getIndex(1) },
  { "id":"PR", "name":"Puerto Rico", "value":parseFloat(confirmed[173]), "color":chart.colors.getIndex(4) },
  { "id":"QA", "name":"Qatar", "value":parseFloat(confirmed[174]), "color": chart.colors.getIndex(0) },
  { "id":"RO", "name":"Romania", "value":parseFloat(confirmed[176]), "color":chart.colors.getIndex(1) },
  { "id":"RU", "name":"Russia", "value":parseFloat(confirmed[177]), "color":chart.colors.getIndex(1) },
  { "id":"RW", "name":"Rwanda", "value":parseFloat(confirmed[178]), "color":chart.colors.getIndex(2) },
  { "id":"SA", "name":"Saudi Arabia", "value":parseFloat(confirmed[187]), "color": chart.colors.getIndex(0) },
  { "id":"SN", "name":"Senegal", "value":parseFloat(confirmed[188]), "color":chart.colors.getIndex(2) },
  { "id":"RS", "name":"Serbia", "value":parseFloat(confirmed[189]), "color":chart.colors.getIndex(1) },
  { "id":"SL", "name":"Sierra Leone", "value":parseFloat(confirmed[191]), "color":chart.colors.getIndex(2) },
  { "id":"SG", "name":"Singapore", "value":parseFloat(confirmed[192]), "color": chart.colors.getIndex(0) },
  { "id":"SK", "name":"Slovak Republic", "value":parseFloat(confirmed[193]), "color":chart.colors.getIndex(1) },
  { "id":"SI", "name":"Slovenia", "value":parseFloat(confirmed[194]), "color":chart.colors.getIndex(1) },
  { "id":"SB", "name":"Solomon Islands", "value":parseFloat(confirmed[195]), "color":"#8aabb0" },
  { "id":"SO", "name":"Somalia", "value":parseFloat(confirmed[196]), "color":chart.colors.getIndex(2) },
  { "id":"ZA", "name":"South Africa", "value":parseFloat(confirmed[197]), "color":chart.colors.getIndex(2) },
  { "id":"ES", "name":"Spain", "value":parseFloat(confirmed[199]), "color":chart.colors.getIndex(1) },
  { "id":"LK", "name":"Sri Lanka", "value":parseFloat(confirmed[200]), "color": chart.colors.getIndex(0) },
  { "id":"SD", "name":"Sudan", "value":parseFloat(confirmed[201]), "color":chart.colors.getIndex(2) },
  { "id":"SR", "name":"Suriname", "value":parseFloat(confirmed[202]), "color":chart.colors.getIndex(3) },
  { "id":"SZ", "name":"Swaziland", "value":parseFloat(confirmed[204]), "color":chart.colors.getIndex(2) },
  { "id":"SE", "name":"Sweden", "value":parseFloat(confirmed[205]), "color":chart.colors.getIndex(1) },
  { "id":"CH", "name":"Switzerland", "value":parseFloat(confirmed[206]), "color":chart.colors.getIndex(1) },
  { "id":"SY", "name":"Syria", "value":parseFloat(confirmed[207]), "color": chart.colors.getIndex(0) },
  { "id":"TW", "name":"Taiwan", "value":parseFloat(confirmed[208]), "color": chart.colors.getIndex(0) },
  { "id":"TJ", "name":"Tajikistan", "value":parseFloat(confirmed[209]), "color": chart.colors.getIndex(0) },
  { "id":"TZ", "name":"Tanzania", "value":parseFloat(confirmed[210]), "color":chart.colors.getIndex(2) },
  { "id":"TH", "name":"Thailand", "value":parseFloat(confirmed[211]), "color": chart.colors.getIndex(0) },
  { "id":"TG", "name":"Togo", "value":parseFloat(confirmed[213]), "color":chart.colors.getIndex(2) },
  { "id":"TT", "name":"Trinidad and Tobago", "value":parseFloat(confirmed[216]), "color":chart.colors.getIndex(4) },
  { "id":"TN", "name":"Tunisia", "value":parseFloat(confirmed[217]), "color":chart.colors.getIndex(2) },
  { "id":"TR", "name":"Turkey", "value":parseFloat(confirmed[218]), "color":chart.colors.getIndex(1) },
  { "id":"TM", "name":"Turkmenistan", "value":parseFloat(confirmed[219]), "color": chart.colors.getIndex(0) },
  { "id":"UG", "name":"Uganda", "value":parseFloat(confirmed[222]), "color":chart.colors.getIndex(2) },
  { "id":"UA", "name":"Ukraine", "value":parseFloat(confirmed[223]), "color":chart.colors.getIndex(1) },
  { "id":"AE", "name":"United Arab Emirates", "value":parseFloat(confirmed[224]), "color": chart.colors.getIndex(0) },
  { "id":"GB", "name":"United Kingdom", "value":parseFloat(confirmed[225]), "color":chart.colors.getIndex(1) },
  { "id":"US", "name":"United States", "value":parseFloat(confirmed[227]), "color":chart.colors.getIndex(4) },
  { "id":"UY", "name":"Uruguay", "value":parseFloat(confirmed[228]), "color":chart.colors.getIndex(3) },
  { "id":"UZ", "name":"Uzbekistan", "value":parseFloat(confirmed[229]), "color": chart.colors.getIndex(0) },
  { "id":"VE", "name":"Venezuela", "value":parseFloat(confirmed[231]), "color":chart.colors.getIndex(3) },
  { "id":"PS", "name":"West Bank and Gaza", "value":0, "color": chart.colors.getIndex(0) },
  { "id":"VN", "name":"Vietnam", "value":parseFloat(confirmed[232]), "color": chart.colors.getIndex(0) },
  { "id":"YE", "name":"Yemen, Rep.", "value":parseFloat(confirmed[237]), "color": chart.colors.getIndex(0) },
  { "id":"ZM", "name":"Zambia", "value":parseFloat(confirmed[238]), "color":chart.colors.getIndex(2) },
  { "id":"ZW", "name":"Zimbabwe", "value":parseFloat(confirmed[239]), "color":chart.colors.getIndex(2) },
 
];



// Set map definition
chart.geodata = am4geodata_worldLow;

// Set projection
chart.projection = new am4maps.projections.Miller();

// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
polygonSeries.exclude = ["AQ"];
polygonSeries.useGeodata = true;
polygonSeries.nonScalingStroke = true;
polygonSeries.strokeWidth = 0.5;
polygonSeries.calculateVisualCenter = true;




var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.fill = am4core.color("#74B266");



var imageSeries = chart.series.push(new am4maps.MapImageSeries());
imageSeries.data = mapData;
imageSeries.dataFields.value = "value";

var imageTemplate = imageSeries.mapImages.template;
imageTemplate.nonScaling = true

var circle = imageTemplate.createChild(am4core.Circle);
circle.fillOpacity = 0.7;
circle.propertyFields.fill = "color";
circle.tooltipText = "{name}: [bold]{value}[/]";




imageSeries.heatRules.push({
  "target": circle,
  "property": "radius",
  "min": 4,
  "max": 30,
  "dataField": "value"
})

imageTemplate.adapter.add("latitude", function(latitude, target) {
  var polygon = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon){
    return polygon.visualLatitude;
   }
   return latitude;
})

imageTemplate.adapter.add("longitude", function(longitude, target) {
  var polygon = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon){
    return polygon.visualLongitude;
   }
   return longitude;
})


// Series for United States map and dz
var usaSeries = chart.series.push(new am4maps.MapPolygonSeries());
usaSeries.geodata = am4geodata_algeriaLow;
var polygonTemplate = usaSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.fill = am4core.color("#009432");


var usaSeries = chart.series.push(new am4maps.MapPolygonSeries());
usaSeries.geodata = am4geodata_usaLow
var polygonTemplate = usaSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.fill = am4core.color("#74B266");


// Create image series
var imageSeries_us = chart.series.push(new am4maps.MapImageSeries());

var imageSeriesTemplate_us = imageSeries_us.mapImages.template;
imageSeriesTemplate_us.nonScaling = true

var circle_us = imageSeriesTemplate_us.createChild(am4core.Circle);

circle_us.fillOpacity = 0.7;
circle_us.propertyFields.fill = "color";
circle_us.tooltipText = "{title}: [bold]{value}[/]";



// Set property fields
imageSeriesTemplate_us.propertyFields.latitude = "latitude";
imageSeriesTemplate_us.propertyFields.longitude = "longitude";


// Add data for the cities

imageSeries_us.dataFields.value = "value";

imageSeries_us.data = [{
  "latitude": 40.718111,
  "longitude": -73.873287,
  "title": "New York",
  "value":parseFloat(confirmed_state[36]),
  "color": "#0984e3",
},{
  "latitude": 44.500000,
  "longitude": -89.500000,
  "title": "Wisconsin",
  "value":parseFloat(confirmed_state[57]),
  "color": "#0984e3",
},{
  "latitude": 39.000000,
  "longitude": -80.500000,
  "title": "West Virginia",
  "value":parseFloat(confirmed_state[56]),
  "color": "#0984e3",
},{
  "latitude": 44.000000,
  "longitude": -72.699997,
  "title": "Vermont",
  "value":parseFloat(confirmed_state[52]),
  "color": "#0984e3",
},{
  "latitude":31.000000,
  "longitude":-100.000000 ,
  "title": "Texas",
  "value":parseFloat(confirmed_state[50]),
  "color": "#0984e3",
},{
  "latitude":44.500000,
  "longitude":-100.000000 ,
  "title": "South Dakota",
  "value":parseFloat(confirmed_state[48]),
  "color": "#0984e3",
},{
  "latitude":41.700001 ,
  "longitude": -71.500000,
  "title": "Rhode Island",
  "value":parseFloat(confirmed_state[46]),
  "color": "#0984e3",
},{
  "latitude":44.000000 ,
  "longitude":-120.500000 ,
  "title": "Oregon",
  "value":parseFloat(confirmed_state[42]),
  "color": "#0984e3",
},{
  "latitude": 44.000000,
  "longitude":-71.500000 ,
  "title": "New Hampshire",
  "value":parseFloat(confirmed_state[33]),
  "color": "#0984e3",
},{
  "latitude":41.500000 ,
  "longitude": -100.000000,
  "title": "Nebraska",
  "value":parseFloat(confirmed_state[31]),
  "color": "#0984e3",
},{
  "latitude":38.500000,
  "longitude": -98.000000,
  "title": "Kansas",
  "value":parseFloat(confirmed_state[19]),
  "color": "#0984e3",
},{
  "latitude":33.000000 ,
  "longitude": -90.000000,
  "title": "Mississippi",
  "value":parseFloat(confirmed_state[28]),
  "color": "#0984e3",
},{
  "latitude":40.000000 ,
  "longitude": -89.000000,
  "title": "Illinois",
  "value":parseFloat(confirmed_state[16]),
  "color": "#0984e3",
},{
  "latitude":39.000000,
  "longitude":-75.500000 ,
  "title": "Delaware",
  "value":parseFloat(confirmed_state[8]),
  "color": "#0984e3",
},{
  "latitude":41.599998 ,
  "longitude": -72.699997,
  "title": "Connecticut,",
  "value":parseFloat(confirmed_state[7]),
  "color": "#0984e3",
},{
  "latitude":34.799999,
  "longitude":-92.199997 ,
  "title": "Arkansas",
  "value":parseFloat(confirmed_state[4]),
  "color": "#0984e3",
},{
  "latitude":40.273502,
  "longitude":-86.126976,
  "title": "Indiana",
  "value":parseFloat(confirmed_state[17]),
  "color": "#0984e3",
},{
  "latitude":38.573936,
  "longitude":-92.603760,
  "title": "Missouri State",
  "value":parseFloat(confirmed_state[29]),
  "color": "#0984e3",
},{
  "latitude":27.994402,
  "longitude":-81.760254,
  "title": "Florida",
  "value":parseFloat(confirmed_state[11]),
  "color": "#0984e3",
},{
  "latitude":33.247875,
  "longitude":-83.441162,
  "title": "Georgia",
  "value":parseFloat(confirmed_state[12]),
  "color": "#0984e3",
},{
  "latitude":39.876019,
  "longitude":-117.224121,
  "title": "Nevada",
  "value":parseFloat(confirmed_state[32]),
  "color": "#0984e3",
},{
  "latitude":33.247875,
  "longitude":-83.441162,
  "title": "Georgia",
  "value":parseFloat(confirmed_state[32]),
  "color": "#0984e3",
},{
  "latitude":19.741755,
  "longitude":-155.844437,
  "title": "Hawaii",
  "value":parseFloat(confirmed_state[14]),
  "color": "#0984e3",
},{
  "latitude":66.160507,
  "longitude":-153.369141,
  "title": "Alaska",
  "value":parseFloat(confirmed_state[1]),
  "color": "#0984e3",
},{
  "latitude":35.860119,
  "longitude":-86.660156,
  "title": "Tennessee",
  "value":parseFloat(confirmed_state[49]),
  "color": "#0984e3",
},{
  "latitude":37.926868,
  "longitude":-78.024902,
  "title": "Virginia",
  "value":parseFloat(confirmed_state[54]),
  "color": "#0984e3",
},{
  "latitude":39.833851,
  "longitude":-74.871826,
  "title": "New Jersey",
  "value":parseFloat(confirmed_state[34]),
  "color": "#0984e3",
},{
  "latitude":37.839333,
  "longitude":-84.270020,
  "title": "Kentucky",
  "value":parseFloat(confirmed_state[20]),
  "color": "#0984e3",
},{
  "latitude":47.650589,
  "longitude":-100.437012,
  "title": "North Dakota",
  "value":parseFloat(confirmed_state[38]),
  "color": "#0984e3",
},{
  "latitude":46.392410,
  "longitude":-94.636230,
  "title": "Minnesota",
  "value":parseFloat(confirmed_state[27]),
  "color": "#0984e3",
},{
  "latitude":46.965260,
  "longitude":-109.533691,
  "title": "Montana",
  "value":parseFloat(confirmed_state[30]),
  "color": "#0984e3",
},{
  "latitude":36.084621,
  "longitude":-96.921387,
  "title": "Oklahoma",
  "value":parseFloat(confirmed_state[41]),
  "color": "#0984e3",
},{
  "latitude":47.751076,
  "longitude":-120.740135,
  "title": "Washington",
  "value":parseFloat(confirmed_state[55]),
  "color": "#0984e3",
},{
  "latitude":39.419220,
  "longitude":-111.950684,
  "title": "Utah",
  "value":parseFloat(confirmed_state[51]),
  "color": "#0984e3",
},{
  "latitude":39.113014,
  "longitude":-105.358887,
  "title": "Colorado",
  "value":parseFloat(confirmed_state[6]),
  "color": "#0984e3",
},{
  "latitude":40.367474,
  "longitude":-82.996216,
  "title": "Ohio",
  "value":parseFloat(confirmed_state[40]),
  "color": "#0984e3",
},{
  "latitude":32.318230,
  "longitude":-86.902298,
  "title": "Alabama",
  "value":parseFloat(confirmed_state[0]),
  "color": "#0984e3",
},{
  "latitude":42.032974,
  "longitude":-93.581543,
  "title": "Iowa",
  "value":parseFloat(confirmed_state[18]),
  "color": "#0984e3",
},{
  "latitude":34.307144,
  "longitude":-106.018066,
  "title": "New Mexico",
  "value":parseFloat(confirmed_state[35]),
  "color": "#0984e3",
},{
  "latitude":33.836082,
  "longitude":-81.163727,
  "title": "South Carolina",
  "value":parseFloat(confirmed_state[47]),
  "color": "#0984e3",
},{
  "latitude":41.203323,
  "longitude":-77.194527,
  "title": "Pennsylvania",
  "value":parseFloat(confirmed_state[44]),
  "color": "#0984e3",
},{
  "latitude":34.048927,
  "longitude":-111.093735,
  "title": "Arizona",
  "value":parseFloat(confirmed_state[3]),
  "color": "#0984e3",
},{
  "latitude":39.045753,
  "longitude":-76.641273,
  "title": "Maryland",
  "value":parseFloat(confirmed_state[24]),
  "color": "#0984e3",
},{
  "latitude":42.407211,
  "longitude":-71.382439,
  "title": "Massachusetts",
  "value":parseFloat(confirmed_state[25]),
  "color": "#0984e3",
},{
  "latitude":36.778259,
  "longitude":-119.417931,
  "title": "California",
  "value":parseFloat(confirmed_state[5]),
  "color": "#0984e3",
},{
  "latitude":44.068203,
  "longitude":-114.742043,
  "title": "Idaho",
  "value":parseFloat(confirmed_state[15]),
  "color": "#0984e3",
},{
  "latitude":43.075970,
  "longitude":-107.290283,
  "title": "Wyoming",
  "value":parseFloat(confirmed_state[58]),
  "color": "#0984e3",
},{
  "latitude":46.392410,
  "longitude":-94.636230,
  "title": "Minnesota",
  "value":parseFloat(confirmed_state[27]),
  "color": "#0984e3",
},{
  "latitude":45.367584,
  "longitude":-68.972168,
  "title": "Maine",
  "value":parseFloat(confirmed_state[22]),
  "color": "#0984e3",
},{
  "latitude":44.182205,
  "longitude":-84.506836,
  "title": "Michigan",
  "value":parseFloat(confirmed_state[26]),
  "color": "#0984e3",
},{
  "latitude":35.782169,
  "longitude":-80.793457,
  "title": "North Carolina",
  "value":parseFloat(confirmed_state[37]),
  "color": "#0984e3",
},{
  "latitude":30.391830,
  "longitude":-92.329102,
  "title": "Louisiana",
  "value":parseFloat(confirmed_state[21]),
  "color": "#0984e3",
},{
  "latitude": 27.975963,
  "longitude": -0.195736,
  "title": "Adrar",
  "value":parseFloat(confirmed_state[59]),
  "color": "#EA2027",
},{
  "latitude": 36.156183,  
  "longitude": 1.323728,
  "title": "Chlef",
  "value":parseFloat(confirmed_state[60]),
  "color": "#EA2027",
},{
  "latitude": 33.899514, 
  "longitude":  2.842542,
  "title": "Laghouat",
  "value":parseFloat(confirmed_state[61]),
  "color": "#EA2027",
},{
  "latitude": 35.913677,  
  "longitude": 7.069556,
  "title": "Oum El Bouaghi",
  "value":parseFloat(confirmed_state[62]),
  "color": "#EA2027",
},{
  "latitude":35.596684, 
  "longitude": 6.141796,
  "title": "Batna",
  "value":parseFloat(confirmed_state[63]),
  "color": "#EA2027",
},{
  "latitude":36.751011,
  "longitude": 4.984229,
  "title": "Béjaïa",
  "value":parseFloat(confirmed_state[64]),
  "color": "#EA2027",
},{
  "latitude":34.884462, 
  "longitude": 5.724932 ,
  "title": "Biskra ",
  "value":parseFloat(confirmed_state[65]),
  "color": "#EA2027",
},{
  "latitude":31.676713, 
  "longitude":-2.018306,
  "title": " Béchar ",
  "value":parseFloat(confirmed_state[66]),
  "color": "#EA2027",
},{
  "latitude": 36.493262, 
  "longitude":2.812035,
  "title": " Blida",
  "value":parseFloat(confirmed_state[67]),
  "color": "#EA2027",
},{
  "latitude":36.354143,
  "longitude":  3.876188,
  "title": "Bouira",
  "value":parseFloat(confirmed_state[68]),
  "color": "#EA2027",
},{
  "latitude":22.059892,
  "longitude":  5.410822,
  "title": "Tamanrasset",
  "value":parseFloat(confirmed_state[69]),
  "color": "#EA2027",
},{
  "latitude":35.379831, 
  "longitude": 8.148143,
  "title": "Tébessa",
  "value":parseFloat(confirmed_state[70]),
  "color": "#EA2027",
},{
  "latitude":34.899008, 
  "longitude": -1.319967,
  "title": "Tlemcen",
  "value":parseFloat(confirmed_state[71]),
  "color": "#EA2027",
},{
  "latitude":35.394966, 
  "longitude":1.337486,
  "title": "Tiaret",
  "value":parseFloat(confirmed_state[72]),
  "color": "#EA2027",
},{
  "latitude":36.702204, 
  "longitude": 4.087533,
  "title": "Tizi Ouzou",
  "value":parseFloat(confirmed_state[73]),
  "color": "#EA2027",
},{
  "latitude":36.770930, 
  "longitude":3.052437,
  "title": "Alger",
  "value":parseFloat(confirmed_state[74]),
  "color": "#EA2027",
},{
  "latitude":34.701106,
  "longitude": 3.245526,
  "title": "Djelfa",
  "value":parseFloat(confirmed_state[75]),
  "color": "#EA2027",
},{
  "latitude":36.824517,
  "longitude": 5.764578,
  "title": "Jijel",
  "value":parseFloat(confirmed_state[76]),
  "color": "#EA2027",
},{
  "latitude":36.205287, 
  "longitude":5.395448,
  "title": "Sétif",
  "value":parseFloat(confirmed_state[77]),
  "color": "#EA2027",
},{
  "latitude":34.843097,
  "longitude": 0.125599,
  "title": "Saïda",
  "value":parseFloat(confirmed_state[78]),
  "color": "#EA2027",
},{
  "latitude":36.889065, 
  "longitude":6.872562,
  "title": "Skikda",
  "value":parseFloat(confirmed_state[79]),
  "color": "#EA2027",
},{
  "latitude":35.228384, 
  "longitude":-0.668129,
  "title": "Sidi Bel Abbès",
  "value":parseFloat(confirmed_state[80]),
  "color": "#EA2027",
},{
  "latitude":36.923002, 
  "longitude":7.736223,
  "title": "Annaba",
  "value":parseFloat(confirmed_state[81]),
  "color": "#EA2027",
},{
  "latitude":36.481983, 
  "longitude":7.427660,
  "title": "Guelma",
  "value":parseFloat(confirmed_state[82]),
  "color": "#EA2027",
},{
  "latitude":36.377115, 
  "longitude":6.648133,
  "title": "Constantine",
  "value":parseFloat(confirmed_state[83]),
  "color": "#EA2027",
},{
  "latitude":36.278131,
  "longitude": 2.746783,
  "title": "Médéa",
  "value":parseFloat(confirmed_state[84]),
  "color": "#EA2027",
},{
  "latitude":35.939231,
  "longitude": 0.086993,
  "title": "Mostaganem",
  "value":parseFloat(confirmed_state[85]),
  "color": "#EA2027",
},{
  "latitude":35.746066,
  "longitude": 4.524206,
  "title": "M'Sila",
  "value":parseFloat(confirmed_state[86]),
  "color": "#EA2027",
},{
  "latitude":35.375179, 
  "longitude":0.158009,
  "title": "Mascara",
  "value":parseFloat(confirmed_state[87]),
  "color": "#EA2027",
},{
  "latitude":32.046183, 
  "longitude":5.009999,
  "title": "Ouargla ",
  "value":parseFloat(confirmed_state[88]),
  "color": "#EA2027",
},{
  "latitude":35.688234,
  "longitude": -0.689693,
  "title": "Oran",
  "value":parseFloat(confirmed_state[89]),
  "color": "#EA2027",
},{
  "latitude":33.529572, 
  "longitude":0.959083,
  "title": "El Bayadh",
  "value":parseFloat(confirmed_state[90]),
  "color": "#EA2027",
},{
  "latitude":26.581631,
  "longitude": 8.179625,
  "title": "Illizi ",
  "value":parseFloat(confirmed_state[91]),
  "color": "#EA2027",
},{
  "latitude":36.079775,
  "longitude": 4.725006,
  "title": "Bordj Bou Arreridj",
  "value":parseFloat(confirmed_state[92]),
  "color": "#EA2027",
},{
  "latitude":36.753061, 
  "longitude":3.493746,
  "title": "Boumerdès",
  "value":parseFloat(confirmed_state[93]),
  "color": "#EA2027",
},{
  "latitude":36.901833, 
  "longitude":8.189952,
  "title": "El Tarf",
  "value":parseFloat(confirmed_state[94]),
  "color": "#EA2027",
},{
  "latitude":27.398774, 
  "longitude":-7.555800,
  "title": "Tindouf",
  "value":parseFloat(confirmed_state[95]),
  "color": "#EA2027",
},{
  "latitude":35.620104, 
  "longitude":1.818920,
  "title": "Tissemsilt",
  "value":parseFloat(confirmed_state[96]),
  "color": "#EA2027",
},{
  "latitude":33.349276,
  "longitude": 6.835018,
  "title": "El Oued ",
  "value":parseFloat(confirmed_state[97]),
  "color": "#EA2027",
},{
  "latitude":35.432770, 
  "longitude":7.156950,
  "title": "Khenchela",
  "value":parseFloat(confirmed_state[98]),
  "color": "#EA2027",
},{
  "latitude":36.289174,
  "longitude": 7.918068,
  "title": "Souk Ahras",
  "value":parseFloat(confirmed_state[99]),
  "color": "#EA2027",
},{
  "latitude":36.593708, 
  "longitude":2.400112,
  "title": "Tipaza",
  "value":parseFloat(confirmed_state[100]),
  "color": "#EA2027",
},{
  "latitude":36.446074, 
  "longitude":6.240779,
  "title": " Mila",
  "value":parseFloat(confirmed_state[101]),
  "color": "#EA2027",
},{
  "latitude":36.244916, 
  "longitude":1.951521,
  "title": "Aïn Defla",
  "value":parseFloat(confirmed_state[102]),
  "color": "#EA2027",
},{
  "latitude":33.305840, 
  "longitude":-0.345974,
  "title": "Naâma",
  "value":parseFloat(confirmed_state[103]),
  "color": "#EA2027",
},{
  "latitude":35.273443, 
  "longitude":-1.113984,
  "title": "Aïn Témouchent",
  "value":parseFloat(confirmed_state[104]),
  "color": "#EA2027",
},{
  "latitude":32.511277, 
  "longitude":3.651151,
  "title": "Ghardaïa ",
  "value":parseFloat(confirmed_state[105]),
  "color": "#EA2027",
},{
  "latitude":35.752678,
  "longitude": 0.554961,
  "title": "Relizane",
  "value":parseFloat(confirmed_state[106]),
  "color": "#EA2027",
}];




imageSeries.heatRules.push({
  "target": circle_us,
  "property": "radius",
  "min": 4,
  "max": 30,
  "dataField": "value"
})

imageSeriesTemplate_us.adapter.add("latitude", function(latitude, target) {
  var polygon_us = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon_us){
    return polygon_us.visualLatitude;
   }
   return latitude;
})

imageSeriesTemplate_us.adapter.add("longitude", function(longitude, target) {
  var polygon_us = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon_us){
    return polygon_us.visualLongitude;
   }
   return longitude;
})


}); // end am4core.ready()


  }
});


/***************selected country******************/


$('#country').change(function(){
var deaths_s = 0;
var recovered_s = 0;
var confirmed_s = 0;
var quarantine = 0;
var lastupdate = 0;
    
var countryID = $(this).val(); 

   
    if(countryID !== "All World" & countryID !== "United States" & countryID !== "Algeria"){
        $.ajax({
           type:"GET",
           url:"{{url('getdata')}}?country="+countryID,
           success:function(res){               
            if(res){

                $.each(res,function(key,value){
                    //console.log(value.Confirmed);
                    if (value.Confirmed !== null){
                    deaths_s = value.Deaths;
                    recovered_s = value.Recovered;
                    confirmed_s = value.Confirmed;
                    lastupdate = value.updated_at;
                    quarantine = (parseFloat(confirmed_s)) - (parseFloat(deaths_s) + parseFloat(recovered_s));
                    }
                });
$(".select-state").empty();
$("#datalist").empty();
 $("#datalist").append('<li style="color: #00a8ff ;">Confirmed : '+confirmed_s+'</li>');
 $("#datalist").append('<li style="color: #27ae60 ;">Recovered : '+recovered_s+'</li>');
  $("#datalist").append('<li style="color: #EE5A24 ;">Quarantine : '+quarantine+'</li>');
 $("#datalist").append('<li style="color: #d63031 ;">Deaths : '+deaths_s+'</li>');
 $("#datalist").append('<li style="color: #555 ;font-size: 12px;padding-top: 17px;">Updated : '+lastupdate+'</li>');


am4core.ready(function() {

// Themes begin

am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data


chart.data = [ {
  "country": "Deaths",
  "litres": deaths_s,
  "color": am4core.color("#EA2027")
}, {
  "country": "Recovered",
  "litres": recovered_s,
  "color": am4core.color("#44bd32")
}, {
  "country": "Quarantine",
  "litres": quarantine,
  "color": am4core.color("#0097e6")
}];

// Set inner radius
chart.innerRadius = am4core.percent(50);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template.propertyFields.fill = "color";
pieSeries.slices.template.tooltipText = "";
pieSeries.labels.template.disabled = true;
pieSeries.ticks.template.disabled = true;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.legend = new am4charts.Legend();


}); // end am4core.ready()
           
            }else{
              alert("No Data"); 
            }

/** bar chart**/


           }
        });
    }else if(countryID == "United States"){
  $(".select-state").empty();
  $(".select-state").append('<label class="uk-form-label " for="form-stacked-select">State</label><div class="uk-form-controls"><select class="uk-select" id="State" name="state"><option>Select State </option>@foreach($stateshare as $stateshare)<option>{{$stateshare->name}}</option>@endforeach</select></div>');

    var countryID = $(this).val(); 

   
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('getdata')}}?country="+countryID,
           success:function(ress){               
            if(ress){

                $.each(ress,function(key,value){
                    //console.log(value.Confirmed);
                    if (value.Confirmed !== null){
                    deaths_s = value.Deaths;
                    recovered_s = value.Recovered;
                    confirmed_s = value.Confirmed;
                     lastupdate = value.updated_at;
                    quarantine = (parseFloat(confirmed_s)) - (parseFloat(deaths_s) + parseFloat(recovered_s));
                    }
                });

$("#datalist").empty();
 $("#datalist").append('<li style="color: #00a8ff ;">Confirmed : '+confirmed_s+'</li>');
 $("#datalist").append('<li style="color: #27ae60 ;">Recovered : '+recovered_s+'</li>');
  $("#datalist").append('<li style="color: #EE5A24 ;">Quarantine : '+quarantine+'</li>');
 $("#datalist").append('<li style="color: #d63031 ;">Deaths : '+deaths_s+'</li>');
$("#datalist").append('<li style="color: #555 ;font-size: 12px;padding-top: 17px;">Updated : '+lastupdate+'</li>');

am4core.ready(function() {

// Themes begin

am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data


chart.data = [ {
  "country": "Deaths",
  "litres": deaths_s,
  "color": am4core.color("#EA2027")
}, {
  "country": "Recovered",
  "litres": recovered_s,
  "color": am4core.color("#44bd32")
}, {
  "country": "Quarantine",
  "litres": quarantine,
  "color": am4core.color("#0097e6")
}];

// Set inner radius
chart.innerRadius = am4core.percent(50);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template.propertyFields.fill = "color";
pieSeries.slices.template.tooltipText = "";
pieSeries.labels.template.disabled = true;
pieSeries.ticks.template.disabled = true;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.legend = new am4charts.Legend();

}); // end am4core.ready()
           
            }else{
              alert("No Data"); 
            }
           }
        });
    }
    

    $('#State').change(function(){

    var stateID = $(this).val(); 
    getdatapie(stateID);
      });



    }else if(countryID == "Algeria"){

  $(".select-state").empty();
  $(".select-state").append('<label class="uk-form-label " for="form-stacked-select">City</label><div class="uk-form-controls"><select class="uk-select" id="State" name="state"><option>Select City </option>@foreach($statesharedz as $statesharedz)<option>{{$statesharedz->name}}</option>@endforeach</select></div>');

        var countryID = $(this).val(); 

   
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('getdata')}}?country="+countryID,
           success:function(ress){               
            if(ress){

                $.each(ress,function(key,value){
                    //console.log(value.Confirmed);
                    if (value.Confirmed !== null){
                    deaths_s = value.Deaths;
                    recovered_s = value.Recovered;
                    confirmed_s = value.Confirmed;
                     lastupdate = value.updated_at;
                    quarantine = (parseFloat(confirmed_s)) - (parseFloat(deaths_s) + parseFloat(recovered_s));
                    }
                });

$("#datalist").empty();
 $("#datalist").append('<li style="color: #00a8ff ;">Confirmed : '+confirmed_s+'</li>');
 $("#datalist").append('<li style="color: #27ae60 ;">Recovered : '+recovered_s+'</li>');
  $("#datalist").append('<li style="color: #EE5A24 ;">Quarantine : '+quarantine+'</li>');
 $("#datalist").append('<li style="color: #d63031 ;">Deaths : '+deaths_s+'</li>');
$("#datalist").append('<li style="color: #555 ;font-size: 12px;padding-top: 17px;">Updated : '+lastupdate+'</li>');

am4core.ready(function() {

// Themes begin

am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data


chart.data = [ {
  "country": "Deaths",
  "litres": deaths_s,
  "color": am4core.color("#EA2027")
}, {
  "country": "Recovered",
  "litres": recovered_s,
  "color": am4core.color("#44bd32")
}, {
  "country": "Quarantine",
  "litres": quarantine,
  "color": am4core.color("#0097e6")
}];

// Set inner radius
chart.innerRadius = am4core.percent(50);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template.propertyFields.fill = "color";
pieSeries.slices.template.tooltipText = "";
pieSeries.labels.template.disabled = true;
pieSeries.ticks.template.disabled = true;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.legend = new am4charts.Legend();

}); // end am4core.ready()
           
            }else{
              alert("No Data"); 
            }
           }
        });
    }
    

    $('#State').change(function(){

    var stateID = $(this).val(); 
    getdatapie(stateID);
      });

  }else{
        ///FOR ALL THE WORLD
var confirmed=[];
var mapData;
var chart;
$.ajax({
           type:"GET",
           url:"{{url('getalldata')}}",
           success:function(res){               
            if(res){

              $.each(res,function(key,value){
                   idd = value.id;
                    confirmed[idd] = value.Confirmed;
                    lastupdate = value.updated_at;
                });
$(".select-state").empty();
 $("#datalist").empty();
 $("#datalist").append('<li style="color: #00a8ff ;">Confirmed : {{$total_confirmed}}</li>');
 $("#datalist").append('<li style="color: #27ae60 ;">Recovered : {{$total_recovered}}</li>');
 $("#datalist").append('<li style="color: #d63031 ;">Deaths : {{$total_deaths}}</li>');
  $("#datalist").append('<li style="color: #555 ;font-size: 12px;padding-top: 17px;">Updated : '+lastupdate+'</li>');          
            }



am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
// Themes end

// Create map instance
 chart = am4core.create("chartdiv", am4maps.MapChart);

//var title = chart.titles.create();
//title.text = "[bold font-size: 20]Population of the World in 2011[/]\nsource: Gapminder";
//title.textAlign = "middle";
  mapData = [
  { "id":"AF", "name":"Afghanistan", "value":parseFloat(confirmed[1]), "color": chart.colors.getIndex(0) },
  { "id":"AL", "name":"Albania", "value":parseFloat(confirmed[2]), "color":chart.colors.getIndex(1) },
  { "id":"DZ", "name":"Algeria", "value":null, "color":chart.colors.getIndex(2) },
  { "id":"AO", "name":"Angola", "value":parseFloat(confirmed[6]), "color":chart.colors.getIndex(2) },
  { "id":"AR", "name":"Argentina", "value":parseFloat(confirmed[10]), "color":chart.colors.getIndex(3) },
  { "id":"AM", "name":"Armenia", "value":parseFloat(confirmed[11]), "color":chart.colors.getIndex(1) },
  { "id":"AU", "name":"Australia", "value":parseFloat(confirmed[13]), "color":"#8aabb0" },
  { "id":"AT", "name":"Austria", "value":parseFloat(confirmed[14]), "color":chart.colors.getIndex(1) },
  { "id":"AZ", "name":"Azerbaijan", "value":parseFloat(confirmed[15]), "color":chart.colors.getIndex(1) },
  { "id":"BH", "name":"Bahrain", "value":parseFloat(confirmed[17]), "color": chart.colors.getIndex(0) },
  { "id":"BD", "name":"Bangladesh", "value":parseFloat(confirmed[18]), "color": chart.colors.getIndex(0) },
  { "id":"BY", "name":"Belarus", "value":parseFloat(confirmed[20]), "color":chart.colors.getIndex(1) },
  { "id":"BE", "name":"Belgium", "value":parseFloat(confirmed[21]), "color":chart.colors.getIndex(1) },
  { "id":"BJ", "name":"Benin", "value":parseFloat(confirmed[23]), "color":chart.colors.getIndex(2) },
  { "id":"BT", "name":"Bhutan", "value":parseFloat(confirmed[25]), "color": chart.colors.getIndex(0) },
  { "id":"BO", "name":"Bolivia", "value":parseFloat(confirmed[26]), "color":chart.colors.getIndex(3) },
  { "id":"BA", "name":"Bosnia and Herzegovina", "value":parseFloat(confirmed[26]), "color":chart.colors.getIndex(1) },
  { "id":"BW", "name":"Botswana", "value":parseFloat(confirmed[28]), "color":chart.colors.getIndex(2) },
  { "id":"BR", "name":"Brazil", "value":parseFloat(confirmed[30]), "color":chart.colors.getIndex(3) },
  { "id":"BN", "name":"Brunei", "value":parseFloat(confirmed[32]), "color": chart.colors.getIndex(0) },
  { "id":"BG", "name":"Bulgaria", "value":parseFloat(confirmed[33]), "color":chart.colors.getIndex(1) },
  { "id":"BF", "name":"Burkina Faso", "value":parseFloat(confirmed[34]), "color":chart.colors.getIndex(2) },
  { "id":"BI", "name":"Burundi", "value":parseFloat(confirmed[35]), "color":chart.colors.getIndex(2) },
  { "id":"KH", "name":"Cambodia", "value":parseFloat(confirmed[36]), "color": chart.colors.getIndex(0) },
  { "id":"CM", "name":"Cameroon", "value":parseFloat(confirmed[37]), "color":chart.colors.getIndex(2) },
  { "id":"CA", "name":"Canada", "value":parseFloat(confirmed[38]), "color":chart.colors.getIndex(4) },
  { "id":"CV", "name":"Cape Verde", "value":parseFloat(confirmed[39]), "color":chart.colors.getIndex(2) },
  { "id":"CF", "name":"Central African Rep.", "value":parseFloat(confirmed[41]), "color":chart.colors.getIndex(2) },
  { "id":"TD", "name":"Chad", "value":parseFloat(confirmed[42]), "color":chart.colors.getIndex(2) },
  { "id":"CL", "name":"Chile", "value":parseFloat(confirmed[43]), "color":chart.colors.getIndex(3) },
  { "id":"CN", "name":"China", "value":parseFloat(confirmed[44]), "color": chart.colors.getIndex(0) },
  { "id":"CO", "name":"Colombia", "value":parseFloat(confirmed[47]), "color":chart.colors.getIndex(3) },
  { "id":"KM", "name":"Comoros", "value":parseFloat(confirmed[48]), "color":chart.colors.getIndex(2) },
  { "id":"CD", "name":"Congo, Dem. Rep.", "value":parseFloat(confirmed[50]), "color":chart.colors.getIndex(2) },
  { "id":"CG", "name":"Congo, Rep.", "value":parseFloat(confirmed[49]), "color":chart.colors.getIndex(2) },
  { "id":"CR", "name":"Costa Rica", "value":parseFloat(confirmed[52]), "color":chart.colors.getIndex(4) },
  { "id":"CI", "name":"Cote d'Ivoire", "value":parseFloat(confirmed[53]), "color":chart.colors.getIndex(2) },
  { "id":"HR", "name":"Croatia", "value":parseFloat(confirmed[54]), "color":chart.colors.getIndex(1) },
  { "id":"CU", "name":"Cuba", "value":parseFloat(confirmed[55]), "color":chart.colors.getIndex(4) },
  { "id":"CY", "name":"Cyprus", "value":parseFloat(confirmed[56]), "color":chart.colors.getIndex(1) },
  { "id":"CZ", "name":"Czech Rep.", "value":parseFloat(confirmed[57]), "color":chart.colors.getIndex(1) },
  { "id":"DK", "name":"Denmark", "value":parseFloat(confirmed[58]), "color":chart.colors.getIndex(1) },
  { "id":"DJ", "name":"Djibouti", "value":parseFloat(confirmed[59]), "color":chart.colors.getIndex(2) },
  { "id":"DO", "name":"Dominican Rep.", "value":parseFloat(confirmed[61]), "color":chart.colors.getIndex(4) },
  { "id":"EC", "name":"Ecuador", "value":parseFloat(confirmed[62]), "color":chart.colors.getIndex(3) },
  { "id":"EG", "name":"Egypt", "value":parseFloat(confirmed[63]), "color":chart.colors.getIndex(2) },
  { "id":"SV", "name":"El Salvador", "value":parseFloat(confirmed[64]), "color":chart.colors.getIndex(4) },
  { "id":"GQ", "name":"Equatorial Guinea", "value":parseFloat(confirmed[65]), "color":chart.colors.getIndex(2) },
  { "id":"ER", "name":"Eritrea", "value":parseFloat(confirmed[66]), "color":chart.colors.getIndex(2) },
  { "id":"EE", "name":"Estonia", "value":parseFloat(confirmed[67]), "color":chart.colors.getIndex(1) },
  { "id":"ET", "name":"Ethiopia", "value":parseFloat(confirmed[68]), "color":chart.colors.getIndex(2) },
  { "id":"FJ", "name":"Fiji", "value":parseFloat(confirmed[71]), "color":"#8aabb0" },
  { "id":"FI", "name":"Finland", "value":parseFloat(confirmed[72]), "color":chart.colors.getIndex(1) },
  { "id":"FR", "name":"France", "value":parseFloat(confirmed[73]), "color":chart.colors.getIndex(1) },
  { "id":"GA", "name":"Gabon", "value":parseFloat(confirmed[74]), "color":chart.colors.getIndex(2) },
  { "id":"GM", "name":"Gambia", "value":parseFloat(confirmed[78]), "color":chart.colors.getIndex(2) },
  { "id":"GE", "name":"Georgia", "value":parseFloat(confirmed[79]), "color":chart.colors.getIndex(1) },
  { "id":"DE", "name":"Germany", "value":parseFloat(confirmed[80]), "color":chart.colors.getIndex(1) },
  { "id":"GH", "name":"Ghana", "value":parseFloat(confirmed[81]), "color":chart.colors.getIndex(2) },
  { "id":"GR", "name":"Greece", "value":parseFloat(confirmed[83]), "color":chart.colors.getIndex(1) },
  { "id":"GT", "name":"Guatemala", "value":parseFloat(confirmed[88]), "color":chart.colors.getIndex(4) },
  { "id":"GN", "name":"Guinea", "value":parseFloat(confirmed[89]), "color":chart.colors.getIndex(2) },
  { "id":"GW", "name":"Guinea-Bissau", "value":parseFloat(confirmed[90]), "color":chart.colors.getIndex(2) },
  { "id":"GY", "name":"Guyana", "value":parseFloat(confirmed[91]), "color":chart.colors.getIndex(3) },
  { "id":"HT", "name":"Haiti", "value":parseFloat(confirmed[92]), "color":chart.colors.getIndex(4) },
  { "id":"HN", "name":"Honduras", "value":parseFloat(confirmed[95]), "color":chart.colors.getIndex(4) },
  { "id":"HK", "name":"Hong Kong, China", "value":parseFloat(confirmed[96]), "color": chart.colors.getIndex(0) },
  { "id":"HU", "name":"Hungary", "value":parseFloat(confirmed[97]), "color":chart.colors.getIndex(1) },
  { "id":"IS", "name":"Iceland", "value":parseFloat(confirmed[98]), "color":chart.colors.getIndex(1) },
  { "id":"IN", "name":"India", "value":parseFloat(confirmed[99]), "color": chart.colors.getIndex(0) },
  { "id":"ID", "name":"Indonesia", "value":parseFloat(confirmed[100]), "color": chart.colors.getIndex(0) },
  { "id":"IR", "name":"Iran", "value":parseFloat(confirmed[101]), "color": chart.colors.getIndex(0) },
  { "id":"IQ", "name":"Iraq", "value":parseFloat(confirmed[102]), "color": chart.colors.getIndex(0) },
  { "id":"IE", "name":"Ireland", "value":parseFloat(confirmed[103]), "color":chart.colors.getIndex(1) },
  { "id":"IL", "name":"Israel", "value":parseFloat(confirmed[104]), "color": chart.colors.getIndex(0) },
  { "id":"IT", "name":"Italy", "value":parseFloat(confirmed[105]), "color":chart.colors.getIndex(1) },
  { "id":"JM", "name":"Jamaica", "value":parseFloat(confirmed[106]), "color":chart.colors.getIndex(4) },
  { "id":"JP", "name":"Japan", "value":parseFloat(confirmed[107]), "color": chart.colors.getIndex(0) },
  { "id":"JO", "name":"Jordan", "value":parseFloat(confirmed[108]), "color": chart.colors.getIndex(0) },
  { "id":"KZ", "name":"Kazakhstan", "value":parseFloat(confirmed[109]), "color": chart.colors.getIndex(0) },
  { "id":"KE", "name":"Kenya", "value":parseFloat(confirmed[110]), "color":chart.colors.getIndex(2) },
  { "id":"KP", "name":"Korea, Dem. Rep.", "value":parseFloat(confirmed[112]), "color": chart.colors.getIndex(0) },
  { "id":"KR", "name":"Korea, Rep.", "value":parseFloat(confirmed[113]), "color": chart.colors.getIndex(0) },
  { "id":"KW", "name":"Kuwait", "value":parseFloat(confirmed[114]), "color": chart.colors.getIndex(0) },
  { "id":"KG", "name":"Kyrgyzstan", "value":parseFloat(confirmed[115]), "color": chart.colors.getIndex(0) },
  { "id":"LA", "name":"Laos", "value":parseFloat(confirmed[116]), "color": chart.colors.getIndex(0) },
  { "id":"LV", "name":"Latvia", "value":parseFloat(confirmed[117]), "color":chart.colors.getIndex(1) },
  { "id":"LB", "name":"Lebanon", "value":parseFloat(confirmed[118]), "color": chart.colors.getIndex(0) },
  { "id":"LS", "name":"Lesotho", "value":parseFloat(confirmed[119]), "color":chart.colors.getIndex(2) },
  { "id":"LR", "name":"Liberia", "value":parseFloat(confirmed[120]), "color":chart.colors.getIndex(2) },
  { "id":"LY", "name":"Libya", "value":parseFloat(confirmed[121]), "color":chart.colors.getIndex(2) },
  { "id":"LT", "name":"Lithuania", "value":parseFloat(confirmed[123]), "color":chart.colors.getIndex(1) },
  { "id":"LU", "name":"Luxembourg", "value":parseFloat(confirmed[124]), "color":chart.colors.getIndex(1) },
  { "id":"MK", "name":"Macedonia, FYR", "value":parseFloat(confirmed[126]), "color":chart.colors.getIndex(1) },
  { "id":"MG", "name":"Madagascar", "value":parseFloat(confirmed[127]), "color":chart.colors.getIndex(2) },
  { "id":"MW", "name":"Malawi", "value":parseFloat(confirmed[128]), "color":chart.colors.getIndex(2) },
  { "id":"MY", "name":"Malaysia", "value":parseFloat(confirmed[129]), "color": chart.colors.getIndex(0) },
  { "id":"ML", "name":"Mali", "value":parseFloat(confirmed[131]), "color":chart.colors.getIndex(2) },
  { "id":"MR", "name":"Mauritania", "value":parseFloat(confirmed[135]), "color":chart.colors.getIndex(2) },
  { "id":"MU", "name":"Mauritius", "value":parseFloat(confirmed[126]), "color":chart.colors.getIndex(2) },
  { "id":"MX", "name":"Mexico", "value":parseFloat(confirmed[138]), "color":chart.colors.getIndex(4) },
  { "id":"MD", "name":"Moldova", "value":parseFloat(confirmed[140]), "color":chart.colors.getIndex(1) },
  { "id":"MN", "name":"Mongolia", "value":parseFloat(confirmed[142]), "color": chart.colors.getIndex(0) },
  { "id":"ME", "name":"Montenegro", "value":0, "color":chart.colors.getIndex(1) },
  { "id":"MA", "name":"Morocco", "value":parseFloat(confirmed[144]), "color":chart.colors.getIndex(2) },
  { "id":"MZ", "name":"Mozambique", "value":parseFloat(confirmed[145]), "color":chart.colors.getIndex(2) },
  { "id":"MM", "name":"Myanmar", "value":parseFloat(confirmed[146]), "color": chart.colors.getIndex(0) },
  { "id":"NA", "name":"Namibia", "value":parseFloat(confirmed[147]), "color":chart.colors.getIndex(2) },
  { "id":"NP", "name":"Nepal", "value":parseFloat(confirmed[149]), "color": chart.colors.getIndex(0) },
  { "id":"NL", "name":"Netherlands", "value":parseFloat(confirmed[150]), "color":chart.colors.getIndex(1) },
  { "id":"NZ", "name":"New Zealand", "value":parseFloat(confirmed[153]), "color":"#8aabb0" },
  { "id":"NI", "name":"Nicaragua", "value":parseFloat(confirmed[154]), "color":chart.colors.getIndex(4) },
  { "id":"NE", "name":"Niger", "value":parseFloat(confirmed[155]), "color":chart.colors.getIndex(2) },
  { "id":"NG", "name":"Nigeria", "value":parseFloat(confirmed[156]), "color":chart.colors.getIndex(2) },
  { "id":"NO", "name":"Norway", "value":parseFloat(confirmed[160]), "color":chart.colors.getIndex(1) },
  { "id":"OM", "name":"Oman", "value":parseFloat(confirmed[161]), "color": chart.colors.getIndex(0) },
  { "id":"PK", "name":"Pakistan", "value":parseFloat(confirmed[162]), "color": chart.colors.getIndex(0) },
  { "id":"PA", "name":"Panama", "value":parseFloat(confirmed[165]), "color":chart.colors.getIndex(4) },
  { "id":"PG", "name":"Papua New Guinea", "value":parseFloat(confirmed[166]), "color":"#8aabb0" },
  { "id":"PY", "name":"Paraguay", "value":parseFloat(confirmed[167]), "color":chart.colors.getIndex(3) },
  { "id":"PE", "name":"Peru", "value":parseFloat(confirmed[168]), "color":chart.colors.getIndex(3) },
  { "id":"PH", "name":"Philippines", "value":parseFloat(confirmed[169]), "color": chart.colors.getIndex(0) },
  { "id":"PL", "name":"Poland", "value":parseFloat(confirmed[171]), "color":chart.colors.getIndex(1) },
  { "id":"PT", "name":"Portugal", "value":parseFloat(confirmed[172]), "color":chart.colors.getIndex(1) },
  { "id":"PR", "name":"Puerto Rico", "value":parseFloat(confirmed[173]), "color":chart.colors.getIndex(4) },
  { "id":"QA", "name":"Qatar", "value":parseFloat(confirmed[174]), "color": chart.colors.getIndex(0) },
  { "id":"RO", "name":"Romania", "value":parseFloat(confirmed[176]), "color":chart.colors.getIndex(1) },
  { "id":"RU", "name":"Russia", "value":parseFloat(confirmed[177]), "color":chart.colors.getIndex(1) },
  { "id":"RW", "name":"Rwanda", "value":parseFloat(confirmed[178]), "color":chart.colors.getIndex(2) },
  { "id":"SA", "name":"Saudi Arabia", "value":parseFloat(confirmed[187]), "color": chart.colors.getIndex(0) },
  { "id":"SN", "name":"Senegal", "value":parseFloat(confirmed[188]), "color":chart.colors.getIndex(2) },
  { "id":"RS", "name":"Serbia", "value":parseFloat(confirmed[189]), "color":chart.colors.getIndex(1) },
  { "id":"SL", "name":"Sierra Leone", "value":parseFloat(confirmed[191]), "color":chart.colors.getIndex(2) },
  { "id":"SG", "name":"Singapore", "value":parseFloat(confirmed[192]), "color": chart.colors.getIndex(0) },
  { "id":"SK", "name":"Slovak Republic", "value":parseFloat(confirmed[193]), "color":chart.colors.getIndex(1) },
  { "id":"SI", "name":"Slovenia", "value":parseFloat(confirmed[194]), "color":chart.colors.getIndex(1) },
  { "id":"SB", "name":"Solomon Islands", "value":parseFloat(confirmed[195]), "color":"#8aabb0" },
  { "id":"SO", "name":"Somalia", "value":parseFloat(confirmed[196]), "color":chart.colors.getIndex(2) },
  { "id":"ZA", "name":"South Africa", "value":parseFloat(confirmed[197]), "color":chart.colors.getIndex(2) },
  { "id":"ES", "name":"Spain", "value":parseFloat(confirmed[199]), "color":chart.colors.getIndex(1) },
  { "id":"LK", "name":"Sri Lanka", "value":parseFloat(confirmed[200]), "color": chart.colors.getIndex(0) },
  { "id":"SD", "name":"Sudan", "value":parseFloat(confirmed[201]), "color":chart.colors.getIndex(2) },
  { "id":"SR", "name":"Suriname", "value":parseFloat(confirmed[202]), "color":chart.colors.getIndex(3) },
  { "id":"SZ", "name":"Swaziland", "value":parseFloat(confirmed[204]), "color":chart.colors.getIndex(2) },
  { "id":"SE", "name":"Sweden", "value":parseFloat(confirmed[205]), "color":chart.colors.getIndex(1) },
  { "id":"CH", "name":"Switzerland", "value":parseFloat(confirmed[206]), "color":chart.colors.getIndex(1) },
  { "id":"SY", "name":"Syria", "value":parseFloat(confirmed[207]), "color": chart.colors.getIndex(0) },
  { "id":"TW", "name":"Taiwan", "value":parseFloat(confirmed[208]), "color": chart.colors.getIndex(0) },
  { "id":"TJ", "name":"Tajikistan", "value":parseFloat(confirmed[209]), "color": chart.colors.getIndex(0) },
  { "id":"TZ", "name":"Tanzania", "value":parseFloat(confirmed[210]), "color":chart.colors.getIndex(2) },
  { "id":"TH", "name":"Thailand", "value":parseFloat(confirmed[211]), "color": chart.colors.getIndex(0) },
  { "id":"TG", "name":"Togo", "value":parseFloat(confirmed[213]), "color":chart.colors.getIndex(2) },
  { "id":"TT", "name":"Trinidad and Tobago", "value":parseFloat(confirmed[216]), "color":chart.colors.getIndex(4) },
  { "id":"TN", "name":"Tunisia", "value":parseFloat(confirmed[217]), "color":chart.colors.getIndex(2) },
  { "id":"TR", "name":"Turkey", "value":parseFloat(confirmed[218]), "color":chart.colors.getIndex(1) },
  { "id":"TM", "name":"Turkmenistan", "value":parseFloat(confirmed[219]), "color": chart.colors.getIndex(0) },
  { "id":"UG", "name":"Uganda", "value":parseFloat(confirmed[222]), "color":chart.colors.getIndex(2) },
  { "id":"UA", "name":"Ukraine", "value":parseFloat(confirmed[223]), "color":chart.colors.getIndex(1) },
  { "id":"AE", "name":"United Arab Emirates", "value":parseFloat(confirmed[224]), "color": chart.colors.getIndex(0) },
  { "id":"GB", "name":"United Kingdom", "value":parseFloat(confirmed[225]), "color":chart.colors.getIndex(1) },
  { "id":"US", "name":"United States", "value":parseFloat(confirmed[227]), "color":chart.colors.getIndex(4) },
  { "id":"UY", "name":"Uruguay", "value":parseFloat(confirmed[228]), "color":chart.colors.getIndex(3) },
  { "id":"UZ", "name":"Uzbekistan", "value":parseFloat(confirmed[229]), "color": chart.colors.getIndex(0) },
  { "id":"VE", "name":"Venezuela", "value":parseFloat(confirmed[231]), "color":chart.colors.getIndex(3) },
  { "id":"PS", "name":"West Bank and Gaza", "value":0, "color": chart.colors.getIndex(0) },
  { "id":"VN", "name":"Vietnam", "value":parseFloat(confirmed[232]), "color": chart.colors.getIndex(0) },
  { "id":"YE", "name":"Yemen, Rep.", "value":parseFloat(confirmed[237]), "color": chart.colors.getIndex(0) },
  { "id":"ZM", "name":"Zambia", "value":parseFloat(confirmed[238]), "color":chart.colors.getIndex(2) },
  { "id":"ZW", "name":"Zimbabwe", "value":parseFloat(confirmed[239]), "color":chart.colors.getIndex(2) },
 
];





// Set map definition
chart.geodata = am4geodata_worldLow;

// Set projection
chart.projection = new am4maps.projections.Miller();

// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
polygonSeries.exclude = ["AQ"];
polygonSeries.useGeodata = true;
polygonSeries.nonScalingStroke = true;
polygonSeries.strokeWidth = 0.5;
polygonSeries.calculateVisualCenter = true;
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.fill = am4core.color("#74B266");

var imageSeries = chart.series.push(new am4maps.MapImageSeries());
imageSeries.data = mapData;
imageSeries.dataFields.value = "value";

var imageTemplate = imageSeries.mapImages.template;
imageTemplate.nonScaling = true

var circle = imageTemplate.createChild(am4core.Circle);
circle.fillOpacity = 0.7;
circle.propertyFields.fill = "color";
circle.tooltipText = "{name}: [bold]{value}[/]";


imageSeries.heatRules.push({
  "target": circle,
  "property": "radius",
  "min": 4,
  "max": 30,
  "dataField": "value"
})

imageTemplate.adapter.add("latitude", function(latitude, target) {
  var polygon = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon){
    return polygon.visualLatitude;
   }
   return latitude;
})

imageTemplate.adapter.add("longitude", function(longitude, target) {
  var polygon = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon){
    return polygon.visualLongitude;
   }
   return longitude;
});

// Series for United States map
// Series for United States map and dz
var usaSeries = chart.series.push(new am4maps.MapPolygonSeries());
usaSeries.geodata = am4geodata_algeriaLow;
var polygonTemplate = usaSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.fill = am4core.color("#009432");

var usaSeries = chart.series.push(new am4maps.MapPolygonSeries());
usaSeries.geodata = am4geodata_usaLow
var polygonTemplate = usaSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}";
polygonTemplate.fill = am4core.color("#74B266");


// Create image series
var imageSeries_us = chart.series.push(new am4maps.MapImageSeries());

var imageSeriesTemplate_us = imageSeries_us.mapImages.template;
imageSeriesTemplate_us.nonScaling = true

var circle_us = imageSeriesTemplate_us.createChild(am4core.Circle);

circle_us.fillOpacity = 0.7;
circle_us.propertyFields.fill = "color";
circle_us.tooltipText = "{title}: [bold]{value}[/]";



// Set property fields
imageSeriesTemplate_us.propertyFields.latitude = "latitude";
imageSeriesTemplate_us.propertyFields.longitude = "longitude";


// Add data for the three cities
getstateData();

imageSeries_us.dataFields.value = "value";
imageSeries_us.data = [{
  "latitude": 40.718111,
  "longitude": -73.873287,
  "title": "New York",
  "value":parseFloat(confirmed_state[36]),
  "color": "#0984e3",
},{
  "latitude": 44.500000,
  "longitude": -89.500000,
  "title": "Wisconsin",
  "value":parseFloat(confirmed_state[57]),
  "color": "#0984e3",
},{
  "latitude": 39.000000,
  "longitude": -80.500000,
  "title": "West Virginia",
  "value":parseFloat(confirmed_state[56]),
  "color": "#0984e3",
},{
  "latitude": 44.000000,
  "longitude": -72.699997,
  "title": "Vermont",
  "value":parseFloat(confirmed_state[52]),
  "color": "#0984e3",
},{
  "latitude":31.000000,
  "longitude":-100.000000 ,
  "title": "Texas",
  "value":parseFloat(confirmed_state[50]),
  "color": "#0984e3",
},{
  "latitude":44.500000,
  "longitude":-100.000000 ,
  "title": "South Dakota",
  "value":parseFloat(confirmed_state[48]),
  "color": "#0984e3",
},{
  "latitude":41.700001 ,
  "longitude": -71.500000,
  "title": "Rhode Island",
  "value":parseFloat(confirmed_state[46]),
  "color": "#0984e3",
},{
  "latitude":44.000000 ,
  "longitude":-120.500000 ,
  "title": "Oregon",
  "value":parseFloat(confirmed_state[42]),
  "color": "#0984e3",
},{
  "latitude": 44.000000,
  "longitude":-71.500000 ,
  "title": "New Hampshire",
  "value":parseFloat(confirmed_state[33]),
  "color": "#0984e3",
},{
  "latitude":41.500000 ,
  "longitude": -100.000000,
  "title": "Nebraska",
  "value":parseFloat(confirmed_state[31]),
  "color": "#0984e3",
},{
  "latitude":38.500000,
  "longitude": -98.000000,
  "title": "Kansas",
  "value":parseFloat(confirmed_state[19]),
  "color": "#0984e3",
},{
  "latitude":33.000000 ,
  "longitude": -90.000000,
  "title": "Mississippi",
  "value":parseFloat(confirmed_state[28]),
  "color": "#0984e3",
},{
  "latitude":40.000000 ,
  "longitude": -89.000000,
  "title": "Illinois",
  "value":parseFloat(confirmed_state[16]),
  "color": "#0984e3",
},{
  "latitude":39.000000,
  "longitude":-75.500000 ,
  "title": "Delaware",
  "value":parseFloat(confirmed_state[8]),
  "color": "#0984e3",
},{
  "latitude":41.599998 ,
  "longitude": -72.699997,
  "title": "Connecticut,",
  "value":parseFloat(confirmed_state[7]),
  "color": "#0984e3",
},{
  "latitude":34.799999,
  "longitude":-92.199997 ,
  "title": "Arkansas",
  "value":parseFloat(confirmed_state[4]),
  "color": "#0984e3",
},{
  "latitude":40.273502,
  "longitude":-86.126976,
  "title": "Indiana",
  "value":parseFloat(confirmed_state[17]),
  "color": "#0984e3",
},{
  "latitude":38.573936,
  "longitude":-92.603760,
  "title": "Missouri State",
  "value":parseFloat(confirmed_state[29]),
  "color": "#0984e3",
},{
  "latitude":27.994402,
  "longitude":-81.760254,
  "title": "Florida",
  "value":parseFloat(confirmed_state[11]),
  "color": "#0984e3",
},{
  "latitude":33.247875,
  "longitude":-83.441162,
  "title": "Georgia",
  "value":parseFloat(confirmed_state[12]),
  "color": "#0984e3",
},{
  "latitude":39.876019,
  "longitude":-117.224121,
  "title": "Nevada",
  "value":parseFloat(confirmed_state[32]),
  "color": "#0984e3",
},{
  "latitude":33.247875,
  "longitude":-83.441162,
  "title": "Georgia",
  "value":parseFloat(confirmed_state[32]),
  "color": "#0984e3",
},{
  "latitude":19.741755,
  "longitude":-155.844437,
  "title": "Hawaii",
  "value":parseFloat(confirmed_state[14]),
  "color": "#0984e3",
},{
  "latitude":66.160507,
  "longitude":-153.369141,
  "title": "Alaska",
  "value":parseFloat(confirmed_state[1]),
  "color": "#0984e3",
},{
  "latitude":35.860119,
  "longitude":-86.660156,
  "title": "Tennessee",
  "value":parseFloat(confirmed_state[49]),
  "color": "#0984e3",
},{
  "latitude":37.926868,
  "longitude":-78.024902,
  "title": "Virginia",
  "value":parseFloat(confirmed_state[54]),
  "color": "#0984e3",
},{
  "latitude":39.833851,
  "longitude":-74.871826,
  "title": "New Jersey",
  "value":parseFloat(confirmed_state[34]),
  "color": "#0984e3",
},{
  "latitude":37.839333,
  "longitude":-84.270020,
  "title": "Kentucky",
  "value":parseFloat(confirmed_state[20]),
  "color": "#0984e3",
},{
  "latitude":47.650589,
  "longitude":-100.437012,
  "title": "North Dakota",
  "value":parseFloat(confirmed_state[38]),
  "color": "#0984e3",
},{
  "latitude":46.392410,
  "longitude":-94.636230,
  "title": "Minnesota",
  "value":parseFloat(confirmed_state[27]),
  "color": "#0984e3",
},{
  "latitude":46.965260,
  "longitude":-109.533691,
  "title": "Montana",
  "value":parseFloat(confirmed_state[30]),
  "color": "#0984e3",
},{
  "latitude":36.084621,
  "longitude":-96.921387,
  "title": "Oklahoma",
  "value":parseFloat(confirmed_state[41]),
  "color": "#0984e3",
},{
  "latitude":47.751076,
  "longitude":-120.740135,
  "title": "Washington",
  "value":parseFloat(confirmed_state[55]),
  "color": "#0984e3",
},{
  "latitude":39.419220,
  "longitude":-111.950684,
  "title": "Utah",
  "value":parseFloat(confirmed_state[51]),
  "color": "#0984e3",
},{
  "latitude":39.113014,
  "longitude":-105.358887,
  "title": "Colorado",
  "value":parseFloat(confirmed_state[6]),
  "color": "#0984e3",
},{
  "latitude":40.367474,
  "longitude":-82.996216,
  "title": "Ohio",
  "value":parseFloat(confirmed_state[40]),
  "color": "#0984e3",
},{
  "latitude":32.318230,
  "longitude":-86.902298,
  "title": "Alabama",
  "value":parseFloat(confirmed_state[0]),
  "color": "#0984e3",
},{
  "latitude":42.032974,
  "longitude":-93.581543,
  "title": "Iowa",
  "value":parseFloat(confirmed_state[18]),
  "color": "#0984e3",
},{
  "latitude":34.307144,
  "longitude":-106.018066,
  "title": "New Mexico",
  "value":parseFloat(confirmed_state[35]),
  "color": "#0984e3",
},{
  "latitude":33.836082,
  "longitude":-81.163727,
  "title": "South Carolina",
  "value":parseFloat(confirmed_state[47]),
  "color": "#0984e3",
},{
  "latitude":41.203323,
  "longitude":-77.194527,
  "title": "Pennsylvania",
  "value":parseFloat(confirmed_state[44]),
  "color": "#0984e3",
},{
  "latitude":34.048927,
  "longitude":-111.093735,
  "title": "Arizona",
  "value":parseFloat(confirmed_state[3]),
  "color": "#0984e3",
},{
  "latitude":39.045753,
  "longitude":-76.641273,
  "title": "Maryland",
  "value":parseFloat(confirmed_state[24]),
  "color": "#0984e3",
},{
  "latitude":42.407211,
  "longitude":-71.382439,
  "title": "Massachusetts",
  "value":parseFloat(confirmed_state[25]),
  "color": "#0984e3",
},{
  "latitude":36.778259,
  "longitude":-119.417931,
  "title": "California",
  "value":parseFloat(confirmed_state[5]),
  "color": "#0984e3",
},{
  "latitude":44.068203,
  "longitude":-114.742043,
  "title": "Idaho",
  "value":parseFloat(confirmed_state[15]),
  "color": "#0984e3",
},{
  "latitude":43.075970,
  "longitude":-107.290283,
  "title": "Wyoming",
  "value":parseFloat(confirmed_state[58]),
  "color": "#0984e3",
},{
  "latitude":46.392410,
  "longitude":-94.636230,
  "title": "Minnesota",
  "value":parseFloat(confirmed_state[27]),
  "color": "#0984e3",
},{
  "latitude":45.367584,
  "longitude":-68.972168,
  "title": "Maine",
  "value":parseFloat(confirmed_state[22]),
  "color": "#0984e3",
},{
  "latitude":44.182205,
  "longitude":-84.506836,
  "title": "Michigan",
  "value":parseFloat(confirmed_state[26]),
  "color": "#0984e3",
},{
  "latitude":35.782169,
  "longitude":-80.793457,
  "title": "North Carolina",
  "value":parseFloat(confirmed_state[37]),
  "color": "#0984e3",
},{
  "latitude":30.391830,
  "longitude":-92.329102,
  "title": "Louisiana",
  "value":parseFloat(confirmed_state[21]),
  "color": "#0984e3",
},{
  "latitude": 27.975963,
  "longitude": -0.195736,
  "title": "Adrar",
  "value":parseFloat(confirmed_state[59]),
  "color": "#EA2027",
},{
  "latitude": 36.156183,  
  "longitude": 1.323728,
  "title": "Chlef",
  "value":parseFloat(confirmed_state[60]),
  "color": "#EA2027",
},{
  "latitude": 33.899514, 
  "longitude":  2.842542,
  "title": "Laghouat",
  "value":parseFloat(confirmed_state[61]),
  "color": "#EA2027",
},{
  "latitude": 35.913677,  
  "longitude": 7.069556,
  "title": "Oum El Bouaghi",
  "value":parseFloat(confirmed_state[62]),
  "color": "#EA2027",
},{
  "latitude":35.596684, 
  "longitude": 6.141796,
  "title": "Batna",
  "value":parseFloat(confirmed_state[63]),
  "color": "#EA2027",
},{
  "latitude":36.751011,
  "longitude": 4.984229,
  "title": "Béjaïa",
  "value":parseFloat(confirmed_state[64]),
  "color": "#EA2027",
},{
  "latitude":34.884462, 
  "longitude": 5.724932 ,
  "title": "Biskra ",
  "value":parseFloat(confirmed_state[65]),
  "color": "#EA2027",
},{
  "latitude":31.676713, 
  "longitude":-2.018306,
  "title": " Béchar ",
  "value":parseFloat(confirmed_state[66]),
  "color": "#EA2027",
},{
  "latitude": 36.493262, 
  "longitude":2.812035,
  "title": " Blida",
  "value":parseFloat(confirmed_state[67]),
  "color": "#EA2027",
},{
  "latitude":36.354143,
  "longitude":  3.876188,
  "title": "Bouira",
  "value":parseFloat(confirmed_state[68]),
  "color": "#EA2027",
},{
  "latitude":22.059892,
  "longitude":  5.410822,
  "title": "Tamanrasset",
  "value":parseFloat(confirmed_state[69]),
  "color": "#EA2027",
},{
  "latitude":35.379831, 
  "longitude": 8.148143,
  "title": "Tébessa",
  "value":parseFloat(confirmed_state[70]),
  "color": "#EA2027",
},{
  "latitude":34.899008, 
  "longitude": -1.319967,
  "title": "Tlemcen",
  "value":parseFloat(confirmed_state[71]),
  "color": "#EA2027",
},{
  "latitude":35.394966, 
  "longitude":1.337486,
  "title": "Tiaret",
  "value":parseFloat(confirmed_state[72]),
  "color": "#EA2027",
},{
  "latitude":36.702204, 
  "longitude": 4.087533,
  "title": "Tizi Ouzou",
  "value":parseFloat(confirmed_state[73]),
  "color": "#EA2027",
},{
  "latitude":36.770930, 
  "longitude":3.052437,
  "title": "Alger",
  "value":parseFloat(confirmed_state[74]),
  "color": "#EA2027",
},{
  "latitude":34.701106,
  "longitude": 3.245526,
  "title": "Djelfa",
  "value":parseFloat(confirmed_state[75]),
  "color": "#EA2027",
},{
  "latitude":36.824517,
  "longitude": 5.764578,
  "title": "Jijel",
  "value":parseFloat(confirmed_state[76]),
  "color": "#EA2027",
},{
  "latitude":36.205287, 
  "longitude":5.395448,
  "title": "Sétif",
  "value":parseFloat(confirmed_state[77]),
  "color": "#EA2027",
},{
  "latitude":34.843097,
  "longitude": 0.125599,
  "title": "Saïda",
  "value":parseFloat(confirmed_state[78]),
  "color": "#EA2027",
},{
  "latitude":36.889065, 
  "longitude":6.872562,
  "title": "Skikda",
  "value":parseFloat(confirmed_state[79]),
  "color": "#EA2027",
},{
  "latitude":35.228384, 
  "longitude":-0.668129,
  "title": "Sidi Bel Abbès",
  "value":parseFloat(confirmed_state[80]),
  "color": "#EA2027",
},{
  "latitude":36.923002, 
  "longitude":7.736223,
  "title": "Annaba",
  "value":parseFloat(confirmed_state[81]),
  "color": "#EA2027",
},{
  "latitude":36.481983, 
  "longitude":7.427660,
  "title": "Guelma",
  "value":parseFloat(confirmed_state[82]),
  "color": "#EA2027",
},{
  "latitude":36.377115, 
  "longitude":6.648133,
  "title": "Constantine",
  "value":parseFloat(confirmed_state[83]),
  "color": "#EA2027",
},{
  "latitude":36.278131,
  "longitude": 2.746783,
  "title": "Médéa",
  "value":parseFloat(confirmed_state[84]),
  "color": "#EA2027",
},{
  "latitude":35.939231,
  "longitude": 0.086993,
  "title": "Mostaganem",
  "value":parseFloat(confirmed_state[85]),
  "color": "#EA2027",
},{
  "latitude":35.746066,
  "longitude": 4.524206,
  "title": "M'Sila",
  "value":parseFloat(confirmed_state[86]),
  "color": "#EA2027",
},{
  "latitude":35.375179, 
  "longitude":0.158009,
  "title": "Mascara",
  "value":parseFloat(confirmed_state[87]),
  "color": "#EA2027",
},{
  "latitude":32.046183, 
  "longitude":5.009999,
  "title": "Ouargla ",
  "value":parseFloat(confirmed_state[88]),
  "color": "#EA2027",
},{
  "latitude":35.688234,
  "longitude": -0.689693,
  "title": "Oran",
  "value":parseFloat(confirmed_state[89]),
  "color": "#EA2027",
},{
  "latitude":33.529572, 
  "longitude":0.959083,
  "title": "El Bayadh",
  "value":parseFloat(confirmed_state[90]),
  "color": "#EA2027",
},{
  "latitude":26.581631,
  "longitude": 8.179625,
  "title": "Illizi ",
  "value":parseFloat(confirmed_state[91]),
  "color": "#EA2027",
},{
  "latitude":36.079775,
  "longitude": 4.725006,
  "title": "Bordj Bou Arreridj",
  "value":parseFloat(confirmed_state[92]),
  "color": "#EA2027",
},{
  "latitude":36.753061, 
  "longitude":3.493746,
  "title": "Boumerdès",
  "value":parseFloat(confirmed_state[93]),
  "color": "#EA2027",
},{
  "latitude":36.901833, 
  "longitude":8.189952,
  "title": "El Tarf",
  "value":parseFloat(confirmed_state[94]),
  "color": "#EA2027",
},{
  "latitude":27.398774, 
  "longitude":-7.555800,
  "title": "Tindouf",
  "value":parseFloat(confirmed_state[95]),
  "color": "#EA2027",
},{
  "latitude":35.620104, 
  "longitude":1.818920,
  "title": "Tissemsilt",
  "value":parseFloat(confirmed_state[96]),
  "color": "#EA2027",
},{
  "latitude":33.349276,
  "longitude": 6.835018,
  "title": "El Oued ",
  "value":parseFloat(confirmed_state[97]),
  "color": "#EA2027",
},{
  "latitude":35.432770, 
  "longitude":7.156950,
  "title": "Khenchela",
  "value":parseFloat(confirmed_state[98]),
  "color": "#EA2027",
},{
  "latitude":36.289174,
  "longitude": 7.918068,
  "title": "Souk Ahras",
  "value":parseFloat(confirmed_state[99]),
  "color": "#EA2027",
},{
  "latitude":36.593708, 
  "longitude":2.400112,
  "title": "Tipaza",
  "value":parseFloat(confirmed_state[100]),
  "color": "#EA2027",
},{
  "latitude":36.446074, 
  "longitude":6.240779,
  "title": " Mila",
  "value":parseFloat(confirmed_state[101]),
  "color": "#EA2027",
},{
  "latitude":36.244916, 
  "longitude":1.951521,
  "title": "Aïn Defla",
  "value":parseFloat(confirmed_state[102]),
  "color": "#EA2027",
},{
  "latitude":33.305840, 
  "longitude":-0.345974,
  "title": "Naâma",
  "value":parseFloat(confirmed_state[103]),
  "color": "#EA2027",
},{
  "latitude":35.273443, 
  "longitude":-1.113984,
  "title": "Aïn Témouchent",
  "value":parseFloat(confirmed_state[104]),
  "color": "#EA2027",
},{
  "latitude":32.511277, 
  "longitude":3.651151,
  "title": "Ghardaïa ",
  "value":parseFloat(confirmed_state[105]),
  "color": "#EA2027",
},{
  "latitude":35.752678,
  "longitude": 0.554961,
  "title": "Relizane",
  "value":parseFloat(confirmed_state[106]),
  "color": "#EA2027",
}];

imageSeries.heatRules.push({
  "target": circle_us,
  "property": "radius",
  "min": 4,
  "max": 30,
  "dataField": "value"
})

imageSeriesTemplate_us.adapter.add("latitude", function(latitude, target) {
  var polygon_us = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon_us){
    return polygon_us.visualLatitude;
   }
   return latitude;
})

imageSeriesTemplate_us.adapter.add("longitude", function(longitude, target) {
  var polygon_us = polygonSeries.getPolygonById(target.dataItem.dataContext.id);
  if(polygon_us){
    return polygon_us.visualLongitude;
   }
   return longitude;
});



}); // end am4core.ready()


 }
});

    }// end else



   });

/******************get data for each state for the map*******************/
function getstateData(){

$.ajax({
           type:"GET",
           url:"{{url('getalldatastate')}}",
           success:function(result){               
            if(result){

              $.each(result,function(key,value){
                   
                    confirmed_state[key] = value.Confirmed;
                    

                });
              console.log(confirmed_state[59]);
            }
          }
});


}// end getstatedata

/*******************get data for each state for chart pie*********************/

function getdatapie(stateID){

var deaths_s = 0;
var recovered_s = 0;
var confirmed_s = 0;
var quarantine = 0;
if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('getdatastate')}}?state="+stateID,
           success:function(ress){               
            if(ress){

                $.each(ress,function(key,value){
                    //console.log(value.Confirmed);
                    if (value.Confirmed !== null){
                    deaths_s = value.Deaths;
                    recovered_s = value.Recovered;
                    confirmed_s = value.Confirmed;
                    lastupdate = value.updated_at;
                    quarantine = (parseFloat(confirmed_s)) - (parseFloat(deaths_s) + parseFloat(recovered_s));
                    }
                });
$("#chartdiv").empty();             
$("#datalist").empty();
 $("#datalist").append('<li style="color: #00a8ff ;">Confirmed : '+confirmed_s+'</li>');
 $("#datalist").append('<li style="color: #27ae60 ;">Recovered : '+recovered_s+'</li>');
  $("#datalist").append('<li style="color: #EE5A24 ;">Quarantine : '+quarantine+'</li>');
 $("#datalist").append('<li style="color: #d63031 ;">Deaths : '+deaths_s+'</li>');
$("#datalist").append('<li style="color: #555 ;font-size: 12px;padding-top: 17px;">Updated : '+lastupdate+'</li>'); 

am4core.ready(function() {

// Themes begin

am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data


chart.data = [ {
  "country": "Deaths",
  "litres": deaths_s,
  "color": am4core.color("#EA2027")
}, {
  "country": "Recovered",
  "litres": recovered_s,
  "color": am4core.color("#44bd32")
}, {
  "country": "Quarantine",
  "litres": quarantine,
  "color": am4core.color("#0097e6")
}];

// Set inner radius
chart.innerRadius = am4core.percent(50);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template.propertyFields.fill = "color";
pieSeries.slices.template.tooltipText = "";
pieSeries.labels.template.disabled = true;
pieSeries.ticks.template.disabled = true;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.legend = new am4charts.Legend();

}); // end am4core.ready()
           
            }else{
              alert("No Data"); 
            }
           }
        });
    }

}// en get data pie




}); //end
</script>


@endsection