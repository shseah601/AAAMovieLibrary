<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AAA Movie Library</title>
    <link rel="stylesheet" type="text/css" href="/css/mystyle.css"/>
    <link rel="stylesheet" type="text/css" href="/css/fontawesome\web-fonts-with-css\css\fontawesome-all.min.css" />
    <link rel="icon" type="image/png" href="/images/AAAMovieLibrary_16x16.png" sizes="16x16"/>
    <link rel="icon" type="image/png" href="/images/AAAMovieLibrary_196x196.png" sizes="196x196"/>
    <link rel="icon" type="image/png" href="/images/AAAMovieLibrary_32x32.png" sizes="32x32"/>
    <link rel="script" type="text/javascript" href="/js/myjs.js"/>
  </head>
  <body>
    @include('inc.navbar')
    <div id="main">
      @include('inc.alertMessages')

      @yield('content')

      @include('inc.footer')
    </div>
  </body>
</html>
