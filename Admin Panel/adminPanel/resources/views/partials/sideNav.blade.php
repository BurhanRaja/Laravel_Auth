
<div class="sideNav" style=" height: 1300px;">


<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 630px; position: sticky; top: 0;">
    <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Admin Dashboard</span>
      {{-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
    </a>
    <hr>

    <ul class="nav nav-pills flex-column mb-auto dash-nav">
        <li class="nav-item ">
            <a class="nav-link text-white {{'user/dashboard' == request()->path() ? 'active' : '' }}" href="/user/dashboard">Home</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-white {{'dashboard/orders' == request()->path() ? 'active' : '' }}" href="/dashboard/orders">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{'dashboard/products' == request()->path() ? 'active' : '' }}" href="/dashboard/products">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Cutomers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Messages</a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{URL::asset('/images/profilePic.webp')}}" width="32" height="32" class="rounded-circle me-2">
            {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
    </div>
  </div>
</div>

{{-- <script>
const dashNav = document.querySelectorAll('.dash-nav .nav-item .nav-link');
console.log(dashNav)

dashNav.forEach(navEl => {
    navEl.addEventListener("click", () => {
        let a = document.querySelector('.dash-nav .nav-item .active')
        a.classList.remove('active')
        navEl.classList.add("active")
    })
});
</script> --}}
