"use strict"

const panelio = {
    is_list_view: function(){
        return Boolean($('#list-form').length)
    },
    button: {
        checked: {
            has: function(){
                return Boolean($('.check-one:checked').length)
            },
            alert: function(){
                Swal.fire({
                    icon: 'info',
                    title: localize.language.panelio.button.select_option,
                    showConfirmButton: true,
                    confirmButtonText: localize.language.panelio.button.realized,
                    allowOutsideClick: false
                })
            }
        },
        submit_list_form: function(action){
            if (panelio.button.checked.has()) {
                $('#list-form').prepend(`<input type="hidden" name="_method" value="OPTIONS"><input type="hidden" name="action" value="${action}">`).submit()
            } else {
                panelio.button.checked.alert()
            }
        },
        status: {
            enable: function() {
                panelio.button.submit_list_form('status.enable')
            },
            disable: function() {
                panelio.button.submit_list_form('status.disable')
            }
        },
    },
}

$(document).ready(function () {

});
