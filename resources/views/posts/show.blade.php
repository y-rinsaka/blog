<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <script type="text/javascript"> 
        
        function check(){
        
        	if(window.confirm('削除すると元には戻りません。削除しますか？')){ // 確認ダイアログを表示
        
        		return true; // 「OK」時は送信を実行
        
        	}
        	else{ // 「キャンセル」時の処理
        
        		window.alert('キャンセルされました'); // 警告ダイアログを表示
        		return false; // 送信を中止
        
        	}
        
        }
        
        </script>
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        
        <button onclick="location.href='/posts/{{ $post->id}}/edit'">edit</button>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline" onSubmit="return check()">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button> 
        </form>
        <div class="footer">
            <a href="/">back</a>
        </div>
    </body>
</html>