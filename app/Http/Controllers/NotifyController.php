<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function create()
    {
        $nofifies = Notify::query()->orderByDesc('created_at')->get();
        $returnData = [
            'notifies' => $nofifies
        ];
        return view('admin-template.page.notify.create', [
            'listNotifies' => $nofifies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Notify::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function update(Request $request, $id)
    {
        $params = $request->all();
        $params['active'] = $request->active == 'on' ? 1 : 0;

        $notify = Notify::find($id);
        $notify->update($params);

        return redirect()->back();
    }


    public function destroy(Request $request, $id)
    {
        $notify = Notify::find($id);
        $notify->delete();

        return response()->json('success');

        return redirect()->route('noti.create');
    }
}
