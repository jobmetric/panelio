"use strict"

const list_view = {
    select: {
        change_all: function() {
            if ($('#check-all').is(':checked')) {
                $('.check-one').prop('checked', true)
            } else {
                $('.check-one').prop('checked', false)
            }
        },
        change_one: function() {
            let flag = true
            $('.check-one').each(function () {
                if (!$(this).is(':checked')) {
                    flag = false
                    return false
                }
            })

            if (flag) {
                $('#check-all').prop('checked', true)
            } else {
                $('#check-all').prop('checked', false)
            }
        },
    },
    filter: {
        show: function(){
            $('#list-btn-filter').removeClass('btn-light-info btn-active-light-info').addClass('btn-info')
            $('#list-btn-filter-box').removeClass('d-none')
            $('#list-filter-box').removeClass('d-none')
        },
        hide: function(){
            $('#list-btn-filter').removeClass('btn-info').addClass('btn-light-info btn-active-light-info')
            $('#list-btn-filter-box').addClass('d-none')
            $('#list-filter-box').addClass('d-none')
        },
        toggle: function(){
            if ($('#list-btn-filter').hasClass('btn-light-info')) {
                this.show()
            } else {
                this.hide()
            }
        },
        reset: function(){
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
        },
        search: function(){
            if (dt) {
                dt.ajax.reload();
            }
        },
    },
}

$(document).ready(function(){
    $(document)
        .on('click', '#list-btn-filter', function(){
            list_view.filter.toggle()
        })

        // reset filter
        .on('click', '#list-btn-delete-filter', function(){
            list_view.filter.reset()
            list_view.filter.search()
        }).on('dblclick', '#list-btn-delete-filter', function(){
            list_view.filter.reset()
            list_view.filter.search()
            list_view.filter.hide()
        })

        // keypress for input filter email, number, tel, text
        .on('keypress', 'input.filter-list[type="email"],input.filter-list[type="number"],input.filter-list[type="tel"],input.filter-list[type="text"]', function(e){
            if (e.which === 13) {
                list_view.filter.search()
            }
        })

        // search button
        .on('click', '#list-btn-search', function(){
            list_view.filter.search()
        })

        // select checkbox
        .on('change', '#check-all', function(){
            list_view.select.change_all()
        })
        .on('change', '.check-one', function(){
            list_view.select.change_one()
        })
})
