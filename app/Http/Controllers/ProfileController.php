<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use DB;


class ProfileController extends Controller
{
public function profile($id){
  $info = User::where('id', $id)->first();
  if (!$info) {
    abort(404, 'Page Not Found');
  }
  return view('pages.profile')->with('info',$info);
}

public function edit($id){
  $user = User::find($id);
  if(Auth::user()->id !== $user->id){
  return redirect('/posts')->with('error','Unauthorized Access');
}else{
  return view('pages.edit')->with('user',$user);
}

}

public function update(Request $request, $id){
  $this->validate($request,[
'name' => 'required',
]);
if (empty($request->input('dob')) || empty($request->input('mob')) || empty($request->input('yob'))) {
  $birthday = false;
}else{
    $birthday = $request->input('dob') . '.' . $request->input('mob') . '.' . $request->input('yob');
}

if ($request->hasFile('profile_image')) {
$filenameWithExt = $request->file('profile_image')->getClientOriginalName();
$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
$extension = $request->file('profile_image')->getClientOriginalExtension();
$fileNameToStore = $filename.'_'.time().'.'.$extension;
$path = $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);
}
$user= User::find($id);
$user->name = $request->input('name');
if ($request->input('gender')) {
$user->sex = $request->input('gender');
}else{
$user->sex = "";
}
if ($request->input('country')) {
  $user->country = $request->input('country');
}else{
  $user->country = "";
}
if (!$birthday) {
    $user->birthday= $user->birthday;
}else{
  $user->birthday = $birthday;
}

if ($request->hasFile('profile_image')) {

  if ($user->profile_img == 'default.png') {
      $user->profile_img= $fileNameToStore;
  }else{
    Storage::delete('public/profile_images/'.$user->profile_img);
    $user->profile_img= $fileNameToStore;
  }

}
$user->save();
return redirect('/profile/'.$user->id)->with('success','Profile Updated');
}
}
