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