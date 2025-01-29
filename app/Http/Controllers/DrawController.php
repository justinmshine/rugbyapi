<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrawModel;

class DrawController extends Controller
{
    /**
     * Run the prize draw to select the winners.
     */
    public function rundraw(Request $request) {

        $entrants = DrawModel::get();
        switch ($entrants->count()) {
            case 1:
                $entrant = DrawModel::first();
                $entrant->result = 1;
                $entrant->save();
                break;
            case 2:
                $entrant = DrawModel::inRandomOrder()->limit(1)->get();
                $entrant->result = 1;
                $entrant->save();
                $entrant = DrawModel::where('result', '!=', 1)->get();
                $entrant->result = 2;
                $entrant->save();
                break;
            case $entrants->count() >= 3:
                $winner_ids = [];
                $winners = DrawModel::inRandomOrder()->limit(3)->get();
                $count = 0;
                foreach($winners as $winner) {
                    //$attributes = $winner->getAttributes();
                    array_push($winner_ids, $winner->id);
                    $winner->result = $count +1;
                    $winner->save();
                    $count++;
                }
                break;
            default:
                echo 'Winners not selected correctly';
        }    
        $others = DrawModel::whereNotIn('id', $winner_ids)->update(['result' => null]);   
        $prize = DrawModel::get();
        return view('prizedraw', ['items' => $prize]);
    }
}
