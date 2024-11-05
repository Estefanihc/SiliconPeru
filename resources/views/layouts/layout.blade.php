<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- favicon --> 

    <!-- estilos inline -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 40px 0;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        .text-background {
            background-color: rgba(245, 140, 20, 0.9);
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            display: inline-block;
            margin-bottom: 20px;
        }

        .outer-card {
            border-radius: 20px;
            background-color: rgba(11, 23, 56, 0.9);
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }

        .inner-card {
            border-radius: 15px;
            border: none;
            margin-bottom: 10%;
        }

        .card-header {
            border-radius: 15px 15px 0 0;
            text-align: center;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            color: #000;
            background-color: #fff;
            transition: border-color 0.3s;
            margin-bottom: 5%;
        }

        .form-control:focus {
            border-color: #0b2f7c;
            box-shadow: 0 0 5px rgba(11, 47, 124, 0.5);
            margin-top: 10%;
        }

        .form-control::placeholder {
            color: #999;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s;
            flex: 1;
            margin: 0 5px;
        }

        .btn-success {
            background-color: #0b2f7c;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-success:hover {
            background-color: #faa526;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary:hover {
            background-color: #ffb7b7;
            transform: translateY(-2px);
        }

        .text-danger {
            display: inline-block;
            background-color: #f8d7da; /* Color de fondo similar al mensaje nativo */
            color: #721c24; /* Color de texto similar al mensaje nativo */
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 0.875em;
            margin-left: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #f5c6cb;
            position: relative;
            top: -5px;
        }


        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .logo {
                max-width: 100px;
            }
        }
    </style>
</head>
<body>
    <!-- header --> 
    <!-- nav --> 
    <!-- content --> 
    @yield('content')
    <!-- footer --> 
    <!-- script --> 
</body>
</html>
