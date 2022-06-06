<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course\Category\RefCategory;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->jsonResponse(200, "Sukses mengambil data dari category", RefCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            "name" => "required|min:4",
        ];

        $messages = [
            'name.required'         => 'Nama Kategori wajib diisi',
            'name.min'              => 'Nama Kategori minimal 4 karakter',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->jsonResponse(400, 'Data gagal divalidasi', $validator->errors());
        }

        $category = RefCategory::create($input);

        return $this->jsonResponse(201, 'Kategori baru berhasil ditambah', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->jsonResponse(200, "Sukses mengambil data dari category", RefCategory::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $rules = [
            "name" => "required|min:4",
        ];

        $messages = [
            'name.required'         => 'Nama Kategori wajib diisi',
            'name.min'              => 'Nama Kategori minimal 4 karakter',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return $this->jsonResponse(400, 'Data gagal divalidasi', $validator->errors());
        }

        $category = RefCategory::find($id);

        $category->name = $input["name"];
        $category->save();

        return $this->jsonResponse(200, 'Kategori baru berhasil diupdate', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = RefCategory::find($id);

        $category->delete();

        return $this->jsonResponse(200, 'Kategori berhasil dihapus');
    }
}
