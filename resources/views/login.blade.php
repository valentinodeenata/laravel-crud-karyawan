<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
          <h1 class="font-bold text-center text-2xl mb-5">Login - Pengolahan Data Karyawan</h1>  
          <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
            <div class="px-5 py-7">
              <form action="{{ url('login/action') }}" method="post">
                @csrf
                <label class="font-semibold text-sm text-gray-600 pb-1 block">Username</label>
                <input type="text" name="username" class="input input-bordered border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                <input type="password" name="password" class="input input-bordered border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                <button class="btn btn-primary btn-block" type="submit">Login</button> 
              </form>
            </div>
          </div>
        </div>
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