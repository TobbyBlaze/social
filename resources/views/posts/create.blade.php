    
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            
            {{Form::text('title', '', ['class' => 'form-control', 'title' => 'Optional title for your post', 'placeholder' => 'Optional title for your post', 'maxlength' => '100'])}}
        
            
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'rows' => '2', 'autofocus', 'required', 'class' => 'form-control', 'placeholder' => 'Write to your followers...', 'title' => 'Write to your followers...', 'maxlength' => '1000'])}}
            <div class="card">
            {{Form::file('file', ['class' => 'btn btn-default text-center active form-control-file', 'title' => 'Click to upload file'])}}
            </div>
        </div>
        {{Form::submit('Post', ['class' => 'btn btn-primary form-control', 'title' => 'Click to post'])}}
    {!! Form::close() !!}
