<?php

namespace App\Services;

use App\Models\User;
use App\Models\Family; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AddUpdateUserServices
{
    public function handle($request)
    {
        return DB::transaction(function () use($request){
            $user = $this->addUser($request);
            $parents = $this->addParents($request,$user);
        });
       
    }

    public function addUser($request)
    {
        $image_name = $this->uploadFile($request);
        $array = [
            "id" => $request->id,
            "name" => $request->name,
            "id_card" => $request->id_card,
            "date_of_birth" => $request->date_of_birth,
            "place_of_birth" => $request->place_of_birth,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "proffesion" => $request->proffesion,
            "role" => $request->role,
            "address" => $request->address,
            "password" => bcrypt("defaultPass123"),
            "status_member" => "approve",
            "image_user" => $image_name == false ? null : $image_name,
            "family_code" => 'FC-'.Str::random(10)
        ];

        return User::updateOrCreate(["id" => $request->id],$array);
    }

    public function addParents($request,$user)
    {
        $arrayParents = [
            [
                "id" => $request->father_id,
                "name" => $request->name_father,
                "id_card" => $request->id_card_father,
                "date_of_birth" => $request->date_of_birth_father,
                "place_of_birth" => $request->place_of_birth_father,
                "phone_number" => $request->phone_number_father,
                "address" => $request->address_father,
                "parents_gender" => "male",
                "user_id" => $user->id
            ],
            [
                "id" => $request->mother_id,
                "name" => $request->name_mother,
                "id_card" => $request->id_card_mother,
                "date_of_birth" => $request->date_of_birth_mother,
                "place_of_birth" => $request->place_of_birth_mother,
                "phone_number" => $request->phone_number_mother,
                "address" => $request->address_father,
                "parents_gender" => "female",
                "user_id" => $user->id
            ],

        ];

        return Family::upsert($arrayParents,['id']);
        
    }

    public function uploadFile($request)
    {
        $profil_image = $request->file('user_profil');
        if ($profil_image) {
            $profil_image->move(public_path('upload/user_image'),$profil_image->getClientOriginalName());
            return $profil_image->getClientOriginalName();
        }else{
            return false;
        }
    }
}