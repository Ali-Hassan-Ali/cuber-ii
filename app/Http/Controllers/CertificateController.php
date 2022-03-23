<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Certificate::all();
        // dd($data);
        return response()->view('cms.certificate.index',[
            'certificates'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms\certificate\create');

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
            $certificate = new Certificate();
            $certificate->title = $request->input('title');

            $certificate->description = $request->input('description');
            $certificate->link = $request->input('link');

            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = Carbon::now()->format('Y_m_d_h_i') . $certificate->name . '.' . $image->getClientOriginalExtension();
                $request->file('image')->move('uploads/certificates', $imageName);
                $certificate->image= $imageName;
            }
            $isSaved = $certificate->save();


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
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
        return view('cms.certificate.edit',['certificate' => $certificate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
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

            $certificate->title = $request->input('title');

            $certificate->description = $request->input('description');
            $certificate->link = $request->input('link');

            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = Carbon::now()->format('Y_m_d_h_i') . $certificate->name . '.' . $image->getClientOriginalExtension();
                $request->file('image')->move('uploads/certificates', $imageName);
                $certificate->image= $imageName;
            }
            $isSaved = $certificate->save();


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
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {

        $isDelete = $certificate->delete();
        return response()->json([
            'icon'  => $isDelete ? 'success' : 'error',
            'title' => $isDelete ? 'Delete successfully' : 'Delete Failed'
        ], $isDelete ? Response::HTTP_OK :Response::HTTP_BAD_REQUEST );
    }
}
