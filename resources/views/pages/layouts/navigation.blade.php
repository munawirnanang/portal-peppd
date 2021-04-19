{{-- author  : Muhamad Munawir Amin
Email   : muhamadmunawiramin@gmail.com
Date    : 29 January 2021 --}}

<body>
  <div class="navbar-fixed">

    <nav class="nav-extended" style="background-image: url({{ asset('images/bappenas_banner.png') }});">
      <div class="nav-content" style="background-color: #1f3984;">
        <div class="container">
          <marquee>KEMENTERIAN PERENCANAAN PEMBANGUNAN NASIONAL (BADAN PERENCANAAN PEMBANGUNAN NASIONAL) REPUBLIK INDONESIA</marquee>
        </div>
      </div>
      <div class="nav-wrapper container"> 
        <a href="{{ url('/') }}" class="brand-logo"><img src="{{ asset('images/logo_bappenas.png') }}" width="110" height="30" alt="Logo"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="color: black;">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li {!! request()->is('/') ? 'class="active"' : '' !!} ><a href="{{ url('/') }}" style="color: black;">Beranda</a></li>
          <li {!! request()->is('guide') ? 'class="active"' : '' !!} ><a href="{{ url('/guide') }}" style="color: black;">pedoman</a></li>
          <li {!! request()->is('#publication') ? 'class="active"' : '' !!} ><a href="{{ url('/publication') }}" style="color: black;">Publikasi</a></li>
          <li {!! request()->is('#activity') ? 'class="active"' : '' !!} ><a href="#activity-content" style="color: black;">Kegiatan</a></li>
          <li {!! request()->is('#application') ? 'class="active"' : '' !!} ><a href="#application-content" style="color: black;">Aplikasi Kami</a></li>
          <li {!! request()->is('contact') ? 'class="active"' : '' !!} ><a href="{{ url('/contact') }}" style="color: black;">Hubungi Kami</a></li>
        </ul>
      </div>
    </nav>

  </div>

  <ul class="sidenav" id="mobile-demo">
    <li {!! request()->is('/') ? 'class="active"' : '' !!} ><a href="{{ url('/') }}" style="color: black;">Beranda</a></li>
    <li {!! request()->is('guide') ? 'class="active"' : '' !!} ><a href="{{ url('/guide') }}" style="color: black;">pedoman</a></li>
    <li {!! request()->is('#publication') ? 'class="active"' : '' !!} ><a href="{{ url('/publication') }}" style="color: black;">Publikasi</a></li>
    <li {!! request()->is('#activity') ? 'class="active"' : '' !!} ><a href="#activity-content" style="color: black;">Kegiatan</a></li>
    <li {!! request()->is('#application') ? 'class="active"' : '' !!} ><a href="#application-content" style="color: black;">Aplikasi Kami</a></li>
    <li {!! request()->is('contact') ? 'class="active"' : '' !!} ><a href="{{ url('/contact') }}" style="color: black;">Hubungi Kami</a></li>
  </ul>