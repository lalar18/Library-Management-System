<?php
namespace App\Http\Controllers;

use App\Models\PenaltyTab;
use Illuminate\Http\Request;

class PenaltyController extends Controller
{

    public function index(){
        $data = [];

        // Fetch cached menus (if any)
        $menuDatas = $this->getCachedMenus();
        
        // Merge menu data into the $data array if it exists
        if ($menuDatas) {
            $data = array_merge($data, $menuDatas);
        }
        
        $penaltyData = PenaltyTab::getPenalty();
        
        $data['penaltyData'] = $penaltyData;
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);
        return view('penalty.index', compact('data'));
    }

    public function update(Request $request)
    {
          // Find the penalty record by ID
         $penalty = PenaltyTab::find($request->penalty_id);

        
         // Check if the penalty exists
         if ($penalty) {
             // Update the penalty details
             $penalty->penalty_name = $request->penalty_name;
             $penalty->penalty_charge = $request->penalty_charge;

           
             // Save the updated record to the database
             $penalty->save();

             // Redirect back with a success message
             return redirect('/admin/manage-penalty')->with('success', 'Penalty updated successfully');
         } else {
             // Optional: Redirect back with an error message if the penalty is not found
             return redirect('/admin/manage-penalty')->with('error', 'Penalty not found');
         }

    }


    public function add(Request $request)  { 
                           
            try {                         
                // Insert data into penalty_tab         
                PenaltyTab::create($request->only(['penalty_name', 'penalty_charge']));

                // Redirect to index page with success message                 
                return redirect()->route('penalty.index')->with('success', 'Penalty has been added successfully.');            
        
            } catch (\Exception $e) {
                // Log the exception or handle it accordingly
                return redirect()->back()->with('error', 'Failed to add penalty: ' . $e->getMessage());
        }
    }

    public function create(){
        $data = [];
    
        // Fetch cached menus (if any)
        $menuDatas = $this->getCachedMenus();
        
        // Merge menu data into the $data array if it exists
        if ($menuDatas) {
            $data = array_merge($data, $menuDatas);
        }
        
        // Pass the $data array to the view
        return view('penalty.add', compact('data'));      
    }


}