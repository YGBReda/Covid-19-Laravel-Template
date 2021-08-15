<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tot;


class TotController extends Controller
{
     public function index()
        {
             $all_n = Tot::all();

           return view('admin.totalindex',['all_n' => $all_n]);
        }

        // affiche le formulaire de creation
	    public function create() {
	            
           
	            return view('admin.totalcreate');
	    	
	    } 



	       // enregistrer
        public function store(Request $request) {


    
         $store_n = new Tot();
        
         
         $store_n->Confirmed = $request->input('Confirmed');
         $store_n->Deaths = $request->input('Deaths');
          $store_n->Recovered = $request->input('Recovered');
 

         $store_n-> save();

         
         return redirect('total')->with('status','élément ajouté, Merci !');

        }

        // recupérer les données 
        public function edit($id) {
 
         $totaldata = Tot::find($id);
         return view('admin.totaledit',['totaldata' => $totaldata]);

    }


        public function update(Request $request, $id) {


    
          $store_n = Tot::find($id);
        
         
         $store_n->Confirmed = $request->input('Confirmed');
         $store_n->Deaths = $request->input('Deaths');
         $store_n->Recovered = $request->input('Recovered');
      

         $store_n-> save();

        
         
         return redirect('total')->with('status','Modifications appliquées, Merci !');

        }

}
