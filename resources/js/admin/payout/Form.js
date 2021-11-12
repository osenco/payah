import AppForm from "../app-components/Form/AppForm";

Vue.component("payout-form", {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                user_id: "",
                method: "",
                status: "",
                amount: "",
                currency: "",
                reference: "",
                transaction_id: "",
                
            },
            payment_methods: [
                { slug: "mpesa", name: "Lipa Na M-Pesa" },
                { slug: "cash", name: "Cash" },
            ],
        };
    },
});
