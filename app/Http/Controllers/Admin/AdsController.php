<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad;
class AdsController extends Controller
{
    //

    public function deleteAd($id){

        $ad= Ad::find($id);
        $storagePath= $ad->image;
        Storage::delete('public/ad/'.$storagePath);
        $ad->delete();
        if ($ad) {
            return redirect('/admin/ads')->with('deleteAd', 'Ad Successfully Delete!');
        }
    }
}
