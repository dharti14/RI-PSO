$(document).ready(function() {

    $('#new_starter')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            // This option will not ignore invisible fields which belong to inactive panels
            excluded: ':disabled',

            fields: {
                branch: {
                    validators: {
                        notEmpty: {
                            message: 'The Branch is required'
                        }
                    }
                },
                designation: {
                    validators: {
                        notEmpty: {
                            message: 'The Designation is required'
                        }
                    }
                },
                join_date: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter date'
                        },
                        date: {
                          format: 'DD/MM/YYYY',
                          message: 'The value is not a valid date'
                        }
                    }
                },

                initial: {
                    validators: {
                        notEmpty: {
                            message: 'Please select Initial'
                        }
                    }
                }
                
            }
        })
        .bootstrapWizard({
            tabClass: 'nav nav-pills',
            onTabClick: function(tab, navigation, index) {
                return validateTab(index);
            },
            onNext: function(tab, navigation, index) {
                var numTabs    = $('#new_starter').find('.tab-pane').length,
                    isValidTab = validateTab(index - 1);
                if (!isValidTab) {
                    return false;
                }

                return true;
            },
            onPrevious: function(tab, navigation, index) {
                return validateTab(index + 1);
            },
            onTabShow: function(tab, navigation, index) {
                // Update the label of Next button when we are at the last tab
                var numTabs = $('#new_starter').find('.tab-pane').length;
                $('#new_starter .pager')
                    .find('.next')
                        .removeClass('disabled')    // Enable the Next button
                        .html(index === numTabs - 1 ? '<button type="submit" class="btn btn-primary">Finish</button>' : '<button type="" class="btn btn-secondary">Next</button>');

                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#new_starter').find('.bar').css({width:$percent+'%'});

                
            }
        });

    function validateTab(index) {
        var fv   = $('#new_starter').data('formValidation'), // FormValidation instance
            // The current tab
            $tab = $('#new_starter').find('.tab-pane').eq(index);

        // Validate the container
        fv.validateContainer($tab);

        var isValidStep = fv.isValidContainer($tab);
        if (isValidStep === false || isValidStep === null) {
            // Do not jump to the target tab
            return false;
        }

        return true;
    }

    // ADD DATE PICKER..
    if (jQuery('.date_picker').length > 0) {
        jQuery('.date_picker').each(function() {
        var t_name = jQuery(this).attr('name');
        $(this)
                .datepicker({
                    format: 'dd/mm/yyyy'
                })
        .on('changeDate', function(e) {
                    // Revalidate the date field
                    $('form').formValidation('revalidateField', t_name);
                });

        });
    }
});