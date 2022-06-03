<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="{{ asset('chats/img/Outlets.png') }}" height="40" alt="Outlets Logo" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Team</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a>

            <!-- Notifications -->
            <a class="text-reset me-3" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-bell"></i>
                <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/uploads/users/' . Auth::user()->image) }}" class="rounded-circle"
                        height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">My
                            profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
    Launch static backdrop modal
  </button> --}}

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Chat Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger">Only the nickname can be updated here**</p>
                    @forelse ($viewuser as $currentuser)
                        <div class="form-outline mb-3">
                            <input class="form-control" type="text" value="{{ $currentuser->nickname }}"
                                aria-label="input example" />
                            <label class="form-label" for="nickname">NickName</label>
                        </div>
                        @empty
                        <div class="form-outline mb-3">
                            <input class="form-control" type="text" aria-label="input example" placeholder="Please enter a nickname"/>
                            <label class="form-label" for="nickname">NickName</label>
                        </div>
                    @endforelse
                <div class="form-outline mb-3">
                    <input class="form-control" type="text"
                        value="{{ Auth::user()->name . '  ' . Auth::user()->lname }}"
                        aria-label="readonly input example" readonly />
                    <label class="form-label" for="full name">Full Names</label>
                </div>
                <div class="form-outline mb-3">
                    <input class="form-control" type="text" value="{{ Auth::user()->email }}"
                        aria-label="readonly input example" readonly />
                    <label class="form-label" for="email">Email</label>
                </div>
                <div class="form-outline mb-3">
                    <input class="form-control" type="text" value="{{ Auth::user()->city }}"
                        aria-label="readonly input example" readonly />
                    <label class="form-label" for="City">City</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
