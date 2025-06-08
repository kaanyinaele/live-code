$(document).ready(function() {
   $('#registration').bootstrapValidator({
          fields: {
              email: {
                  validators: {
                      notEmpty: {
                          message: 'Please enter your E-mail Address'
                      },
                      emailAddress: {
                          message: 'Please enter a valid E-mail Address'
                      }
                  }
              },
              name:{
                validators: {
                      notEmpty: {
                          message: 'Please enter your Name'
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
                      message: 'Please enter Mobile Number'
                  },
                  regexp: {
                    regexp: /^[0-9][0-9]{6,14}$/,
                    message: 'Please enter be within 7 to 15 digits'
                  }
                }
              },
              zip_code: {
                  validators: {
                     regexp: {
                       regexp: /^[0-9][0-9]{2,11}$/,
                        message: 'Zipcode should be between 3 to 12 digits.'
                    },
                  
                }
              },
               address:{
                validators: {
                      notEmpty: {
                          message: 'Please enter your address'
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
                      message: 'Please enter your password'
                  },
                   same: {
                        field: 'confirm_password',
                        message: 'The username and password can\'t be the same as each other'
                    }
                }
              },
               confirm_password: {
                  validators: {
                    notEmpty: {
                          message: 'Please enter your confirm password'
                      },
                      identical: {
                          field: 'password',
                          message: 'The password and its confirm password are not the same'
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
          fields: {
              password_confirmation: {
                  validators: {
                      identical: {
                          field: 'password',
                          message: 'The password and its confirm password are not the same'
                      },
                      notEmpty: {
                          message: 'Please enter your confirm password'
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
                      message: 'Please enter your password'
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
                          message: 'Please enter your E-mail'
                      },
                      emailAddress: {
                          message: 'Please enter a valid E-mail'
                      }
                  }
              }
          }
    });
     $('#login').bootstrapValidator({
          fields: {
              email: {
                  validators: {
                      notEmpty: {
                          message: 'Please enter your E-mail'
                      },
                      emailAddress: {
                          message: 'Please enter a valid E-mail'
                      }
                  }
              },
              passwd:{
                validators: {
                      notEmpty: {
                          message: 'Please enter your password'
                      },
                  //     stringLength: {
                  //     min: 6,
                  //      max:20,
                  //     message: 'The password should contain 6 to 20 characters'
                  // },
              }
          }
        }
    });

    $('#change_password').bootstrapValidator({
         fields: {
              confirmation_password: {
                  validators: {
                      identical: {
                          field: 'password',
                          message: 'The password and its confirm password are not the same'
                      },
                      notEmpty: {
                          message: 'Please enter your confirm password'
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
                      message: 'Please enter your password'
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
                      message: 'Please enter your password'
                  }
                }
              }
          }    
    });

    $('#account_setting').bootstrapValidator({
       fields: {
             mobile_no: {
                    validators: {
                       stringLength: {
                            min: 6,
                            max:15,
                            message: 'The mobile number should contain 6 to 15 characters'
                        },
                    }
              },
              address: {
                    validators: {
                       stringLength: {
                            max:500,
                            message: 'Address should  be within 500 characters'
                        },
                    }
              },
              image: {
                    validators: {
                       file: {
                             extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png,image/jpg',
                            message: 'The selected image is not valid'
                        }
                    }
              }
       }

    });
     $('#contact_us').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
         fields: {
              name: {
                  validators: {
                      stringLength: {
                       min: 3,
                       max:50,
                      message:'The name should contain 3 to 50 characters'
                      },
                      notEmpty: {
                          message: 'Please enter your name'
                      }
                  }
              },
              email: {
                  validators: {
                     emailAddress: {
                          message: 'Please enter a valid E-mail'
                      },
                  notEmpty: {
                      message: 'Please enter your email'
                  }
                }
              }, 
              message: {
                  validators: {
                     stringLength: {
                      min: 3,
                       max:500,
                      message: 'The message should contain 3 to 500 characters'
                  },
                  notEmpty: {
                      message: 'Please enter your message'
                  }
                }
              }
          }    
    });

      $('#select_subcat').bootstrapValidator({
       fields: {
           subcategory: {
              validators: {
                  notEmpty: {
                      message: 'Please select Category'
                  },
               }
           }
         }
      });

     $('#service-request').bootstrapValidator({
       fields: {
             additional_information: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter Additional Information'
                        }
                    }
              },
                 time: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Time field'
                        }
                    }
                 },
                 date: {
                    validators: {
                        notEmpty: {
                            message: 'Please fill Date field.'
                        }
                    }
                 },
              address: {
                    validators: {
                       // stringLength: {
                       //      max:200,
                       //      message: 'The address should be within 200 characters'
                       //  },
                        notEmpty: {
                            message: 'Please enter your address'
                        }
                    }
              },
              image: {
                    validators: {
                     // notEmpty: {
                     //  message: 'Please select image'
                     //  },
                       file: {
                             extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png,image/jpg',
                            message: 'The selected image is not valid'
                        }
                    }
              },
              mobile_no: {
                  validators: {
                  notEmpty: {
                      message: 'Please enter Mobile Number'
                  },
                  regexp: {
                    regexp: /^[0-9][0-9]{6,14}$/,
                    message: 'Please enter be within 7 to 15 digits'
                  }
                }
              },
              whatsapp_no: {
                  validators: {
                  notEmpty: {
                      message: 'Please enter whatsapp Number'
                  },
                  regexp: {
                    regexp: /^[0-9][0-9]{6,14}$/,
                    message: 'Please enter be within 7 to 15 digits'
                  }
                }
              },
           subcategory: {
              validators: {
                  notEmpty: {
                      message: 'Please select Category'
                  },
              }
           }
         }
      });

  $('#paymentcard').bootstrapValidator({
       fields: {
           card_number: {
                  validators: {
                  notEmpty: {
                      message: 'Please enter payment-card number.'
                  },
                  regexp: {
                    regexp: /^[0-9]{14}$/,
                    message: 'Please enter valid 14 digits'
                  }
                }
              },
              expiry_month: {
              validators: {
                  notEmpty: {
                      message: 'Please select expiry month'
                  },
              }
           },
           expiry_year: {
              validators: {
                  notEmpty: {
                      message: 'Please select expiry year'
                  },
              }
           },
           cardholder_name: {
                    validators: {
                       stringLength: {
                            min: 3,
                            max:100,
                            message: 'The cardholder name should contain 3 to 100 characters'
                        },
                        notEmpty: {
                            message: 'Please enter your cardholder name'
                        }
                    }
              },

         }
      });

  $('#paymentcard_edit').bootstrapValidator({
       fields: {
           card_number: {
                  validators: {
                  notEmpty: {
                      message: 'Please enter payment-card number.'
                  },
                  regexp: {
                    regexp: /^[0-9]{14}$/,
                    message: 'Please enter valid 14 digits'
                  }
                }
              },
              expiry_month: {
              validators: {
                  notEmpty: {
                      message: 'Please select expiry month'
                  },
              }
           },
           expiry_year: {
              validators: {
                  notEmpty: {
                      message: 'Please select expiry year'
                  },
              }
           },
           cardholder_name: {
                    validators: {
                       stringLength: {
                            min: 3,
                            max:100,
                            message: 'The cardholder name should contain 3 to 100 characters'
                        },
                        notEmpty: {
                            message: 'Please enter your cardholder name'
                        }
                    }
              },


         }
      });
    





});
    




