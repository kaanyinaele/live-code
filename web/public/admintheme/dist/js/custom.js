$(document).ready(function() {
   $('#slider_image').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          
        fields: {
              
              title:{
                validators: {
                      // notEmpty: {
                      //     message: 'Please enter your Title'
                      // },
                      stringLength: {
                        min: 3,
                        max:50,
                        message: 'Title should  be within 3 to 50 characters'
                       },
                    }
              },

              description:{
                // validators:{
                //   notEmpty:{message: 'Please enter your Description'},
                
                  stringLength: {
                          min: 10,
                          max:320,
                          message: 'Description should  be within 10 to 320 characters'
                         },
                

              },
              image:{
                validators: {
                     notEmpty:{message: 'Please select image'},
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png,image/jpg',
                        message: 'The selected image is not valid'
                    }
                }
            }    
              
        }
    });
 
    $('#select_provider').bootstrapValidator({
     excluded: ':hidden',
      // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    fields: {
      assign_provider: {
            validators: {
                notEmpty: {
                    message: 'The field is required and can\'t be empty'
                }
            }
        },
      }
    });
    $('#send_price').bootstrapValidator({
        excluded: [':disabled',':hidden',':not(:visible)',],
        fields: {
            'discount':{
                validators: {
                      notEmpty: {
                          message: 'Please enter your discount'
                      },
                      between: {
                        min: 0,
                        max: 100,
                        message: 'The discount must be between 1 and 100'
                    }
                }
              },
           
            'service[]':{
                validators: {
                    stringLength: {
                        min: 3,
                        max: 100,
                        message: ' service should contain 3 to 100 characters'
                    },
                    notEmpty: {
                        message: 'Please enter service'
                    },
                    
                }
            },
            'quantity[]':{
                validators: {
                      notEmpty: {
                          message: 'Please enter your Quantity'
                      },
                      regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Please enter valid number'
                    }
                }
              },
              'cost[]':{
                validators: {
                      notEmpty: {
                          message: 'Please enter unit per cost '
                      },
                      regexp: {
                        regexp: /^[0-9\.]+$/,
                        message: 'Please enter valid unit/cost'
                    }
                }
              },
        }
      })
      .on('click', '.add_more', function() {
         
        var $template = $('#make_clone'),
            validator = $('#send_price').data('bootstrapValidator');

            $clone    = $template
                            .clone()
                            .removeClass('hidden')
                            .removeAttr('id')
                            .insertBefore($template)
                            .find('input')
                            .each(function () {
                                validator.addField($(this));
                            })  

            console.log($option );

        // Add new field
      //  $('#addEmployeeManager1').bootstrapValidator('addField', $option);
    })
    // Remove button click handler
    .on('click', '.remove', function() { 
        var $row    = $(this).parent().parent(),
            $option = $row.find(':input');
        // Remove element containing the option
        $row.remove();
        sum_calculate(); 
        // Remove field
        $('#send_price').bootstrapValidator('removeField', $option);  
    })
});
    




    
    