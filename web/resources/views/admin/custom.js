$(document).ready(function() {
   $('#registration').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          
          fields: {
              email: {
                  validators: {
                      notEmpty: {
                          message: 'Please supply your E-mail'
                      },
                      emailAddress: {
                          message: 'Please supply a valid E-mail'
                      }
                  }
              },
              name:{
                validators: {
                      notEmpty: {
                          message: 'Please supply your Name'
                      },
                      stringLength: {
                        min: 3,
                        max:50,
                        message: 'Name should  be within 6 to 50 characters'
                       },
                    }

              },
              phone_no: {
                  validators: {
                    
                  notEmpty: {
                      message: 'Please supply Mobile Number'
                  },
                  regexp: {
                    regexp: /^[1-9][0-9]{6,14}$/,
                    message: 'Please supply be within 7 to 15 digits'
                  }
                }
              },
              zip_code: {
                  validators: {
                     regexp: {
                     regexp: /^[1-9][0-9]{2,11}$/,
                      message: 'Zipcode should be between 3 to 12 digits.'
                  },
                  
                }
              },
              password: {
                  validators: {
                     stringLength: {
                      min: 6,
                      max:50,
                      message: 'The password should contain 6 to 50 characters'
                  },
                  notEmpty: {
                      message: 'Please supply your password'
                  },
                  identical: {
                        field: 'confirm_password',
                        message: 'The password and its confirm are not the same'
                    }
                }
              },
               confirm_password: {
                  validators: {
                      identical: {
                          field: 'password',
                          message: 'The password and its confirm password are not the same'
                      },
                      notEmpty: {
                          message: 'Please supply your confirm password'
                      }
                  }
              },

              Accept:{
                validators: {
                      notEmpty: {
                          message: 'You have to accept the terms and policies' 
                      }
                    }
              }
          }
    });

    
    $('#reset_password').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          
          fields: {
              password_confirmation: {
                  validators: {
                      identical: {
                          field: 'password',
                          message: 'The password and its confirm password are not the same'
                      },
                      notEmpty: {
                          message: 'Please supply your confirm password'
                      }
                  }
              },
              password: {
                  validators: {
                     stringLength: {
                      min: 6,
                       max:20,
                      message: 'The password should contain 6 to 20 characters'
                  },
                  notEmpty: {
                      message: 'Please supply your password'
                  }
                }
              }, 
          }    
    });
    $('#forget_password').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          
          fields: {
              email: {
                  validators: {
                      notEmpty: {
                          message: 'Please supply your E-mail'
                      },
                      emailAddress: {
                          message: 'Please supply a valid E-mail'
                      }
                  }
              }
          }
    });
     $('#login').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          
          fields: {
              email: {
                  validators: {
                      notEmpty: {
                          message: 'Please supply your E-mail'
                      },
                      emailAddress: {
                          message: 'Please supply a valid E-mail'
                      }
                  }
              },
              passwd:{
                validators: {
                      notEmpty: {
                          message: 'Please supply your password'
                      },
                      stringLength: {
                      min: 6,
                       max:20,
                      message: 'The password should contain 6 to 20 characters'
                  },
              }
          }
        }
    });
    $('#change_password').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          
         fields: {
              confirmation_password: {
                  validators: {
                      identical: {
                          field: 'password',
                          message: 'The password and its confirm password are not the same'
                      },
                      notEmpty: {
                          message: 'Please supply your confirm password'
                      }
                  }
              },
              password: {
                  validators: {
                     stringLength: {
                      min: 6,
                       max:20,
                      message: 'The password should contain 6 to 20 characters'
                  },
                  notEmpty: {
                      message: 'Please supply your password'
                  }
                }
              }, 
              current_password: {
                  validators: {
                     stringLength: {
                      min: 6,
                       max:20,
                      message: 'The password should contain 6 to 20 characters'
                  },
                  notEmpty: {
                      message: 'Please supply your password'
                  }
                }
              }
          }    
    });

});
