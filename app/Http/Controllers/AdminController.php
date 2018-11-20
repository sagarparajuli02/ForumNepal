<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Tag;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $totalQuestion = Question::count();
        $totalUser = User::count();
        $totalTags = Tag::count();

        // Danger Zone
        $belowFive = [];
        $dangerZoneQues = Question::top('asc');
        foreach ($dangerZoneQues as $key => $question) {
            if ($question->vote_ttl < -4) {
                array_push($belowFive, $question);
            }
        }

        // dd($belowFive);

        return view('admin.index', ['totalQuestion' => $totalQuestion,
                'totalUser' => $totalUser,
                'totalTags' => $totalTags,
                'belowFive' => $belowFive]);
    }
    public function indexs(){
        $users = DB::select('select * from users');
        return view('admin.view_users',['users'=>$users]);
     }
   
      
     public function insert(Request $request){
        $name = $request->input('stud_name');
        DB::insert('insert into tags (name) values(?)',[$name]);
        echo "Record inserted successfully.<br/>";
        echo '<a href = "/insert">Click Here</a> to go back.';
     }
}
    