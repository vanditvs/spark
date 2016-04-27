<?php

class UsersController extends BaseController{

    public function profileSettings()
    {
        $user = Auth::user();
        $data = array('user' => $user);
        return View::make('user.profile-settings')->with($data);
    }

    public function profileSettingsSubmit()
    {
        $user = Auth::user();

        //Fetch User Input
        $input = Input::only("name", 'email', "username", "profile-image", "password", "password_confirmation");

        //Validation Rules
        $rules = array(
            'name' => 'required|string|max:30',
            'email' => "required|string|unique:users,email,{$user->id}",
            'username' => "required|string|max:20|unique:users,username,{$user->id}",
            'profile-image' => 'image|max:1000',
            'password' => 'confirmed|min:6'
            );

        $messages = array(
            'profile-image.max' => 'Image must be less than 1MB.'
            );

        //Validate user input with rules
        $validator = Validator::make($input, $rules, $messages);

        //Check if validation failed
        if($validator->fails()){
            //Redirect to profile settings page with errors and user input
            return Redirect::route('profile-settings')->withErrors($validator)->withInput($input);
        }

        $imageName = $user->picture;

        if(Input::hasFile('profile-image')){
            $path = public_path('uploads/users');

            $profile_image = Input::file('profile-image');
            $extension = $profile_image->getClientOriginalExtension();

            $imageName = time().str_random().'.'.$extension;
            $profile_image->move($path, $imageName);

            $oldImage = $path.'/'.$user->profile_image;

            if(File::exists($oldImage)){
                File::delete($oldImage);
            }
        }

        $data = [
        'name' => $input['name'],
        'email' => $input['email'],
        'username' => $input['username'],
        'picture' => $imageName
        ];

        if(Input::has('password')){
            $data['password'] = Hash::make($input['password']);
        }

        $updateUser = $user->update($data);

        //Check if user updated
        if($updateUser){

            //user updated, redirect to profile-setting-submit page
            return Redirect::route('profile-settings-submit')->with(['message' => 'Profile was updated.']);
        }

        //user not updated, redirect to profile-settings page with error message and user input
        return Redirect::route('profile-settings')->withErrors(array('error_message' => "Something went wrong! Try again!"))->withInput($input);
    }
}