@extends('layouts.default')
<style>
.thanks {
  display:flex;
  justify-content:center;
  align-items:center;
  flex-direction:column;
  height:600px;
}
.thanks button {
  background-color:black;
  color:white;
  padding:10px 20px;
  border-radius:10px;
  border:none;
}
.thanks p {
  padding-bottom:30px;
}
</style>
@section('body')
<div class="thanks">
  <p>ご意見いただきありがとうございました。</p>
  <button>トップページへ</button>
</div>
@endsection