<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Rules\JapaneseZip;


class ContactController extends Controller
{
    public function indexview(Request $request){
        return view('contact.index');
    }
    public function check(Request $request){
        $this->validate($request,Contact::$rules);
        $request->validate([
            'postcode'=>['required',new JapaneseZip()],
        ]);
        $form=$request->all();

        return view('contact.check',['form'=>$form]);
    }
    public function create(Request $request){
        if ($request->get('back')) {
            return redirect('/')->withInput();
        }
        $form=new Contact;
        $form->fullname=$request->last_name.$request->first_name;
        $form->gender=$request->gender;
        $form->email=$request->email;
        $form->postcode=$request->postcode;
        $form->address=$request->address;
        $form->building_name=$request->building_name;
        $form->opinion=$request->opinion;
        $form->save();
        return redirect('/thanks');
    }
    public function thanksview(){
        return view('contact.thanks');
    }
    public function searchview(Request $request){
        $keywords=[
            'fullname'=>'',
            'email'=>'',
            'created_from'=>'',
            'created_to'=>'',
        ];
        return view('contact.search',$keywords);
    }
    public function search(Request $request){
            $items=Contact::where('fullname','LIKE',"%{$request->input_name}%")->where('email','LIKE',"%{$request->input_email}%")->where('gender','LIKE',"%{$request->input_gender}%")->where('created_at','>',date($request->input_created_from))->whereOr('created_at','<',date($request->input_created_to))->Paginate(3);
        $param=[
            'fullname'=>$request->input_name,
            'email'=>$request->input_email,
            'gender'=>$request->input_gender,
            'items'=>$items,
            'created_from'=>$request->input_created_from,
            'created_to'=>$request->input_created_to,
        ];
        return view('contact.search',$param);
    }
    public function delete(Request $request){
        $item=Contact::find($request->id)->delete();
        return redirect('/search/result');
    }
}