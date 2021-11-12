<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.payout.columns.user_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.user_id" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}" :options="{{ $users->toJson() }}.map(type => type.id)" :custom-label="opt => {{ $users->toJson() }}.find(x => x.id == opt).name" :searchable="true" open-direction="bottom"></multiselect>
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('method'), 'has-success': fields.method && fields.method.valid }">
    <label for="method" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.payout.columns.method') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.method" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}" :options="payment_methods.map(m => m.slug)" :custom-label="opt => payment_methods.find(x => x.slug == opt).name" open-direction="bottom"></multiselect>
        <div v-if="errors.has('method')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('method') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.payout.columns.status') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.status" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}" :options="['Pending', 'Completed', 'Failed']" open-direction="bottom"></multiselect>
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('amount'), 'has-success': fields.amount && fields.amount.valid }">
    <label for="amount" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.payout.columns.amount') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.amount" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('amount'), 'form-control-success': fields.amount && fields.amount.valid}" id="amount" name="amount" placeholder="{{ trans('admin.payout.columns.amount') }}">
        <div v-if="errors.has('amount')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('amount') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('currency'), 'has-success': fields.currency && fields.currency.valid }">
    <label for="currency" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.payout.columns.currency') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.currency" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('currency'), 'form-control-success': fields.currency && fields.currency.valid}" id="currency" name="currency" placeholder="{{ trans('admin.payout.columns.currency') }}">
        <div v-if="errors.has('currency')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('currency') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('reference'), 'has-success': fields.reference && fields.reference.valid }">
    <label for="reference" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.payout.columns.reference') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.reference" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}" :options="['BusinessPayment', 'SalaryPayment']" open-direction="bottom"></multiselect>
        <div v-if="errors.has('reference')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('reference') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('transaction_id'), 'has-success': fields.transaction_id && fields.transaction_id.valid }">
    <label for="transaction_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.payout.columns.transaction_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.transaction_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('transaction_id'), 'form-control-success': fields.transaction_id && fields.transaction_id.valid}" id="transaction_id" name="transaction_id" placeholder="{{ trans('admin.payout.columns.transaction_id') }}">
        <div v-if="errors.has('transaction_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('transaction_id') }}</div>
    </div>
</div>
