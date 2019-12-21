@extends('layouts.app')

@section('content')
    <form method="POST" action="">
        <div class="form-group">
          <label for="post">Update your followers</label>
            <br />
          <textarea autofocus placeholder="Write your post here..." maxlength="1000" class="form-control" name="post" id="post"></textarea>
            <input type="file" class="active btn-primary form-control-file">
        </div>
        <button type="submit" class="btn btn-primary form-control"><b>Post</b></button>
      </form>
      
@endsection
