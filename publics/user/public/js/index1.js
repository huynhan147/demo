$(document).ready(function() {
    $('#enableForm3')
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
                txtDiaChi: {
                    validators: {
                        notEmpty: {
                            message: 'Địa chỉ không được để trống'
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
                }
                
            }
        });
    $('#menu1').click(function (){
        $(".menu1").toggle();
    });
        
});
