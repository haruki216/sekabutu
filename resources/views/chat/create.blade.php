<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <title>post</title>
    </head>
    <body>
         <form action="/posts" method="POST">
            @csrf
       <h1 class="title">
          <h2>title</h2>
          <input type='text' name="cotent[title]" placeholder="タイトル">
       </h1>
       <div class="content">
             <h3>本文</h3>
             <textarea name="cotent" placeholder="今日も1日お疲れさまでした。"></textarea>
               
           </div>
           <input type="submit" value="store"/>
       </form>
       
       <div class="footer">
           <a href="/post">戻る</a>
       </div>
    </body>
</html>