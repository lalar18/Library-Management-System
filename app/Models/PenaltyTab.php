<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenaltyTab extends Model
{
    use HasFactory;

    protected $table = 'penalty_tab';

    protected $primaryKey = 'penalty_id';
    
    protected $fillable = [
        'penalty_name',
        'penalty_charge',
    ];

    // Add this line to disable timestamp columns
    public $timestamps = false;


    public static function getPenalty() {
      // Build the query to select columns from the penalty_tab
     $query = PenaltyTab::select(
         'penalty_id',
         'penalty_name',
         'penalty_charge'  // Corrected the typo here      
     )
        ->orderBy('penalty_name', 'asc');  // Order by penalty_name in ascending order

     // Execute the query and get the data
        $data = $query->get();

     // Return the data
         return $data;
    }


}


