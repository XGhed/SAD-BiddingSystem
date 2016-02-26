@extends('parent')


@section('title')
Maintenance
@endsection



@section('Maintenance-title')

<h1><i class="medium material-icons">settings</i>   Maintenance</h1>

@endsection



          


@section('Maintenance-body')

@yield('try')
<!-- Page Layout here -->
    <div class="row">
     <nav>
  <ul class="right hide-on-med-and-down">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <ul id="slide-out" class="side-nav">
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>




<div class="col s8 pull-s1">
        
<div class = "container" style = "float: top;">
@yield('Supplies')
</div>
</div>



</div>

<script>

 $(".button-collapse").sideNav();
</script>




@endsection