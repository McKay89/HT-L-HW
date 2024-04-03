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
            <h1><a href="{{ url('/') }}">Homan-Trans - Laravel Homework</a></h1>
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

        // Filter by Name
        $(document).ready(function(){
            $('#filterByName').on('input', function(){
                var filterValue = $(this).val().toLowerCase();
                $('tbody tr').filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(filterValue) > -1)
                });
            });
        });

        // Filter by Created date (From-To)
        $(document).ready(function(){
            $('#filterByCreatedFrom, #filterByCreatedTo').on('input', function(){
                var fromValue = $('#filterByCreatedFrom').val();
                var toValue = $('#filterByCreatedTo').val();

                $('tbody tr').each(function(){
                    var created = $(this).find('td:nth-child(6)').text().trim();

                    if (fromValue && toValue) {
                        var fromDate = new Date(fromValue);
                        var toDate = new Date(toValue);
                        var rowDate = new Date(created);

                        $(this).toggle(rowDate >= fromDate && rowDate <= toDate);
                    } else if (fromValue) {
                        var fromDate = new Date(fromValue);
                        var rowDate = new Date(created);

                        $(this).toggle(rowDate >= fromDate);
                    } else if (toValue) {
                        var toDate = new Date(toValue);
                        var rowDate = new Date(created);

                        $(this).toggle(rowDate <= toDate);
                    } else {
                        $(this).show();
                    }
                });
            });
        });

        // Show up Modal window for list episode characters
        $(document).ready(function(){
            $('tbody tr').on('click', function(){
                var rowCounter = 1;
                var episode = $(this).data('episode');
                var characters = $(this).data('characters');
                var characterData = `
                    <table class="w-full">
                        <thead>
                            <tr class="bg-nav text-white">
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                characters.forEach(function(character){
                    characterData += `
                        <tr class=${rowCounter %2 == 0 ? "bg-table-body" : "bg-table-body2"}>
                            <th class="text-black">${character.id}</th>
                            <th class="text-black">${character.name}</th>
                        </tr>
                    `;

                    rowCounter++;
                });

                characterData += `</tbody></table>`;

                Swal.fire({
                    title: "<strong>" + episode + "</strong> character list",
                    icon: "info",
                    html: `
                        <div class="w-full">
                            ${characterData}
                        </div>
                    `,
                    showCloseButton: true,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonText: `
                        <i class="fa fa-thumbs-up"></i> OK!
                    `,
                    confirmButtonAriaLabel: "Confirm!",
                    cancelButtonText: `
                        <i class="fa fa-thumbs-down"></i>
                    `,
                    cancelButtonAriaLabel: "Thumbs down"
                });


            });
        });
    </script>
</body>
</html>