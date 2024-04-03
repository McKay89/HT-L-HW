<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                colors: {
                    'nav': '#3B3B49',
                    'table-body': '#79798A',
                    'table-body-hover': '#5050C9',
                    'main': '#9898A9',
                    'white': '#ffffff',
                    'black': '#000000',
                    'loader': '#00000077',
                    'button': '#6666DF',
                    'button-hover': '#5050C9'
                }
            },
        }
    </script>
    <title>Homan-Trans - Laravel Homework</title>
</head>
<body class="bg-main">
    <nav class="h-24 w-full bg-nav text-white flex">
        <div class="w-1/2 text-3xl font-semibold flex justify-start ml-10 my-6">
            <h1>Homan-Trans - Laravel Homework</h1>
        </div>
        <div class="w-1/2  flex justify-end mr-10 my-6">
            <button id="fetchDataButton" class="bg-button hover:bg-button-hover transition text-white font-bold py-2 px-4 border border-blue-700 rounded">Download Data</button>
        </div>
    </nav>

    <main class="bg-main text-black w-full">
        @yield('main');
    </main>

    <div id="loader" class="absolute top-0 left-0 w-full h-full bg-loader text-white" style="display: none;">
        Töltés...
    </div>

    <script>
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