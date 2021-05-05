<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\User;
use App\Repositories\Profile\ProfileRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('page')){
            return response()->json([
                'data' => User::with('profile','wallet','profile.media')->paginate(12)->map(function($item){
                    $item->profile->media->source = convertStorage(Media::find($item->profile->media->id)->source);
                    return $item;
                })
            ],200);
        }
        return view('backend.user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show',compact('user'));
    }

    public function update(Request $request, $id,ProfileRepository $profileRepository): \Illuminate\Http\JsonResponse
    {

        return response()->json([
            'message' => 'Cập nhật thất bại'
        ],400);
        $type = $request->query('type');

        $user = User::find($id);

        switch($type){
            case 'general':

                $userRequest = $request->get('user');

                $profile = $user->profile;

                try {
                    $data = [];
                    $data['fullname'] = $userRequest['fullname'];
                    $data['address'] = $userRequest['address'];

                    $profile = $profileRepository->update($data,$profile->id);

                } catch (\Exception $exception){
                    return response()->json([
                        'message' => 'Cập nhật thất bại'
                    ],400);
                }

                return response()->json([
                    'message' => 'Cập nhật thành công',
                    'data' => $profile
                ],200);

        }
    }

}
