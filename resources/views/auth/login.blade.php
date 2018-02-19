@extends('layouts.head')

@section('content')
<style type="text/css">
    #form{
    position: fixed;
    width: 100%;
    height: 100%;
    margin: 0 auto;
    overflow: hidden;
    padding: 10px 0;
    align-items: center;
    justify-content: space-around;
    display: flex;
    float: none;
}
</style>
<div id="form">
<section id="cover">
    <div id="cover-caption">
        <div id="container" class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-center" >
                    <h1 class="display-3">CrunchCritic Login</h1>
                    <div class="info-form">
                        <form method="POST" action="{{ route('login') }}" class="justify-content-center" style="padding: 1% 20%">
                            {{ csrf_field() }}
                            <div class="form-group" style="margin: 1%">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="none@gmail.com">
                            </div>
                            <div class="form-group" style="margin: 1%">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="password">
                            </div>
                            <button type="submit" class="btn btn-success" style="margin: 1%">Okay, go!</button>
                        </form>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
    <div class="col-sm-10 form-group-lg">
        <form class="form-group">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn btn-success active">
                    <input type="radio" autocomplete="off" checked> Add question
                </label>
                <label class="btn btn-success">
                    <input type="radio" name="options" id="inlineRadio1" value="openQuestionModule()"
                           autocomplete="off">Question with a open answer </label>
                <label class="btn btn-success">
                    <input type="radio" name="options" id="inlineRadio2" value="singleQuestionModule()"
                           autocomplete="off">
                    Question with only one right answer
                </label>
            </div>
        </form>
        <button class="btn btn-outline-success" id="saveTestBtn" onclick="saveTest()" type="submit">
            Save Test
        </button>
    </div>-->
</div>
@endsection
