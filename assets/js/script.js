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
        block: function(){
            panelio.button.submit_list_form('block')
        },
        unblock: function(){
            panelio.button.submit_list_form('unblock')
        },
        export: function(){
            let type = $('input[name="button_export"]:checked').val()

            if (type) {
                let route = $('#list-form').data('export')

                if (route) {
                    $.ajax({
                        url: route,
                        data: {
                            type: type
                        },
                        cache: false,
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function(data, status, xhr) {
                            const url = window.URL.createObjectURL(new Blob([data]))
                            const a = document.createElement('a')
                            a.href = url

                            const contentDisposition = xhr.getResponseHeader('Content-Disposition')
                            let fileName = 'export'

                            if (contentDisposition) {
                                const fileNameMatch = contentDisposition.match(/filename="?(.+)"?/)
                                if (fileNameMatch.length > 1) {
                                    fileName = fileNameMatch[1]
                                }
                            }

                            a.download = fileName
                            document.body.appendChild(a)
                            a.click()
                            a.remove()
                            window.URL.revokeObjectURL(url)

                            $('#modal-button-export').modal('hide')
                        },
                        error: function(xhr, status, error) {
                            console.error("Error occurred:", error)
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: localize.language.modal.export.route_error,
                        showConfirmButton: true,
                        confirmButtonText: localize.language.panelio.button.realized,
                        allowOutsideClick: false
                    })
                }
            } else {
                Swal.fire({
                    icon: 'info',
                    title: localize.language.panelio.button.select_option,
                    showConfirmButton: true,
                    confirmButtonText: localize.language.panelio.button.realized,
                    allowOutsideClick: false
                })
            }
        },
        import: function(type){
            panelio.button.submit_list_form('import.' + type)
        },
    },
}

$(document).ready(function () {

});
