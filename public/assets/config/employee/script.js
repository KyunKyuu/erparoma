const data = [
    {name:'full_name', data:'full_name'},
    {name:'photo', data:'photo'},
    {name:'religion', data:'religion'},
    {name:'email', data:'email'},
    {name:'telepon', data:'telepon'},
    {name:'branch_id', data:'branch_id'},
    {name:'division_id', data:'division_id'},
    {name:'status', data:'status'},
    {name:'buttons', data:'buttons'},
];

const callback = {
    id:'#table .input-toggle',
    size:'mini',
    on:'<i class="fas fa-check"></i>',
    onstyle : 'success',
    off:'<i class="fas fa-times"></i>',
    offstyle:'danger',
}

$(document).ready(function() {

    Table({table:'#table', data:data, url:'/api/v1/employee/get', callbackButton:callback})

    $('#tampil-data').on('click', '#personal-klik', function () {
        $('#personal-data').show()
        $(this).hide()
        let html ='<a href="#" id="personal-hide">Sembunyikan data pribadi</a>'
        $('#tampil-data').html(html)
    })

    $('#tampil-data').on('click', '#personal-hide', function() {
        $('#personal-data').hide()
        $(this).hide()
        let html ='<a href="#" id="personal-klik">Tampilkan data pribadi</a>'
        $('#tampil-data').html(html)
    })

    $('#tampil-data-update').on('click', '#personal-klik-update', function () {
        $('#personal-data-update').show()
        $(this).hide()
        let html ='<a href="#" id="personal-hide">Sembunyikan data pribadi</a>'
        $('#tampil-data-update').html(html)
    })

    $('#tampil-data-update').on('click', '#personal-hide', function() {
        $('#personal-data-update').hide()
        $(this).hide()
        let html ='<a href="#" id="personal-klik-update">Tampilkan data pribadi</a>'
        $('#tampil-data-update').html(html)
    })

})
