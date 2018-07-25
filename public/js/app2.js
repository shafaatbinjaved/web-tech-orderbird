var frontend = null;

jQuery(document).ready(function() {
    frontend = new frontend_component();
});

function frontend_component() {

    var self = this;

    this.component = jQuery("[data-component='frontend']");

    this.front_form = this.component.find(".front-form");

    this.submit_btn = this.front_form.find(".submit");
    this.submit_btn.on("click",function() {
        var obj = new Object();
        obj.token = self.front_form.find("input[name='_token']").val();
        obj.method = self.front_form.find("input[name='_method']").val();
        obj.first_name = self.front_form.find(".first_name").val();
        obj.last_name = self.front_form.find(".last_name").val();
        obj.email = self.front_form.find(".email").val();
        obj.phone_num = self.front_form.find(".ph_number").val();
        obj.action = self.front_form.attr("action");

        if ( self.verify_form_data( obj ) ) {
            self.submit_lead_form( obj );
        }
    });

    this.verify_form_data = function( data ) {

        var return_value = true;
        var msg = '';

        if ( data.first_name == "" ) {
            return_value = false;
            var first_name = self.front_form.find(".first_name")
            first_name.addClass("error");
            self.element_change( first_name );
            var error = first_name.next();
            error.html( "* First Name can't be empty" );
        }
        if ( data.last_name == "" ) {
            return_value = false;
            var last_name = self.front_form.find(".last_name");
            self.element_change( last_name );
            var error = last_name.next();
            error.html( "* Last Name can't be empty" );
        }
        if ( !self.validateEmail( data.email ) ) {
            return_value = false;
            var email = self.front_form.find(".email");
            self.element_change( email );
            var error = email.next();
            error.html( "* Email can't be empty" );
        }
        if ( data.email.includes("@orderbird") ) {
            return_value = false;
            var error = self.front_form.find(".email").next();
            error.html( "* Email address can't be of @orderbird" );
        }
        if ( data.phone_num == "" ) {
            return_value = false;
            var ph_number = self.front_form.find(".ph_number");
            self.element_change( ph_number );
            var error = ph_number.next();
            error.html( "* Phone number can't be empty" );
        }

        return return_value;
    }

    this.element_change = function( element ) {
        element.on("keyup keypress",function() {
            var value = jQuery(this).val();
            if ( jQuery(this).hasClass("email") ) {
                if ( value.includes("@orderbird") ) {
                    var error = self.front_form.find(".email").next();
                    error.html( "* Email address should not contains @orderbird" );
                }
                else if ( value != "" ) {
                    element.removeClass("error");
                    element.next().html("");
                }
            }
            else if ( value != "" ) {
                element.removeClass("error");
                element.next().html("");
            }

        });
    }

    this.validateEmail = function(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    this.submit_lead_form = function ( data ) {
        jQuery.ajax({
            type: "POST",
            dataType: "JSON",
            url: data.action,
            data: {
                _token: data.token,
                _method: data.method,
                first_name: data.first_name,
                last_name: data.last_name,
                email: data.email,
                phone_num: data.phone_num
            },
            success: function ( resp ) {
                console.log( resp );
                if ( resp.success ) {
                    var html = '<div class="row">';
                    html += '<div class="col-12">';
                    html += 'Form submitted successfully, orderbird representative will contact you soon. Thanks.';
                    html += '</div>';
                    html += '</div>';
                    self.front_form.html( html );
                }
            },
            error: function ( resp ) {}
        });
    }
}

