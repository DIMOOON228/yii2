$(document).ready(function () {
    const renderData = products => {
        $("#product-table").find('tbody').html('');
        products.map(product => {
            let row = "<tr>";
            row += `<td>${product.id}</td>`;
            row += `<td>${product.first_name}</td>`;
            row += `<td>${product.last_name}</td>`;
            row += `<td>${product.company_name}</td>`;
            row += `<td>${product.address}</td>`;
            row += `<td>${product.city}</td>`;
            row += `<td>${product.county}</td>`;
            row += `<td>${product.state}</td>`;
            row += `<td>${product.zip}</td>`;
            row += `<td>${product.phone1}</td>`;
            row += `<td>${product.phone2}</td>`;
            row += `<td>${product.email}</td>`;
            row += `<td>${product.web}</td>`;
            row += `<td><a href="/list/edit/${product.id}">Edit</a></td>`;
            row += "</tr>";
            $("#product-table").find('tbody').append(row);
        })
    };

    $.ajax({
        method: 'GET',
        type: 'JSON',
        url: 'site/info', // урл который ты сделаешь в роутах
        data: {},
        success: function (response) {
            renderData(response.products);
        },
        error: function (data) {
            alert(data);
        }
    });

    $('body').on('click', '.sorting-btn', event => {
        // $this - елемент по которому ты кликнул
        const $this = $(event.currentTarget);
        const columnName = $this.data('name'); // забираю имя колонки по которой сортировать с дата атрибута
        let direction = $this.data('direction') || "asc"; // забираю как сортировать (asc - от меньшего к большему, desc - наоборот) с дата атрибута - по умолчанию asc если дата аттрибут пустой

        $this.data('direction', direction === "asc" ? "desc" : "asc");
        direction = $this.data('direction') || "asc"; // забираю как сортировать (asc - от меньшего к большему, desc - наоборот) с дата атрибута - по умолчанию asc если дата аттрибут пустой
        $.ajax({
            method: 'GET',
            type: 'JSON',
            url: 'site/info', // урл который ты сделаешь в роутах
            data: {
                sort: {
                    columnName,
                    direction
                }
            },
            success: function (response) {
                renderData(response.products);
            },
            error: function (data) {
                alert(data);
            }
        });
    });
});