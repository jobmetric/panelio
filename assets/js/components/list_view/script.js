$(document).ready(function(){
    $(document).on('click', '#list-btn-filter', function(){
        if ($(this).hasClass('btn-light-info')) {
            $(this).removeClass('btn-light-info btn-active-light-info').addClass('btn-info')
            $('#list-btn-filter-box').removeClass('d-none')
            $('#list-filter-box').removeClass('d-none')
        } else {
            $(this).removeClass('btn-info').addClass('btn-light-info btn-active-light-info')
            $('#list-btn-filter-box').addClass('d-none')
            $('#list-filter-box').addClass('d-none')
        }
    })

    // reset filter
    $(document).on('click', '#list-btn-delete-filter', function(){
        $('select.filter-list').val('').trigger('change')
        $('input.filter-list[type="checkbox"]').prop('checked', false)
        $('input.filter-list[type="radio"]').prop('checked', false)
        $('input.filter-list[type="color"]').val('')
        $('input.filter-list[type="email"]').val('')
        $('input.filter-list[type="date"]').val('')
        $('input.filter-list[type="datetime-local"]').val('')
        $('input.filter-list[type="month"]').val('')
        $('input.filter-list[type="week"]').val('')
        $('input.filter-list[type="time"]').val('')
        $('input.filter-list[type="number"]').val('')
        $('input.filter-list[type="tel"]').val('')
        $('input.filter-list[type="text"]').val('')
    })

    // keypress for input filter email, number, tel, text
    $(document).on('keypress', 'input.filter-list[type="email"],input.filter-list[type="number"],input.filter-list[type="tel"],input.filter-list[type="text"]', function(e){
        if (e.which === 13) {
            $('#list-btn-search').trigger('click')
        }
    })

    // search button
    $(document).on('click', '#list-btn-search', function(){
        if (dt) {
            dt.ajax.reload();
        }
    })
})
