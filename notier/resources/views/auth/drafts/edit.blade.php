@extends('layouts.default')
@section('content')
<form class='post-page-wrapper' action='/drafts/edit' method='post'>
@csrf
    @if($errors->first('title'))
        <div class='validation'>{{$errors->first('title')}}</div>
    @endif
    <input type='text' class='form-control m-1' id='title-input' placeholder='title' name='title'>
    
    @if($errors->first('tag'))
        <div class='validation'>{{$errors->first('tag')}}</div>
    @endif
    <input type='text' class='form-control m-1' placeholder='tag' name='tag'>

    @if($errors->first('body'))
        <div class='validation'>{{$errors->first('article')}}</div>
    @endif
    <div class='row'>
        <div class='col-6 m-1'>
            <textarea name='article' id='markdown_editor_textarea' cols='30' rows='10' class='form-control'></textarea>
        </div>
        <div class='col-6 m-1'>
            <div id='markdown_preview'></div>
        </div>
    </div>
    <div class='post-page-footer'></div>
        <input type='submit' class='post-button m-1' value='投稿'>
    </div>
</form>


@endsection
