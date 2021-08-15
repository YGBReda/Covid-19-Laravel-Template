<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
    public function index()
        {
             $all_s = State::all();

           return view('admin.stateindex',['all_s' => $all_s]);
        }

        // affiche le formulaire de creation
	    public function create() {
	            
           
	            return view('admin.statecreate');
	    	
	    } 



	       // enregistrer
        public function store(Request $request) {


    
         $store_s = new State();
        
         $store_s->Country = $request->input('Country');
         $store_s->name = $request->input('state');
         $store_s->Confirmed = $request->input('Confirmed');
         $store_s->Deaths = $request->input('Deaths');
          $store_s->Recovered = $request->input('Recovered');
 

         $store_s-> save();

         
         return redirect('state')->with('status','élément ajouté, Merci !');

        }

        // recupérer les données 
        public function edit($id) {
 
         $state = State::find($id);
         return view('admin.stateedit',['statedata' => $state]);

    }


        public function update(Request $request, $id) {


    
          $store_s = State::find($id);
        
         $store_s->Country = $request->input('Country');
         $store_s->name = $request->input('state');
         $store_s->Confirmed = $request->input('Confirmed');
         $store_s->Deaths = $request->input('Deaths');
         $store_s->Recovered = $request->input('Recovered');
      

         $store_s-> save();

         
         return redirect('state')->with('status','Modifications appliquées, Merci !');
        }

        public function getDataallState(){
            $alldatastate = State::all();

            return response()->json($alldatastate);
        }

        public function getDataState(Request $request){
            $data = State::select()->where("name",$request->state)->get();

                return response()->json($data);
        }
    
    // supprimer
        public function destroy($id) {

            $s_delete = State::find($id);
            $s_delete->delete();
            return redirect('state');
        
    }
        
}
