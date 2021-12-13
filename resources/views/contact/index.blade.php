@extends('layouts.default')
<style>
  table{
    table-layout:fixed;
  }
  span{
    color:red;
  }
  .form {
    display:flex;
    justify-content:center;
  }
  .form th{
    display:flex;
    padding-bottom:20px;
    padding-right:20px;
  }
  .form_name {
    display:flex;
  }
  .form_name_last{
    margin-right:20px;
    width:50%;
  }
  .form_name_last input{
    width:100%;
  }
  .form_name_first{
    width:50%;
  }
  .form_name_first input{
    width:100%;
  }
  .form_email{
    width:100%;
  }
  .form_email input{
    width:100%;
  }
  .form_postcode {
    width:100%;
    display:flex;
  }
  .form_postcode_section{
    width:90%;
    display:flex;
    flex-direction:column;
  }
  .form_postcode label{
    display:block;
    width:10%;
    margin:0;
    text-align:center;
  }
  .form_postcode input{
    width:100%;
  }
  .form_address{
    width:100%;
  }
  .form_address input{
    width:100%;
  }
  .form_buildingName{
    width:100%;
  }
  .form_buildingName input{
    width:100%;
  }
  .form_button {
    display:flex;
    justify-content:center;
  }
  .form_button button:hover{
    cursor:pointer;
  }
  .form_button button{
    background-color:black;
    color:white;
    border:none;
    padding:10px 50px;
    border-radius:5px;
  }
  .form p{
    margin:5px;
    color:gray;
    font-size:10px;
    display:flex;
  }
  .form td {
    padding-bottom:20px;
    padding-right:20px;
    width:200px;
  }
  textarea {
    height:100px;
  }
  .error-message {
    background-color:pink;
  }
</style>

@section('title','お問い合わせ')
@section('body')
<div class="form">
  <form action="/check" method="post">
  @csrf
  <table>
  <tr>
    <th>
      お名前<span>※</span>
    </th>
    <td>
      <div class="form_name">
        <div class="form_name_last">
          <input type="text" name="last_name" value="{{ old('last_name') }}">
          <p>　例）山田</p>
          @if($errors->has('last_name'))
          <p class="error-message">{{$errors->first('last_name')}}</p>
        @endif
        </div>
        <div class="form_name_first">
          <input type="text" name="first_name" value="{{ old('first_name') }}">
          <p>　例）太郎</p>
          @if($errors->has('first_name'))
          <p class="error-message">{{$errors->first('first_name')}}</p>
          @endif
        </div>
      </div>
    </td>
  </tr>
  <tr>
    <th>
      性別<span>※</span>
    </th>
    <td>
      <div class="form_gender">
      <input type="radio" name="gender" id="gender" value="1" {{ old ('gender') == '1' ? 'checked' : '' }} checked>男性
      <input type="radio" name="gender" id="gender" value="2" {{ old ('gender') == '2' ? 'checked' : '' }}>女性
      </div>
    </td>
  <tr>
    <th>
      メールアドレス<span>※</span>
    </th>
    <td>
      <div class="form_email">
        <input type="email" name="email" value="{{ old('email') }}">
        <p>　例）test@example.com</p>
        @if($errors->has('email'))
        <p class="error-message">{{$errors->first('email')}}</p>
        @endif
      </div>
    </td>
  </tr>
    <tr>
    <th>
      郵便番号<span>※</span>
    </th>
    <td>
      <div class="form_postcode">
        <label for="postcode">〒</label>
        <div class="form_postcode_section">
          <input type="text" name="postcode" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{ old('postcode') }}" oninput="value = value.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/[ー−]/g,'-').replace(/[^\-\d]/g,'');">
          <p>　例）123-4567</p>
        </div>
      </div>
      @if($errors->has('postcode'))
        <p class="error-message">{{$errors->first('postcode')}}</p>
      @endif
    </td>
  </tr>
  <tr>
    <th>
      住所<span>※</span>
    </th>
    <td>
      <div class="form_address">
      <input type="text" name="address"  size="60" value="{{ old('address') }}" oninput="value = value.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248));">
      <p>　例）東京都渋谷区千駄ヶ谷1-2-3</p>
      @if($errors->has('address'))
        <p class="error-message">{{$errors->first('address')}}</p>
      @endif
      </div>
    </td>
  </tr>
  <tr>
    <th>
      建物名
    </th>
    <td>
      <div class="form_buildingName">
      <input type="text" name="building_name" value="{{ old('building_name') }}">
      <p>　例）千駄ヶ谷マンション101</p>
      </div>
    </td>
  </tr>
  <tr>
    <th>
      ご意見<span>※</span>
    </th>
    <td>
      <textarea name="opinion" cols="80" row="4">{{ old('opinion') }}</textarea>
      @if($errors->has('opinion'))
        <p class="error-message">{{$errors->first('opinion')}}</p>
      @endif
    </td>
  </tr>
</table>
</div>
<div class="form_button">
<button>確認</button>
</div>
</form>
@endsection