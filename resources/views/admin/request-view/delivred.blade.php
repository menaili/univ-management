<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <style>
        button{
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 8px rgb(207, 207, 207);
        }

        button:hover{
            border: none;
            padding: 15px;
            border-radius: 15px;
            box-shadow: inset 0 0 8px #f9f8fc;
        }


        .button-os{
            position: absolute;
            width: 200px;
            height: 65px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            background-color: #f9f8fc;
            border: 2.5px solid #0e172c;
            transition: background-color 2.2s;
            transition-duration: 3s;
            transition: 1.5s;
        }

        .button-os:hover{
            position: absolute;
            top: 30px;
            background-color: #fec7d7;
        }

        .button-os a{
            font-size: 20px;
            display: block;
            text-decoration: none;
            color:#0e172c;
            transition: 1.5s;
        }

        .button-os a:hover{
            letter-spacing: 5px;
        }


        body {
            width: 230mm;
            height: 100%;
            margin: 0 auto;
            padding: 0;
            font-size: 12pt;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .main-page {
            width: 297mm;
            min-height: 210mm;
            margin: 10mm auto;
            background: white;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        .sub-page {
            padding: 1cm;
            height: 210mm;
        }
        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 297mm;
                height: 210mm;
            }
            .main-page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }

        }





    </style>
</head>
<body>
<div>
<h3 style="
  position: relative;
  left: 297mm;
  ">menaili</h3>
<h3>menaili</h3>
<h3>menaili</h3>
<h3>menaili</h3>
</div>

<div>
<button id="foot"><button class="button-os"><a href="#">BUTTON</a></button></button>
</div>
</body>
</html>
