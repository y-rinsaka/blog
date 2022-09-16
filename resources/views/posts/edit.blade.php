<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Edit</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="content__title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" value="{{$post->title}}"/>
    
                </div>
                <div class="content__body">
                    <h2>Body</h2>
                    <textarea name="post[body]">{{$post->body}}</textarea>

    
                </div>
                <input type="submit" value="保存"/>
            </form>
        </div>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>