<?php

namespace App\Http\Controllers;

use App\Models\Cybersecurity;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CybersecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Cybersecurity::all();
        return view('cms.cyber.index', ['cybers' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.cyber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [

            'title' => 'required|string|min:3|max:45',
            'description' => 'nullable|string',
            'pages' => 'required|integer',
            'video' => 'required',
            'image' => 'required|image',
            // 'status' => 'required|boolean',
            // 'status' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $cyber = new Cybersecurity();
            $cyber->title = $request->input('title');
            $cyber->pages = $request->input('pages');
            $cyber->video = $request->input('video');
            $cyber->rating = $request->input('rating');

            $cyber->description = $request->input('description');


            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = Carbon::now()->format('Y_m_d_h_i') . $cyber->name . '.' . $image->getClientOriginalExtension();
                $request->file('image')->move('uploads/cover_img', $imageName);
                $cyber->cover_img = $imageName;
            }



            $isSaved =  $cyber->save();


            return response()->json([
                'message' => $isSaved ? 'Created successfully' : 'Create Failed',
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cybersecurity  $cybersecurity
     * @return \Illuminate\Http\Response
     */
    public function show(Cybersecurity $cybersecurity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cybersecurity  $cybersecurity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cybersecurity = Cybersecurity::findOrFail($id);
        return view('cms.cyber.edit', ['cybersecurity' => $cybersecurity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cybersecurity  $cybersecurity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cybersecurity $cyber)
    {
        //
        $validator = Validator($request->all(), [

            'title' => 'required|string|min:3|max:45',
            'description' => 'nullable|string',
            'pages' => 'required|integer',
            'video' => 'required',
            // 'status' => 'required|boolean',
            // 'status' => 'required|boolean',
        ]);
        if (!$validator->fails()) {

            $cyber->title = $request->input('title');
            $cyber->pages = $request->input('pages');

            $cyber->description = $request->input('description');
            $cyber->video = $request->input('video');

            $isSaved = $cyber->save();

            return response()->json([
                'message' => $isSaved ? 'Created successfully' : 'Create Failed',
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cybersecurity  $cybersecurity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cybersecurity = Cybersecurity::findOrFail($id);
        $isDelete = $cybersecurity->delete();
        return response()->json([
            'icon' => $isDelete ? 'success' : 'error',
            'title' => $isDelete ? 'Delete successfully' : 'Delete Failed',
        ], $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
