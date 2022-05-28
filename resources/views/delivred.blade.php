<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>




    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/sidebars.css') }} " rel="stylesheet">

    <style>

        body {font-family: 'aealarabiya', sans-serif;}



    </style>
</head>
<body >

<div class="A4">
    @foreach($requests as $key => $request)
<h3 style="
  position: relative;
  left: 24cm;
  top:8cm;
  "> {{$request->bachlor_student_first_name}} {{$request->bachlor_student_last_name}}</h3>

<h3 style="
  position: relative;
  left: 10cm;
  top:7cm;
  ">{{$request->bachlor_student_birthday}}</h3>

<h3 style="
  position: relative;
  left: 10cm;
  top:7cm;
  ">{{$request->faculty_code}}</h3>

<h3 style="
  position: relative;
  left: 20cm;
  top:6cm;

  " >{{$request->faculty_code_ar}}</h3>

<h3 style="
  position: relative;
  left: 15cm;
  top:7cm;
  ">{{$request->domain_code}}</h3>

<h3 style="
  position: relative;
  left: 15cm;
  top:7cm;
  ">{{$request->division_code}}</h3>

<h3 style="
  position: relative;
  left: 15cm;
  top:7cm;
  ">{{$request->speciality_code}}</h3>
    @endforeach
</div>


</body>
</html>
