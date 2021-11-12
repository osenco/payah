import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                email:  '' ,
                phone: '',
                email_verified_at:  '' ,
                password:  '' ,
                
            }
        }
    }

});