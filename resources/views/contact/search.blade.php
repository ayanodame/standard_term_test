@extends('layouts.default')
@section('title','管理システム')
<style>
  .SystemForm{
    border:solid 2px black;
    padding-left:20px;
    padding-bottom:20px;
    margin-left:20px;
    margin-right:20px;
  }
  .input_name, .input_created_at, .input_email {
    width:250px;
    margin-left:20px;
    margin-right:20px;
  }
  .input_gender {
    margin-left:20px;
  }
  .SystemForm td,th{
    padding-top:20px;
  }
  .form_button{
    display:flex;
    justify-content:center;
    align-items:center;
    padding-top:30px;
    flex-direction:column;
  }
  .form_button input{
    background-color:black;
    border:none;
    color:white;
    padding:5px 50px;
    border-radius:5px;
  }
  .form_button input:hover {
    cursor:pointer;
  }
  .SystemForm_reset a{
    display:flex;
    justify-content:center;
    align-items:center;
  }
  .SystemResult {
    width:100%;
    margin-left:20px;
  }
  .SystemResult table {
    margin:0px;
  }
  .SystemResult th:nth-of-type(1) {
    width:100px;
  }
  .SystemResult th:nth-of-type(2) {
    width:250px;
  }
  .SystemResult th:nth-of-type(3) {
    width:50px;
  }
  .SystemResult th:nth-of-type(4) {
    width:300px;
  }
  .SystemResult th:nth-of-type(5) {
    text-align:left;
    width:400px;
  }
  .SystemResult td {
    text-align:center;
  }
  .SystemResult td:nth-of-type(5n) {
    text-align:left;
  }
  .opinion {
    overflow:hidden;
    white-space:nowrap;
    width:420px;
    text-overflow:ellipsis;
  }
  .opinion:hover{
    text-overflow:clip;
    white-space:normal;
    overflow:visible;
  }
  .SystemResult_delete{
    padding-left:50px;
  }
  .SystemResult button{
    padding:5px 25px;
    border:none;
    background-color:black;
    color:white;
    border-radius:5px;
  }
  svg.w-5.h-5 {  /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
    }
  .hidden {
    width:100%;
    display:flex;
    flex-direction:row;
    justify-content:space-between;
  }
  .paginationWrap {
    display: flex;
    justify-content: center;
    padding-top: 10px;
    padding-bottom: 10px;
}
nav p{
  margin:0;
}

.pagination {
    display: inline-block;
    list-style-type:none;
    display:flex;
    padding: 0;
    margin: 0;
}

.pagination li {
  border: solid 1px gray;
  margin-left:-1px;
}

.pagination a {
    color: black;
    text-decoration: none;
    display:block;
    padding:5px 10px;
}

.pagination span {
  padding:5px 10px;
  display: block;
}

.pagination li.active {
    background-color: black;
    color: white;
}
.SystemResult th{
  border-bottom: solid 2px black;
}
.SystemResult table {
  border-collapse:collapse;
}
.SystemResult_delete {
  padding:16px 10px 16px 50px;
}

nav {
  margin:30px 20px 0px;
}
</style>
@section('body')

<div class="SystemForm">
<table>
  <form action="/search/result" method="post">
  @csrf
  <tr>
      <th>
        <p>お名前</p>
      </th>
      <td>
        <input type="text" class="input_name" name="input_name" value="{{$fullname}}">
      </td>
      <th>
          <p>性別</p>
        </th>
        <td>
          <input type="radio" class="input_gender" name="input_gender" value="" checked>全て
          <input type="radio" class="input_gender" name="input_gender" value="1">男性
          <input type="radio" class="input_gender" name="input_gender" value="2">女性
        </td>
  </div>
  <tr>
    <th>
      <p>登録日</p>
    </th>
    <td>
      <input type="date" class="input_created_at" name="input_created_from" value="{{$created_from}}">
    </td>
    <td>
      <p>〜</p>
    </td>
    <td>
      <input type="date" class="input_created_at" name="input_created_to"value="{{$created_to}}">
    </td>
  </tr>
  <tr>
    <th>
      <p>メールアドレス</p>
    </th>
    <td>
      <input type="text" class="input_email" name="input_email" value="{{$email}}">
    </td>
  </tr>
</table>
  <div class="form_button">
    <input type="submit" value="検索">
    <a class="SystemForm_reset" href="/search">リセット</a>
  </div>
</form>
</div>

@if(@isset($items))
{{$items->links('layouts.pagenate')}}
<div class="SystemResult">
<table>
  <tr>
    <th>
      <p>ID</p>
    </th>
    <th>
      <p>お名前</p>
    </th>
    <th>
      <p>性別</p>
    </th>
    <th>
      <p>メールアドレス</p>
    </th>
    <th>
      <p>ご意見</p>
    </th>
    <th></th>
  </tr>
@foreach($items as $item)
<tr>
  <td>
    <p>{{$item->id}}</p>
  </td>
  <td>
    <p>{{$item->fullname}}</p>
  </td>
  <td>
    @if(($item->gender)=='1')
    <p>男性</p>
    @else
    <p>女性</p>
    @endif
  </td>
  <td>
    <p>{{$item->email}}</p>
  </td>
  <td>
    <p class="opinion">{{$item->opinion}}</p>
  </td>
  <td>
    <div class="SystemResult_delete">
      <form action="/search/delete" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$item->id}}">
      <button class="SystemResult_delete_button">削除</button>
    </form>
    </div>
  </td>
</tr>
@endforeach
</table>
</div>
@endif
@endsection