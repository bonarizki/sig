<?php

namespace App\Services;

use App\Models\Event;

class AddUpdateEventService
{
    public function handle($request)
    {
        $request->merge([
            'event_image' => $this->uploadFile($request),
            
        ]);
        return Event::UpdateOrCreate(["id" => $request->id],$request->except(['image','filepond']));
    }

    public function uploadFile($request)
    {
        $content_photo = $request->file('image');
        if ($content_photo) {
            $content_photo->move(public_path('upload/event'),$content_photo->getClientOriginalName());
            return $content_photo->getClientOriginalName();
        }else{
            return 'default.png';
        }
    }
}