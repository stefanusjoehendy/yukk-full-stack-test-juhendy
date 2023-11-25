<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/transaction" class="nav-link">Transaction</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/mutation" class="nav-link">Mutation</a>
        </li>
    </ul>
    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/logout" class="nav-link">Logout</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <p>Hi, {{ auth()->user()->name }}</p>
        </li>

    </ul>
</nav>