<!-- Nav Bar -->
<div class="navbar w3-bar w3-top w3-blue-grey w3-large">
    <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="sidenav w3-sidebar w3-collapse w3-top w3-white w3-animate-left" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="https://www.w3schools.com/w3images/avatar5.png" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
            <span>Welcome, <strong>{{ auth()->user()->first }}</strong></span><br>
            <a href="#" class="w3-bar-item w3-button"><i class="fas fa-envelope"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fas fa-user"></i></a>
            <a href="#" class="w3-bar-item w3-button"><i class="fas fa-cog"></i></a>
        </div>
    </div>
    <hr>
    <div class="w3-bar-block">
        <a href="/console/users/list" class="w3-bar-item w3-button w3-padding"><i class="fas fa-users fa-fw"></i>&nbsp; Users</a>
        <a href="/console/companies/list" class="w3-bar-item w3-button w3-padding"><i class="fas fa-building fa-fw"></i>&nbsp; Companies</a>
        <a href="/console/drivers/list" class="w3-bar-item w3-button w3-padding"><i class="fas fa-id-card fa-fw"></i>&nbsp; Drivers</a>
        <a href="/console/deliveries/list" class="w3-bar-item w3-button w3-padding"><i class="fas fa-truck fa-fw"></i>&nbsp; Deliveries</a>
        <a href="/console/logout" class="w3-bar-item w3-button w3-padding"><i class="fas fa-right-from-bracket fa-fw"></i>&nbsp; Logout</a>
    </div>
</nav>