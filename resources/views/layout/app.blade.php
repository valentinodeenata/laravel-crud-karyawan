<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tilang Online</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    <div class="navbar mb-2 h-3 shadow-lg " style="height: 100px">
        <div class="px-2 mx-2 navbar-start">
          <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/sinerka.png') }}" class="w-14" alt="">
          </a>
        </div> 
        <div class="hidden px-5 mx-2 navbar-center lg:flex">
          <div class="flex items-stretch">
            <span class="text-lg text-center font-bold">Data Karyawan<br>PT Sinergi Karya Solusindo</span>
          </div>
        </div> 
        <div class="navbar-end">
            <div class="dropdown dropdown-end">
              <div tabindex="0" class="m-1 btn btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">           
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>               
                </svg>
              </div> 
              <ul tabindex="0" class="p-2 shadow-lg menu dropdown-content bg-base-100 rounded-box w-52">
                @if (Auth::user())
                <li>
                  <a href="{{ url('ganti-password') }}">Ganti Password</a>
                </li> 
                <li>
                  <a href="{{ url('logout') }}">Logout</a>
                </li>
                @else
                <li>
                  <a href="{{ url('login') }}">Login</a>
                </li> 
                @endif
              </ul>
            </div>
        </div>
      </div>
      
    <div class="container">
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @if (Session::get('sukses'))
        <script>
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          Toast.fire({
            icon: 'success',
            title: "{{ Session::get('sukses') }}"
          })
        </script>
    @elseif(Session::get('error'))
        <script>
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          Toast.fire({
            icon: 'error',
            title: "{{ Session::get('error') }}"
          })
        </script>
    @endif
</body>
</html>