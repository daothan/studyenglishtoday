<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Validator;

class ContactController extends Controller
{
    public function show(){
    	$contact = Contact::orderBy('id','DESC')->get();
    	return view('admin.contact.contact_show', compact('contact'));
    }

    public function view_contact_detail(Request $request){
    	if($request->ajax()){
    		$id = $request->id;
    		$info = Contact::find($id);
    		return response()->json($info);
    	}
    }

    public function post_add_contact(Request $request){
    	$rules =[
            'prior_contact' => 'required'
        ];
        $messages=[
            'prior_contact.required' => "Tittle has adready exists."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_add_contact'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $contact = new Contact;

            /*Request data*/
			$contact->prior        = $request->prior_contact;
			$contact->address      = $request->address_contact;
			$contact->phone        = $request->phone_contact;
			$contact->email        = $request->email_contact;
			$contact->hour_week    = $request->hour_week_contact;
			$contact->hour_weekend = $request->hour_weekend_contact;

            if($contact->save()){
                return response()->json([
                    'add_contact'=>true
                ],200);
            }

        }
    }

    public function get_edit_contact(Request $request){
    	if($request->ajax()){
    		$id = $request->id;
    		$info = Contact::find($id);
    		return response()->json($info);
    	}
    }
    public function post_edit_contact(Request $request){
    	$id = $request->old_id_contact;
    	$rules= [
    		'prior_contact_edit'=>'required'
    	];
    	$messages=[
    		'prior_contact_edit.required' => "Please choose prior."
    	];

    	$validator = Validator::make($request->all(), $rules,$messages);

    	if($validator->fails()){
    		return response()->json([
					'error_edit_contact' =>true,
					'messages'          =>$validator->errors()
    			],200);
    	}else{
    		$contact_edit = Contact::find($id);

			$contact_edit->prior        = $request->prior_contact_edit;
			$contact_edit->address      = $request->address_contact_edit;
			$contact_edit->phone        = $request->phone_contact_edit;
			$contact_edit->email        = $request->email_contact_edit;
			$contact_edit->hour_week    = $request->hour_week_contact_edit;
			$contact_edit->hour_weekend = $request->hour_weekend_contact_edit;

    		if($contact_edit->save()){
    			return response()->json([
    					'edit_contact' =>true
    				],200);
			}
    	}

    }

    public function get_delete_contact(Request $request){
    	if($request->ajax()){
            $id=$request->id;
            $info_contact_delete=Contact::find($id);
            return response()->json($info_contact_delete);
        }
    }
    public function post_delete_contact(Request $request){
    	 if($request->ajax()){
            $id=$request->id;
            $contact_delete=Contact::find($id);

            $contact_delete->delete($id);
        }
    }
}
