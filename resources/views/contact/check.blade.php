@extends('layouts.default')
<style>
  span{
    color:red;
  }
  .form {
    display:flex;
    justify-content:center;
  }
  .form th{
    display:flex;
    font-size:15px;
  }
  .form_button {
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
  }
  .form p{
    font-size:15px;
    display:flex;
  }
  th,td {
    padding-bottom:20px;
    padding-right:30px;
  }
  td {
    width:600px;
  }
  textarea {
    height:100px;
  }
  .error-message {
    background-color:pink;
  }
  button:first-child {
    background-color:black;
    color:white;
    padding:5px 50px;
    border-radius:10px;
    border:none;
  }
  button:last-child {
    border:none;
    background-color:white;
    text-decoration:underline;
    padding-top:10px;
  }
  button:hover{
    cursor:pointer;
  }
</style>

@section('title','内容確認')
@section('body')
<div class="form">
<table>
  <form action="/create" method="post">
  @csrf
  <tr>
    <th>
      お名前
    </th>
    <td>
      <div class="form_name">
      <p>{{$form['last_name'].$form['first_name']}}</p>
      <input type="hidden" name="last_name" value="{{$form['last_name']}}">
      <input type="hidden" name="first_name" value="{{$form['first_name']}}">
      </div>
    </td>
  </tr>
  <tr>
    <th>
      性別
    </th>
    <td>
      <div class="form_gender">
        <input type="hidden" name="gender" value="{{$form['gender']}}">
        @if($form['gender'] ==="1")
        <p>男性</p>
        @else
        <p>女性</p>
        @endif
    </td>
  <tr>
    <th>
      メールアドレス
    </th>
    <td>
      <div class="form_email">
      <p>{{$form['email']}}</p>
      <input type="hidden" name="email" value="{{$form['email']}}">
      </div>
    </td>
  </tr>
    <tr>
    <th>
      郵便番号
    </th>
    <td>
      <div class="form_postcode">
      <p>{{$form['postcode']}}</p>
      <input type="hidden" name="postcode" value="{{$form['postcode']}}">
      </div>
    </td>
  </tr>
  <tr>
    <th>
      住所
    </th>
    <td>
      <div class="form_address">
      <p>{{$form['address']}}</p>
      <input type="hidden" name="address" value="{{$form['address']}}">
      </div>
    </td>
  </tr>
  <tr>
    <th>
      建物名
    </th>
    <td>
      <div class="form_buildingName">
      <p>{{$form['building_name']}}</p>
      <input type="hidden" name="building_name" value="{{$form['building_name']}}">
      </div>
    </td>
  </tr>
  <tr>
    <th>
      ご意見
    </th>
    <td>
        <p>{{$form['opinion']}}</p>
        <input type="hidden" name="opinion" value="{{$form['opinion']}}">
    </td>
  </tr>
</table>
</div>
<div class="form_button">
  <button name="regist" type="submit" value="true">送信</button>
  <button name="back" type="submit" value="true">修正する</button>
</div>
</form>
@endsection