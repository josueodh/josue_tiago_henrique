<?php


function uploadFile($img, $path, $data, $request){
    if($request->hasfile($img)){
        $extesion = $data[$img]->getClientOriginalExtension();
        $slug = str_slug($request->name);
        $nameFile = "{$slug}.{$extesion}";
        \Storage::delete('public/'. $data[$img]);
        $data[$img]->storeAs('public/' . $path ,$nameFile);
        $data[$img] = $path . '/'.$nameFile;
    }else{
        unset($data[$img]);
    }
    return $data;
}
