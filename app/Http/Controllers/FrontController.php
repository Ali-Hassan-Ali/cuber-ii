<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Certificate;
use App\Models\Comment;
use App\Models\Cybersecurity;
use App\Models\Grc;
use App\Models\International;
use App\Models\KSA;
use App\Models\Rating;
use App\Models\Question;
use App\Models\AnswerQuestion;
use Illuminate\Http\Request;

class FrontController extends Controller
{


    public function ratings(Request $request)
    {

        $rating = Rating::create($request->all());

        return response()->json($rating);

    }//end of fun

    public function answer_to(Request $request)
    {
        // return $request->all();

        $data = AnswerQuestion::where('level_id',$request->iid)->first();

        if (!$data) {

            if (!$request->ii) {
                
                foreach ($request->answer_id as $key=>$data) {

                    AnswerQuestion::create([
                        'question_id' => $key,
                        'answer_id'   => $data,
                        'user_id'     => auth()->id(),
                        'level_id'    => $request->iid,
                    ]);
                }
            }
        }

        $level_id    = AnswerQuestion::latest()->first()->level_id;
        $question_id = AnswerQuestion::where('level_id',$level_id)->pluck('question_id')->unique();
        $answers     = AnswerQuestion::where('level_id',$level_id)->pluck('answer_id')->unique();
        $answe_count = Answer::whereIn('id', $answers)->where('answer_question_id',1)->count();

        $data = Question::with('answers')->whereIn('id',$question_id)->get();

        $data_count = Question::with('answers')->whereIn('id',$question_id)->count();

        return view('front.cyberscurity.answer',[
            'items'=>$data,
            'data_count'=>$data_count,
            'answers'=>$answers,
            'answe_count'=>$answe_count,
        ]);

    }//end of answer_to

    public function index()
    {
        return view('front.index');
    }

    public function cyberPages()
    {
        if (!auth()->check()) {
            return redirect()->route('user.login');
        }

        $data = Cybersecurity::get();

        return view('front.cyberscurity.index',['items'=>$data]);
    }

    public function cyberDetails($id)
    {
        $AnswerQuestionCount = AnswerQuestion::where('level_id', $id)
                                             ->where('user_id', auth()->id())
                                             ->get();

        $question  = Question::where('cybersecurity_id','=',$id)->get();
        $questions = Question::where('cybersecurity_id','=',$id)->with('answers')->get();
        $answer    = Answer::all();

        $data     = Cybersecurity::findOrFail($id);
        $comments = Comment::where('cybersecurity_id','=',$id)->get();

        return view('front.cyberscurity.detials', [
             'item'       =>$data,
             'comments'   =>$comments,
             'questions'  =>$question,
             'questionss' =>$questions,
             'answers'    =>$answer,
             'iid'        =>$id,
        ]);
    }

    public function grcPages()
    {
        $data = Grc::get();

         return view('front.grc.index',['items'=>$data]);
    }
    public function certificate()
    {
        $data = Certificate::all();
        return view('front.certificate.index',['items'=>$data]);
    }
    public function international()
    {
        $data = International::all();
        return view('front.international.index',['items'=>$data]);
    }
    public function ksa()
    {
        $data = KSA::all();

        return view('front.ksa.index',['items'=>$data]);
    }

    public function addComment(Request $request)
    {
        $comment = new Comment();
        $comment ->comment = $request->input('comment');
        $comment ->user_id = $request->input('user_id');
        $comment ->grc_id = $request->input('grc_id');
        $comment ->cybersecurity_id = $request->input('cybersecurity_id');
        $comment->save();
        return redirect()->back();
    }

}//end o controller
