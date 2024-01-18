<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FooterSocialDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocial;
use Illuminate\Http\Request;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialDataTable $dataTable)
    {
        return $dataTable->render('root.footer.footer-socials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('root.footer.footer-socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:100'],
            'url' => ['required', 'url'],
            'status' => ['required'],
        ]);

        $footerSocial = new FooterSocial();
        $footerSocial->icon = $request->icon;
        $footerSocial->name = $request->name;
        $footerSocial->url = $request->url;
        $footerSocial->status = $request->status;

        $footerSocial->save();

        toastr('Created Successfully', 'success');

        return redirect()->route('root.footer-socials.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $footerSocial = FooterSocial::findOrFail($id);

        return view('root.footer.footer-socials.edit', compact('footerSocial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:200'],
            'name' => ['required', 'max:100'],
            'url' => ['required', 'url'],
            'status' => ['required'],
        ]);

        $footerSocial = FooterSocial::findOrFail($id);
        $footerSocial->icon = $request->icon;
        $footerSocial->name = $request->name;
        $footerSocial->url = $request->url;
        $footerSocial->status = $request->status;

        $footerSocial->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('root.footer-socials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footerSocial = FooterSocial::findOrFail($id);

        $footerSocial->delete();

        return response([
            'status' => 'success',
            'message' => 'Deleted Successfully!'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $footerSocial = FooterSocial::findOrFail($request->id);

        $footerSocial->status = $request->status == 'true' ? 1 : 0;

        $footerSocial->save();

        return response([
            'message' => 'Status has been updated'
        ]);
    }
}
