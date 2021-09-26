$( document ).on('ready', function () {
    'use strict';

    function confirmation() {
        return confirm(CONFIRMATION_MSG)
    }

    $('.confirm').click(function () {
        event.preventDefault();
        if(confirmation() === true) {
            $(this).parent().submit();
        }
    });

    $('.btnDeleteAll').click(function () {
        event.preventDefault();
        if(confirmation() === true) {
            $('#deletesData').submit();
        }
    });

    $('.confirmDeleteItem').click(function () {
        const Self = $(this);
        event.preventDefault();
        if(confirmation() === true) {
            $('#delete-form').prop('action', Self.data('id')).submit();
        }
    });

    $('.confirmRestoreItem').click(function () {
        const Self = $(this);
        event.preventDefault();
        if(confirmation() === true) {
            $('#restore-form').prop('action', Self.data('id')).submit();
        }
    });

    $('.CustomActionBtn').click(function () {
        const Self = $(this);
        event.preventDefault();
        if(confirmation() === true) {
            var dataID = Self.data('id');
            $('#' + dataID).submit();
        }
    });

    $('.BtnStatus').click(function () {
        const Self = $(this);
        event.preventDefault();
        if(confirmation() === true) {
            $('#statusForm').prop('action', Self.data('id')).submit();
        }
    });

    $('.BtnCustomAction').click(function () {
        const Self = $(this);
        event.preventDefault();
        if(confirmation() === true) {
            $('#CustomActionForm').prop('action', Self.data('id')).submit();
        }
    });

    $('.btn_confirm').click(function (e) {
        e.preventDefault();
        if(confirmation() === true) {
            // Here Code
            $(this).parent().submit();
        }
    });

    // Check box select in table
    $(document).on('click', '#DataSelect', function () {
        const roleCheck = $('.DataCheckBox');
        if($('#DataSelect').parents('.table').find("tbody input:not(:disabled)").length) {
            if ($('#DataSelect').prop('checked') === true) {
                roleCheck.prop('checked', true);
                $('.btnDeleteAll').css('display', 'block');
            } else {
                roleCheck.prop('checked', false);
                $('.btnDeleteAll').css('display', 'none');
            }
        } else {
            $('#DataSelect').prop('checked', false);
        }
    });

    $(document).on('click', '.DataCheckBox', function () {
        if($(this).parents('tbody').find('.DataCheckBox:checked').length > 0) {
            $('.btnDeleteAll').css('display', 'block');
        } else {
            $('.btnDeleteAll').css('display', 'none');
        }
    });

    if ($(".preview_images").length > 0) {
        $('.preview_images').magnificPopup({delegate: 'a', type: 'image', gallery: {enabled: true}});
    }

    if ($(".preview_images_pro").length > 0) {
        $('.preview_images_pro').magnificPopup({delegate: 'a', type: 'image', gallery: {enabled: true}});
    }

    if ($(".open_img").length > 0) {
        $('.open_img').magnificPopup({delegate: 'a',type: 'image'});
    }

    $('#select_permissions').click(function () {
        if($(this).prop('checked') === true) {
            $('.checked_permission').prop('checked', true);
        } else {
            $('.checked_permission').prop('checked', false);
        }
    });

    $(document).on('click', '.selectBoxPermission', function () {
        var Self = $(this);
        var Children = Self.parents('.panel-default').find('.checked_permission');
        if(Self.prop('checked') === true) {
            Children.prop('checked', true);
        } else {
            Children.prop('checked', false);
        }
    });


    $(document).on('submit', 'form', function () {
        $(this).find('#submit').attr('disabled', true).append('<i class="fa fa-spinner fa-spin spinnerBTN"></i>');
        $(this).find('#submit').parent().find('a').hide();
    });

    $('#searchForm').submit(function () {
        $(this)
            .find('input[name], select[name]')
            .filter(function () {
                return !this.value;
            })
            .prop('name', '');
    });

});
