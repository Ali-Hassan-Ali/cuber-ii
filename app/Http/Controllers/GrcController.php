<?php

namespace App\Http\Controllers;

use App\Models\Grc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GrcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Grc::all();
        return view('cms.grc.index', ['grcs' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.grc.create');
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
            'image' => 'required|image',
            'video' => 'required',
            // 'status' => 'required|boolean',
            // 'status' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $grc = new Grc();
            $grc->title = $request->input('title');
            $grc->pages = $request->input('pages');

            $grc->description = $request->input('description');
            $grc->video = $request->input('video');

            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = Carbon::now()->format('Y_m_d_h_i') . $grc->name . '.' . $image->getClientOriginalExtension();
                $request->file('image')->move('uploads/cover_img', $imageName);
                $grc->cover_img = $imageName;
            }

            $isSaved = $grc->save();


            return response()->json([
                'message' => $isSaved ? 'Created successfully' : 'Create Failed'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' =>   $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grc  $grc
     * @return \Illuminate\Http\Response
     */
    public function show(Grc $grc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grc  $grc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $grc = Grc::findOrFail($id);
        return view('cms.grc.edit', ['grc' => $grc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grc  $grc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            $grc =  Grc::findOrFail($id);
            $grc->title = $request->input('title');
            $grc->pages = $request->input('pages');

            $grc->description = $request->input('description');
            $grc->video = $request->input('video');

            $isSaved = $grc->save();


            return response()->json([
                'message' => $isSaved ? 'Updated successfully' : 'Update Failed'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' =>   $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grc  $grc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $grc = Grc::findOrFail($id);
        $isDelete = $grc->delete();
        return response()->json([
            'icon'  => $isDelete ? 'success' : 'error',
            'title' => $isDelete ? 'Delete successfully' : 'Delete Failed'
        ], $isDelete ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
