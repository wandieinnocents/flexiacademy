MyFunctions = {
    is_valid_user_name: function (user_name, show_alert, input) {
        const regex = /^[a-zA-Z0-9]{3,20}$/;
        let valid = regex.test(user_name);
        if (!valid && show_alert) {
            alertify.alert("Please enter a valid user name");
        }
        if (input !== null)
            input.focus();
        return valid;
    },
    is_valid_name: function (user_name, show_alert, input, text) {
        const regex = /^[a-zA-Z]{2,25}$/;
        let valid = regex.test(user_name);
        if (!valid && show_alert) {
            alertify.alert(text);
        }
        if (input !== null)
            input.focus();
        return valid;
    },
    is_valid_email: function (user_email, show_alert, input) {
        const regex = /^[\w\-.+]+@[a-zA-Z0-9.\-]+\.[a-zA-Z0-9]{2,4}$/;
        let valid = regex.test(user_email);
        if (!valid && show_alert) {
            alertify.alert("Please enter a valid email address");
        }
        if (input !== null)
            input.focus();
        return valid;
    },
    is_valid_contact: function (contact, show_alert, input) {
        const regex = /^[0-9]{10,20}$/;
        let valid = regex.test(contact);
        if (!valid && show_alert) {
            alertify.alert("Please enter a valid contact");
        }
        if (input !== null)
            input.focus();
        return valid;
    },
    is_number_valid(number) {
        const regex = /^[+-]?\d+(\.\d+)?$/;
        let valid = regex.test(number);
        if (number === "")
            valid = false;
        return valid;
    },
    get_time_in_seconds(string_time) {
        if (string_time === '') {
            return '';
        }
        const date = Date.parse(string_time);
        return date / 1000;
    },
    input_changed: function (element, label) {
        label.html(element.target.files[0].name);
    },
};