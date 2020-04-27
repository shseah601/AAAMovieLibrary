<nav class="topnav">
  <div id="header">
    <a class="{{Request::is('/') ? 'active' : ''}}" href="/"><i class="fas fa-home"></i> Home</a>
    <a class="{{Request::is('about') ? 'active' : ''}}" href="/about"><i class="fas fa-users"></i> About</a>
    <a class="{{Request::is('contact') ? 'active' : ''}}" href="/contact"><i class="fas fa-comment"></i> Contact</a>
    <a class="{{Request::is('movies') ? 'active' : ''}}" href="/movies"><i class="fas fa-film"></i> Movies</a>
    <a class="{{Request::is('browse','search','searchTitle') ? 'active' : ''}}" href="/browse"><i class="fab fa-searchengin"></i> Browse</a>
    @if(\Auth::check())
    <a class="{{Request::is('messages') ? 'active' : ''}}" href="/messages"><i class="fas fa-comments"></i> Messages</a>
    <a class="{{Request::is('edit','add','delete','update','updatetable') ? 'active' : ''}}" href="/edit"><i class="fas fa-edit"></i> Edit</a>
    <a class="{{Request::is('logout') ? 'active' : ''}}" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    @else
    <a class="{{Request::is('login') ? 'active' : ''}}" href="/login"><i class="fas fa-sign-in-alt"></i> Log In</a>
    @endif
    <div class="search-container">
      <form name="searchBar" action="searchTitle" onsubmit="return validateSearchBar()" method="post">
        <input type="text" placeholder="Search movie title" name="titleSearch">
        <button type="submit"><i class="fa fa-search"></i></button>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</nav>

<script type="text/javascript">

//Searchbar validation
function validateSearchBar()
{
  var searchBarText = document.forms["searchBar"]["titleSearch"].value;
  var proceed = true;

  if(searchBarText == "")
  {
    alert('The search field is required');
    proceed = false;
  }
  else if( /[^a-zA-Z0-9 :\-\/]/.test(searchBarText)){
        alert('Only alphanumeric, space and colon is valid');
    proceed = false;
  }

  return proceed;
}
</script>
