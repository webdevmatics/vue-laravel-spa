<!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              {{-- <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li> --}}
               <router-link to="/" tag='li' exact>
                <a>Home</a> 
               </router-link>
               <router-link to="/about" tag='li'>
                  <a>About</a> 
               </router-link>

               <router-link to="/vision" tag='li'>
                  <a>Vision</a> 
               </router-link>
               <router-link to="/login" tag='li'>
                  <a>Login</a> 
               </router-link>
               <router-link to="/register" tag='li'>
                  <a>Register</a> 
               </router-link>

               <li>
                <a href="/logout">Logout</a>
               </li>
             
            </ul>
           
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>