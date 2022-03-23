<?php

namespace App\Http\Controllers;

use App\Models\International;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InternationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = International::all();
        return response()->view('cms.international.index',[
            'internationals'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.international.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator($request->all(),[

            'title' => 'required|string|min:3|max:45',
            'description' => 'nullable|string',
            'link' => 'string',
            'image' => 'required',
            // 'status' => 'required|boolean',
            // 'status' => 'required|boolean',
        ]);
        if(!$validator->fails()) {
            $international = new International();
            $international->title = $request->input('title');
            $international->link = $request->input('link');

            $international->description = $request->input('description');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Carbon::now()->format('Y_m_d_h_i') . $international->name . '.' . $image->getClientOriginalExtension();
                $request->file('image')->move('uploads/internationals', $imageName);
                $international->image= $imageName;
            }
            $isSaved = $international->save();


            return response()->json([
                'message' => $isSaved ? 'Created successfully' : 'Create Failed'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);

        } else {
            return response()->json([
                'message' =>   $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\International  $international
     * @return \Illuminate\Http\Response
     */
    public function show(International $international)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\International  $international
     * @return \Illuminate\Http\Response
     */
    public function edit(International $international)
    {
        return view('cms.international.edit',['international' => $international]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\International  $international
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, International $international)
    {
        //
        $validator = Validator($request->all(),[

            'title' => 'required|string|min:3|max:45',
            'description' => 'nullable|string',
            'link' => 'string',
            'image' => 'required',
            // 'status' => 'required|boolean',
            // 'status' => 'required|boolean',
        ]);
        if(!$validator->fails()) {

            $international->title = $request->input('title');
            $international->link = $request->input('link');

            $international->description = $request->input('description');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Carbon::now()->format('Y_m_d_h_i') . $international->name . '.' . $image->getClientOriginalExtension();
                $request->file('image')->move('uploads/internationals', $imageName);
                $international->image= $imageName;
            }
            $isSaved = $international->save();


            return response()->json([
                'message' => $isSaved ? 'Created successfully' : 'Create Failed'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);

        } else {
            return response()->json([
                'message' =>   $validator->getMessageBag()->first()
            ],Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\International  $international
     * @return \Illuminate\Http\Response
     */
    public function destroy(International $international)
    {

        $isDelete = $international->delete();
        return response()->json([
            'icon'  => $isDelete ? 'success' : 'error',
            'title' => $isDelete ? 'Delete successfully' : 'Delete Failed'
        ], $isDelete ? Response::HTTP_OK :Response::HTTP_BAD_REQUEST );
    }
}
