<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{

    public function store(Request $request){
        // Store new quests
        // 1. validate the request data
        // 2. save the quest in quests table
        // 3. redirect back with success message or error message
        try{

            $request->validate([
                'quest_name' => 'required|min:3',
                'quest_description' => 'required|min:3'
            ]);

    
        $saved =    Quest::create([
                'user_id' => Auth::id(),
                'title' => $request->quest_name,
                'description' => $request->quest_description,
                'status' => 'pending',
                'start_date_time' => $request->quest_start_date ?? null,
                'end_date_time' => $request->quest_end_date ?? null,
            ]);
            $this->applyExp( Auth::user(), 50);
            if(! $saved ){
                return redirect()->back()->with('error', 'something went wrong while saving your quest' );
            }
    
            return redirect()->back()->with('success', 'Quest Saved Successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'something went wrong' . $e);
        }
    }

    public function show(){
        // show all quests for specific user
        $quests = Quest::where('user_id', Auth::id())->get();
        
        return view('quest.view', compact('quests'));
    }

    public function update(Request $request){
        // update existing quest
        // 1. validate the request data
        // 2. update the quest in quests table
        // 3. redirect back with success message or error message
        try{
            $request->validate([
                'quest_id' => 'required|exists:quests,id',
                'quest_title' => 'required|min:3',
                'quest_description' => 'required|min:3'
            ]);

            $quest = Quest::find($request->quest_id);

            if(! $quest){
                return redirect()->back()->with('error', 'Quest not found');
            }

            $quest->title = $request->quest_title;
            $quest->description = $request->quest_description;
            $quest->start_date_time = $request->quest_start_date ?? null;
            $quest->end_date_time = $request->quest_end_date ?? null;
            $updated = $quest->save();

            if(! $updated){
                return redirect()->back()->with('error', 'something went wrong while updating your quest' );
            }
            return redirect()->back()->with('success', 'Quest Updated Successfully');

        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'something went wrong' . $e);
        }
    }

    public function mark($id){
        //mark quest as complete
        try{
            $quest = Quest::find($id);

            if(! $quest){
                return redirect()->back()->with('error', 'Quest not found');
            }

            $quest->status = 'completed';
            // $quest->xp = 100; // set xp for completed quest
            $this->applyExp(Auth::user(), 200);
            $updated = $quest->save();

            if(! $updated){
                return redirect()->back()->with('error', 'something went wrong while marking your quest as complete' );
            }
            return redirect()->back()->with('success', 'Quest marked as complete Successfully');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'something went wrong' . $e);
        }
    }

    public function destroy(Request $request){
        // delete quest
        // 1. find the quest by id 
        // 2. mark the qeust as delete but dont remove from database
        // 3. redirect back with success or error message

        try{
            $quest = Quest::find($request->quest_id);
            if(! $quest){
                return redirect()->back()->with('error', 'Quest not found');
            }

            $quest->is_delete = 1;
            $quest->status = 'deleted';
            $saved = $quest->save();

            if(! $saved){
                return redirect()->back()->with('error', 'something went wrong while deleting quest');
            }


        }
        catch(\Exception $e){
            return redirect()->back()->with('error'. 'something went wrong'. $e);
        }
    }
    public function applyExp(User $user, int $expGained){
        
        $user->xp += $expGained;
        
        while($user->xp >= ($user->level * 1000)){
            $user->xp -= ($user->level * 1000);
            $user->level ++;
        }

        $user->save();

    }
}
