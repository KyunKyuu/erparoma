$(document).ready(function() {

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

})
