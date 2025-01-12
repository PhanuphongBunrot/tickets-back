<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDataTicketsController extends Controller
{
     public function get_tickets()
     {

          $query = DB::table('tickets')
               ->orderBy('id', 'desc')
               ->get()

               ->toArray();


          $query = json_encode($query);

          return $query;
     }

     public function store(Request $request)
     {
          $request->validate([
               'title' => 'required|string|max:255',
               'description' => 'required|string',
               'email' => 'required|email',
               'priority' => 'required|string',
               'organization' => 'required|string',
               'vessel' => 'required|string',
               'service_line' => 'required|string',
          ]);


          DB::table('tickets')->insert([
               'title' => $request->input('title'),
               'description' => $request->input('description'),
               'email' => $request->input('email'),
               'priority' => $request->input('priority'),
               'organization' => $request->input('organization'),
               'vessel' => $request->input('vessel'),
               'service_line' => $request->input('service_line'),
               'created_at' => now(),
               'updated_at' => now(),
          ]);

          return response()->json([
               'message' => 'Ticket added successfully',
               'status' => true
          ]);
     }

     public function edit(Request $request)
     {

          $id = $request->query('id');


          $ticket = DB::table('tickets')
               ->where('id', $id)
               ->first();


          if ($ticket) {
               return response()->json($ticket);
          } else {
               return response()->json(['error' => 'Ticket not found'], 404);
          }
     }

     public function update(Request $request)


     {

          $request->validate([
               'title' => 'required|string|max:255',
               'description' => 'required|string',
               'email' => 'required|email',
               'priority' => 'required|string',
               'organization' => 'required|string',
               'vessel' => 'required|string',
               'service_line' => 'required|string',
          ]);
          
          DB::table('tickets')
          ->where('id', $request->input('id'))
          ->update([
               'title' => $request->input('title'),
               'description' => $request->input('description'),
               'email' => $request->input('email'),
               'priority' => $request->input('priority'),
               'organization' => $request->input('organization'),
               'vessel' => $request->input('vessel'),
               'service_line' => $request->input('service_line'),
               'updated_at' => now(),
          ]);
          
          return response()->json([
               'message' => 'Ticket added successfully',
               'status' => true
          ]);
     }


     public function destroy($id)
{
        
        $ticket = DB::table('tickets')->where('id', $id)->first();

        if (!$ticket) {
            return response()->json(['message' => 'Ticket not found'], 404);
        }
    
   
        DB::table('tickets')->where('id', $id)->delete();
    
        return response()->json(['message' => 'Ticket deleted successfully'], 200);
}

}
