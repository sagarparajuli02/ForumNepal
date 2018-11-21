<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use ConsoleTVs\Profanity\Facades\Profanity;

use App\Answer;

class AnswerController extends Controller
{

    /**
     * Insert an answer
     * POST /answers
     * @return Response
     */
    public function insert() {
        Answer::insert(Profanity::blocker(Request::get('answer'))->filter(),Request::get('question_id'),Auth::user()->id);
        Session::flash('flash_message','<p>Thanks for answering the question!</p>');
        return Redirect::to('question/'.Request::get('question_id').'/'.Request::get('question_url'));

    }

    /**
     * Update the answer from jquery
     * @return Response
     */
    public function update() {
        $answer = Answer::update_answer(Request::get('pk'),Profanity::blocker(Request::get('value'))->filter());
        if($answer)
            return Response::json(array('status'=>1));
        else
            return Response::json(array('status'=>0));
    }

}
