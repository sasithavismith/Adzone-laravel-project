<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\States;
class UsersController extends Controller
{
    public function index(){
        return view('users.user');
    }
     public function fetch(Request $request){
       if($request-> get('indianstates')){
           $query = $request->get('indianstates');
           $data = DB:: table('states')
           ->where('stateName','like', '%'.$query.'%')
           ->get();
           
           $output ='<ul style="display:block !important;" class= "dropdown-menu">';
           if($data->count()>0){
               foreach($data as $row){
                   $output .= '<li class= "searchState" id="search" name="searchState" value='.$row->id.'>'.$row->stateName.'</li>';
               }
               $output.='</ul>';
               echo $output;
           }
           else{
               $output .='<li>Record Not found</li>';
               echo $output;
           }
       }
     }
}
