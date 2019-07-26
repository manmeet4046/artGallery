 <form action="{{route('comments.store')}}" method="post" >
                  @csrf
      <div class="form-group">
        <label for="comment">Your Comment</label>
        <textarea name="comment" class="form-control" rows="3"></textarea>
      </div>
      <input type="hidden" value="{{$saakhi_id}}"name="saakhi_id">
      <button type="submit" class="btn btn-default">Send</button>
    </form>
