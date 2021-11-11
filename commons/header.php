<nav style="position:fixed;width:100%;z-index:100;top:0;" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://th.bing.com/th/id/R.9c5c3d2ed1ebd22dbcf567bc5d2d4fc8?rik=vC8lSSfdD1U5zg&riu=http%3a%2f%2fwww.newdesignfile.com%2fpostpic%2f2014%2f09%2fcomputer-programming-code-icon_334973.png&ehk=opjpxA8O%2bpC5h%2bX8BO4YhrH6OlFCGHNEpuf8I9v9tqg%3d&risl=&pid=ImgRaw&r=0" alt="" width="48" height="48" class="d-inline-block align-text-center">
            Competitive Programming
        </a>
        <!-- <a class="navbar-brand" href="#">Competitive Programming</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Leaderboard</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <button type="button" class="btn btn-primary" style="margin-left : 16px;" data-bs-toggle="modal" data-bs-target="#signindialog">SIGN IN</button>
        </div>
    </div>
</nav>

<!-- Sign in dialog -->
<div class="modal fade" id="signindialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Sign in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" type="submit">sign in</button>
            </div>
        </div>
    </div>
</div>