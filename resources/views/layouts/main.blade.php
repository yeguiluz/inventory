@extends('layouts.app')

@section('main')
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Inventario</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
          </li>
        @else
          @php
            $userType = \Auth::user()->type;
          @endphp
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          @if($userType =='vendor')
            <li class="nav-item">
              <a class="nav-link" href="{{Route('productsIndex')}}">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ordersAll')}}">Ordenes</a>
            </li>
          @endif
          @if($userType == 'client')
            <li class="nav-item">
              <a class="nav-link" href="{{route('shop')}}">Tienda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('cart')}}">Mi Carrito</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ownOrders')}}">Mis Ordenes</a>
            </li>
          @endif
          @if($userType == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{route('users')}}">Usuarios</a>
            </li>
          @endif
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">{{ Auth::user()->name }} <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="themes">
                <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
            </li>
        @endguest
      </ul>
    </div>
  </nav>
@stop
