<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script>
        tailwind.config = {
            theme: {
                colors: {
                    'nav': '#3B3B49',
                    'table-body': '#79798A',
                    'table-body2': '#8F8F9F',
                    'table-body-hover': '#5050C9',
                    'main': '#9898A9',
                    'white': '#ffffff',
                    'black': '#000000',
                    'loader': '#000000aa',
                    'button': '#6666DF',
                    'button-hover': '#5050C9',
                    'pagination-e-active': '#B2B2F3',
                    'pagination-e-inactive': '#C3C3CD'
                }
            },
        }
    </script>
    <title>Homan-Trans - Laravel Homework</title>
</head>
<body class="bg-main">
    <!-- MAIN VIEW -->
    <main class="bg-main text-black w-full">
        @yield('main')
    </main>

    <script>
        // Fetching data and upload to Database
        document.getElementById('fetchDataButton').addEventListener('click', function() {
            document.getElementById('loader').style.display = 'block';
            
            fetch('{{ route('index') }}')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    location.reload();
                })
                .catch(error => {
                    console.error('There was an error!', error);
                    alert('An error occurred while fetching or uploading data.');
                })
                .finally(() => {
                    document.getElementById('loader').style.display = 'none';
            });;
        });
    </script>
</body>
</html>