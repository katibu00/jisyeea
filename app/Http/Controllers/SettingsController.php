<?php

namespace App\Http\Controllers;

use App\Models\PopUpNotification;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function popup()
    {
        $popUp = PopUpNotification::first();
        return view('admin.settings.popup', compact('popUp'));
    }


    public function savePopup(Request $request)
    {
        $request->validate([
            'notificationSwitch' => 'nullable|in:on,off',
            'notificationBody' => 'required_if:notificationSwitch,on',
        ]);
    
        $popUp = PopUpNotification::first();
        if (!$popUp) {
            $popUp = new PopUpNotification();
        }
    
        // Set the value of switch as "off" if it is not sent in the request
        $popUp->switch = $request->has('notificationSwitch') ? $request->input('notificationSwitch') : 'off';
        $popUp->body = $request->input('notificationBody');
        $popUp->save();
    
        return redirect()->back()->with('success', 'Pop up notification settings updated successfully.');
    }

}
