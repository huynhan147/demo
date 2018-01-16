$(document).ready(function (){
    $('.chitietsach').click(function (){
        $.ajax({
            url : 'site/controller/c_sach.php?cn=sach&method=Chi_tiet_sach&id_sach='+$(this).data('idchitietsach'),
            data :{
                //id_sach : $(this).data('idchitietsach')
            },
            dateType:"text",
            type: 'POST',
            success: function (result) {
                $('#right1').html(result);
            }
            
        });
        alert (a);
    });
});
$(document).ready(function (){
    $('.chi_tiet2').click(function (){
        $.ajax({
            headers: { 
            Accept : "text/plain; charset=utf-8",
            "Content-Type": "text/plain; charset=utf-8"
            },
            url : '?cn=giohang&method=XL_gio_hang',
            data :{
                id_them : $(this).data('id'),
                txtSoLuong : $('.txtSoLuong').val()
            },
            dateType:"text",
            type: 'Get',
            success: function () {
            }
            
        });
        alert (a);
    });
});
// register
$(document).ready(function() {
    $('#enableForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                txtHoTen: {
                    validators: {
                        notEmpty: {
                            message: 'Tên không được để trống'
                        }
                    }
                },
                txtTenDangNhap: {
                    validators: {
                        notEmpty: {
                            message: 'Tên đăng nhập không được để trống'
                        }
                    }
                },
                txtDiaChi: {
                    validators: {
                        notEmpty: {
                            message: 'Địa chỉ không được để trống'
                        }
                    }
                },
                password: {
                    
                    validators: {
                        notEmpty: {
                            message: 'Mật khẩu không được để trống'
                        }
                    }
                },
                txtEmail: {
                    validators: {
                        notEmpty: {
                            message: 'Email không được để trống'
                        },
                        emailAddress: {
                            message: 'Địa chỉ email không hợp lệ'
                        },
                        blank: {}
                    }
                },
                 txtSoDienThoai: {
                    validators: {
                        digits: {
                            message: 'Số điện thoại chỉ có thể chứa chữ số'
                        },
                        notEmpty: {
                            message: 'Số điện thoại khong được để rỗng'
                        }
                    }
                },
                
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message: 'Mật khẩu nhập lại không được để trống'
                        },
                        identical: {
                            field: 'password',
                            message: 'Mật khẩu không khớp'
                        }
                    }
                }
            }
        })
        // Enable the password/confirm password validators if the password is not empty
        .on('keyup', '[name="password"]', function() {
            var isEmpty = $(this).val() == '';
            $('#enableForm')
                    .formValidation('enableFieldValidators', 'password', !isEmpty)
                    .formValidation('enableFieldValidators', 'confirm_password', !isEmpty);

            // Revalidate the field when user start typing in the password field
            if ($(this).val().length == 1) {
                $('#enableForm').formValidation('validateField', 'password')
                                .formValidation('validateField', 'confirm_password');
            }
        });
});
$(document).ready(function() {
    $('#enableForm2')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                txtTenDangNhap: {
                    validators: {
                        notEmpty: {
                            message: 'The full name is required and cannot be empty'
                        }
                    }
                },
                txtMatKhau: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        }
                    }
                }
            }
        });
    });

