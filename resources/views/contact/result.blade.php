@extends('layouts.default')
  <style>
    .SystemForm {
      border:solid 2px black;
    }
    th {
      text-align:left;
      padding-left:30px;
      padding-top:20px;
    }
    td {
      padding-left:30px;
      padding-top:20px;
    }
    .form_gender {
      display:flex;
    }
    .form_name {
      width:250px;
    }
    .form_created_at {
      width:250px;
    }
    .form_email {
      width:250px;
    }
    .form_button {
      display:flex;
      justify-content:center;
      flex-direction:column;
      align-items:center;
      padding-top:50px;
    }
    button:first-child {
      background-color:black;
      color:white;
      padding:5px 50px;
      border-radius:5px;
      border:none;
    }
    button:last-child {
      border:none;
      background-color:white;
      text-decoration:underline;
      padding-top:10px;
    }
  </style>
@section('title','管理システム')
@section('body')
<div class="SystemForm">
<table>
  <form action="search" action="post">
  @csrf
  <tr>
      <th>
        <p>お名前</p>
      </th>
      <td>
        <input class="form_name" type="text" name="keyword" value="{{$keyword}}">
      </td>
      <!-- テスト実施後、hokan.blade.phpに保存したやつを反映する -->
  </tr>
</table>
  <div class="form_button">
    <button name="search" type="submit">検索</button>
    <button name="back" type="submit" value="true">リセット</button>
  </div>
</form>
</div>

@if($contents->count())

<div class="result">
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
    </tr>
    @foreach($contents as $content)
    <tr>
      <td>{{$content->id}}</td>
      <td>{{$content->fullname}}</td>
    </tr>
    @endforeach
  </table>
</div>

@else
<p>見つかりませんでした。</p>
@endif
@endsection