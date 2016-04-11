<form class="navbar-form navbar-left" action="{{route('search')}}" role="search">
    <div class="form-group">
      <input type="text" class="form-control" name="query" value="{{Input::has('query') ? Input::get('query') : ''}}" placeholder="Search">
  </div>
</form>