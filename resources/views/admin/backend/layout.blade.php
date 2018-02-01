<!DOCTYPE html>
<html>
  <head>
          @include('admin.backend.partials.head')
  </head>
  <body>

    <!--begin header-->
          @include('admin.backend.partials.header')
    <!--end header-->


  <section class="container-fluid">
      @yield('container')
  </section>

    <!--begin footer-->
          @include('admin.backend.partials.footer')
    <!--end footer-->

    <!--begin scripts-->
          @include('admin.backend.partials.scripts')
    <!--end scripts-->

  </body>
</html>
