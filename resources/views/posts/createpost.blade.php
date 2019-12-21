    
    {!! Form::open(['action' => 'PostsController@post', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            
            {{Form::text('title', '', ['class' => 'form-control', 'title' => 'Optional title for your post', 'placeholder' => 'Optional title for your post', 'maxlength' => '100'])}}
        
            {{Form::hidden('user_id', $user->id, ['class' => 'form-control'])}}
            {{-- {{Form::hidden('post_user_id', auth()->user()->id, ['class' => 'form-control'])}} --}}
            {{Form::hidden('user_name', auth()->user()->name, ['class' => 'form-control'])}}

            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'rows' => '2', 'required', 'class' => 'form-control', 'placeholder' => 'Write to ' .$user->name. '...', 'title' => 'Write to ' .$user->name. '...', 'maxlength' => '1000'])}}
            <div class="card">
            {{Form::file('file', ['class' => 'btn btn-default text-center active form-control-file', 'title' => 'Click to upload file'])}}
            </div>
        </div>
        {{Form::submit('Post to '.$user->name.'', ['class' => 'btn btn-primary form-control', 'title' => 'Click to post to '.$user->name.''])}}
    {!! Form::close() !!}
