<div class="row" id="menu-div">
    <div id="templateMenu" class="navbar navbar-default " role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
              <button  type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuItems" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="#"> <img src="css/images/leeto.png" height="70px"></a>
            </div>
            <div id="menuItems" class="collapse navbar-collapse navbar-menubuilder">
                <ul class="nav navbar-nav navbar-right">
                    <li @if ($className == 'home') class='active' @endif>
                      <a href="/">Home</a>
                    </li>
                    <li @if ($className == 'products') class='active' @endif>
                      <a href="/products">Products</a>
                    </li>
                    <li @if ($className == 'about') class='active' @endif>
                      <a href="/about">About Us</a>
                    </li>
                    <li >
                      <a href="#" id="login1" class="menu-red md-trigger" data-modal="modal-9">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>