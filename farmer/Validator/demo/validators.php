<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="../dist/css/bootstrapValidator.css"/>

    <script type="text/javascript" src="../vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrapValidator.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <!-- form: -->
            <section>
                <div class="page-header">
                    <h1>Merchant Registration :</h1>
                </div>

                <div class="col-lg-8 col-lg-offset-2">
                    <form id="defaultForm" method="post" action="target.php" class="form-horizontal">
                        <fieldset>
                          

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Merchant name</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="username" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Email address</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="email" />
                                </div>
                            </div>
                               <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Retype password</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="confirmPassword" />
                                </div>
                            </div>



                        </fieldset>

                        <fieldset>
                          
                           
                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label"> Phone number</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="phoneNumber" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-5 col-lg-offset-3">
                                    <div class="checkbox">
                                        <input type="checkbox" name="acceptTerms" /> Accept the terms and policies
                                    </div>
                                </div>
                            </div>

                           

                            

                       
                        

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- :form -->
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-z A-Z]+$/,
                        message: 'The username can only consist of alphabetical'
                    }
                }
            },
           
            acceptTerms: {
                validators: {
                    notEmpty: {
                        message: 'You have to accept the terms and policies'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    regexp: {
					regexp: /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,

                        message: 'The input is not a valid email address'
                    }
                }
            },
            website: {
                validators: {
                    uri: {
                        allowLocal: true,
                        message: 'The input is not a valid URL'
                    }
                }
            },
            phoneNumber: {
                validators: {
					 notEmpty: {
                        message: 'The phone no  is required and can\'t be empty'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'The phone no must be 10 character long'
                    },
                }
            },

           
           
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
					stringLength: {
                        min: 6,
                        max: 15,
                        message: 'The password  must be 6 character long and not more than 15 '
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
					stringLength: {
                        min: 6,
                        max: 15,
                        message: 'The password  must be 6 character long and not more than 15 '
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
           
        }
    });
});
</script>
</body>
</html>