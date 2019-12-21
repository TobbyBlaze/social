    
    {!! Form::open(['action' => 'PostsController@store_comments', $post->id, 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            
            {{Form::hidden('post_id', $post->id, ['class' => 'form-control'])}}

            {{Form::hidden('user_id', $post->user_id, ['class' => 'form-control'])}}

            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'rows' => '1', 'title' => 'Write a comment...', 'required', 'class' => 'form-control', 'placeholder' => 'Write a comment...', 'maxlength' => '1000'])}}
            
        </div>
        {{Form::submit('Comment', ['class' => 'btn btn-primary form-control', 'title' => 'Click to add comment'])}}
    {!! Form::close() !!}
