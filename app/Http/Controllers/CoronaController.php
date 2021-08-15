<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corona;

class CoronaController extends Controller
{
     public function index()
        {
             $all_n = Corona::all();

           return view('admin.index',['all_n' => $all_n]);
        }

        // affiche le formulaire de creation
	    public function create() {
	            
           
	            return view('admin.create');
	    	
	    } 



	       // enregistrer
        public function store(Request $request) {


    
         $store_n = new Corona();
        
         $store_n->Country = $request->input('Country');
         $store_n->Confirmed = $request->input('Confirmed');
         $store_n->Deaths = $request->input('Deaths');
          $store_n->Recovered = $request->input('Recovered');
 

         $store_n-> save();

         
         return redirect('corona')->with('status','élément ajouté, Merci !');

        }

        // recupérer les données 
        public function edit($id) {
 
         $corona = Corona::find($id);
         return view('admin.edit',['coronadata' => $corona]);

    }


        public function update(Request $request, $id) {


    
          $store_n = Corona::find($id);
        
         $store_n->Country = $request->input('Country');
         $store_n->Confirmed = $request->input('Confirmed');
         $store_n->Deaths = $request->input('Deaths');
         $store_n->Recovered = $request->input('Recovered');
      

         $store_n-> save();

        
         
         return redirect('corona')->with('status','Modifications appliquées, Merci !');

        }


        public function getDataCountry(Request $request){
            $data = Corona::select()->where("Country",$request->country)->get();

                return response()->json($data);
        }

         public function getDataBar(){
            $databar = Corona::orderBy('Confirmed', 'desc')->get();

            $testt = array(); 
            $testt = $databar;
            $ss = collect($testt)->sortByDesc('Confirmed');

            return response()->json($ss);
        }

        public function getDataallCountry(){
            $alldata = Corona::all();

            return response()->json($alldata);
        }
    
    // supprimer
        public function destroy($id) {

            $c_delete = Corona::find($id);
            $c_delete->delete();
            return redirect('corona');
        
    }
}
