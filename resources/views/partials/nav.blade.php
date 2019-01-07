<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Carousel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/newpost">Publish</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
             </form>
           @if(Auth::check())

           <!-- <li class="dropdown">
                     <a href="/profile" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                     {{ auth()->user()->name }} <span class="caret"></span>
                     </a>
           <ul class="dropdown-menu" role="menu">
                     <li> <a href="/profile"><i class="fa fa-btn fa-user"></i> profile</a></li>
                     <li> <a href="/logout"><i class="fa fa-btn fa-signout"></i> logout</a></li>
                     </ul>
                     </li>
               -->
 <button class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left: 50px;">
          
           <img src="uploads/avatars/{{ auth()->user()->avatar }} " style="width:32px; height:32px; position:absolute; top:5px; bottom:5px; left:10px; border-radius: 50%"> {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/profile">Profile</a>
          <a class="dropdown-item" href="/manage">Manage</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>

        </div>
              </button>




          @else
          <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
          </li>|
          <li class="nav-item">
          <a class="nav-link" href="/login">login</a>
          </li>|
         
          @endif
          
        </div>
      </nav>
    </header>