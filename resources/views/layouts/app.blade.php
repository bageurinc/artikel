<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }
        
        .topnav {
          overflow: hidden;
          background-color: #333;
        }
        
        .topnav a {
          float: left;
          color: #f2f2f2;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }
        
        .topnav a:hover {
          background-color: #ddd;
          color: black;
        }
        
        .topnav a.active {
          background-color: #4CAF50;
          color: white;
        }
    </style>
    <title> @yield('judul','Alisan') </title>
    @yield('css')
</head>

<body>
    <div class="topnav">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('about') }}">About</a>
        <a href="{{ url('haji') }}">Haji</a>
        <a href="{{ url('umroh') }}">Umroh</a>
        <a href="{{ url('gallery') }}">Gallery</a>
        <a href="{{ url('rewards-acknowlegement') }}">Rewards & Acknowledgement</a>
        <a href="{{ url('news') }}">News Update</a> 
    </div>
@yield('content')

@yield('js')
</body>
</html>