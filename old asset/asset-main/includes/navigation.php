<nav class="navbar navbar-expand-lg" style="background-color: darkblue;">
  <a class="navbar-brand" href="#"><img src="/asset/includes/images/logo1.jpg" width="30" height="30" alt="" class="img-responsive logo"> Asset Register</a>
    
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/asset/main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./admin/welcome.php"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                </li>
                <li class="nav-item">
<!--                    <a class="nav-link" href="logout.php">Signout</a>-->

                    <a class="nav-link" href= "/login/logout.php" > SignOut </a>
                </li>
            </ul>
    
    </form>
  </div>
</nav>


