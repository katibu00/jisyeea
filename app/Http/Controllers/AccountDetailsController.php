<?php

namespace App\Http\Controllers;

use App\Models\AccountDetails;
use Illuminate\Http\Request;

class AccountDetailsController extends Controller
{
    public function index()
    {
        return view('user.bank_details');
    }






        public function store(Request $request)
        {
            // Validation rules
            $rules = [
                'account_number' => 'required|numeric',
                'account_name' => 'required|string',
                'bank' => 'required|string',
                // Add more validation rules if needed
            ];
    
            // Custom validation messages
            $messages = [
                'account_number.required' => 'The account number is required.',
                'account_number.numeric' => 'The account number must be numeric.',
                'account_name.required' => 'The account name is required.',
                'bank.required' => 'Please select a bank.',
                // Add more custom messages as needed
            ];
    
            // Validate the request
            $validatedData = $request->validate($rules, $messages);
    
            // Assuming you have a User model and the user is authenticated
            $user = auth()->user();
    
            // Check if the user already has account details
            $accountDetail = $user->accountDetails()->first();
    
            // If the user doesn't have account details, create a new record
            if (!$accountDetail) {
                $accountDetail = new AccountDetails();
            }
    
            // Update the account details
            $accountDetail->account_number = $validatedData['account_number'];
            $accountDetail->account_name = $validatedData['account_name'];
            $accountDetail->bank = $validatedData['bank'];
            // Add more fields as needed
    
            // Save the updated or new account details
            $user->accountDetails()->save($accountDetail);
    
            $message = $user->accountDetails ? 'Account details updated successfully.' : 'Account details saved successfully.';
    
            return redirect()->back()->with('success', $message);
        }
    
    
    
}
