@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>
  .usu{
    background: #E50E0E;  
    font-size:34px;
    color: white;
    padding: 10px 30px;
    border-radius: 15px;
  }
</style>
  <div style="margin-bottom:200px;">
    <center>
    <img src="https://scontent-qro1-1.xx.fbcdn.net/v/t39.30808-6/339731854_744730663729690_7480839995561236373_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=730e14&_nc_ohc=QWsuTrQ5QqUAX_2eS3x&_nc_ht=scontent-qro1-1.xx&oh=00_AfD5L8p3H0S3mn9pomFuBEmN8SEjTrTn5jm74o5vjMWdrw&oe=642E2890" alt="">
    <h1 class="text-5xl text-center pt-24	"> Iniciaste sesión como: <br> <br></h1>
    <b class="usu">{{Auth::user()->nombre}}</b>
  </center>
  </div>
      
@endsection