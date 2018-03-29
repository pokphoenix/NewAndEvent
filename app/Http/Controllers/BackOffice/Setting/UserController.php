<?php

namespace DurianSoftware\Http\Controllers\BackOffice\Setting;

use Illuminate\Http\Request;
use DurianSoftware\Http\Controllers\Controller;
use DurianSoftware\User;
use DurianSoftware\Models\Day;
use DurianSoftware\Models\Month;
use DurianSoftware\Models\Year;
use DurianSoftware\Http\Requests\BackOffice\User\UserRequest;

class UserController extends Controller
{
    public $perPage = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // search จาก field ไหนก็ได้ ทำเป็นแบบ OR ให้มี %search_term% ก็เจอ

        if ($request->has('search')) {
            $data_search = $request->search;

            $data['users'] = User::where('member_number', 'LIKE', "%{$data_search}%")
                ->orWhere('first_name', 'LIKE', "%{$data_search}%")
                ->orWhere('last_name', 'LIKE', "%{$data_search}%")
                ->orWhere('nick_name', 'LIKE', "%{$data_search}%")
                ->orWhere('email', 'LIKE', "%{$data_search}%")
                ->orWhere('google_id', 'LIKE', "%{$data_search}%")
                ->orWhere('facebook_id', 'LIKE', "%{$data_search}%")
                ->orWhere('twitter_id', 'LIKE', "%{$data_search}%")
                ->paginate($this->perPage);
        } else {
            $data['users'] = User::withTrashed()->paginate($this->perPage);
        }
        return view('backOffice.setting.user.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['day'] = Day::get();
        $data['month'] = Month::get();
        $data['year'] = Year::orderBy('year', 'desc')->get();

        return view('backOffice.setting.user.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $fileUploaded = $this->uploadFile($request->file('image'));

        if ($fileUploaded === '') {
            return redirect('back-office/setting/user/create')->with('error', 'Upload failure');
        } else {
            User::create(array_merge($request->except('_token'), ['image' => $fileUploaded]));
            return redirect('back-office/setting/user/create')->with('success', 'Create success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('backOffice.setting.user.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $data['day'] = Day::get();
        $data['month'] = Month::get();
        $data['year'] = Year::orderBy('year', 'desc')->get();
        return view('backOffice.setting.user.update')->with([
            'user' => $user,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if (!$request->has('image')) {
            User::where('id', $id)->update($request->except(['_token', '_method', '_image']));
            return redirect('back-office/setting/user/' . $id . '/edit')->with('success', 'Update success');
        } else {
            $fileUploaded = $this->uploadFile($request->file('image'));
            if ($fileUploaded === '') {
                return redirect('back-office/setting/user/' . $id . '/edit')->with('error', 'Upload failure');
            } else {
                User::where('id', $id)->update(
                    array_merge($request->except(['_token', '_method', '_image']), ['image' => $fileUploaded])
                );
                return redirect('back-office/setting/user/' . $id . '/edit')->with('success', 'Update success');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);
        if ($user->trashed()) {
            $user->forceDelete();
            return redirect()->route('backOffice.setting.user.index')->with('success', 'Force Delete success');
        }
        $user->delete();
        return redirect()->route('backOffice.setting.user.index')->with('success', 'Delete success');
    }
    
    /**
        * Restore the specified resource back to storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->route('backOffice.setting.user.index')->with('success', 'Restore success');
    }

    /*
        Upload file
    */
    public function uploadFile($file = null, $path = 'users')
    {
        if (!isset($file)) {
            return false;
        }

        $destinationPath = storage_path('images/') . $path . '/';
        
        $image =  md5(time()) . '.' . $file->getClientOriginalExtension();

        if ($file->move($destinationPath, $image)) {
            return $path . '/' . $image;
        } else {
            return '';
        }
    }
}
