<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/">
                    <img src="{{url('/')}}/css/images/leeto.png" height="50px">
                </a>
            </div>

            <ul class="nav">
                <li @if($dashboardClass=='Dashboard') class="active" @endif>
                    <a href="/seller/dashboard">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li @if($dashboardClass=='User Profile') class="active" @endif>
                    <a href="/seller/userprofile">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li @if($dashboardClass=='My Products') class="active" @endif>
                    <a href="/seller/myproducts">
                        <i class="ti-view-list-alt"></i>
                        <p>My Products</p>
                    </a>
                </li>
                <li>
                    <a href="/seller/statistics">
                        <i class="ti-stats-up"></i>
                        <p>Statistics</p>
                    </a>
                </li>
                <li @if($dashboardClass=='Messages') class="active" @endif>
                    <a href="/seller/messages">
                        <i class="ti-email"></i>
                        <p>Messages</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fa fa-sign-out"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>