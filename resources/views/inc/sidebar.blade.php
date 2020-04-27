<div class="sidenav">
  <a class="{{Request::is('add') ? 'active' : ''}}" href="/add">Add Movie</a>
  <a class="{{Request::is('updatetable','update') ? 'active' : ''}}" href="/updatetable">Update Movie</a>
  <a class="{{Request::is('delete') ? 'active' : ''}}" href="/delete">Delete Movie</a>
</div>
