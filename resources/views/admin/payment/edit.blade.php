@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.payment.actions.edit', ['name' => $payment->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <payment-form
                :action="'{{ $payment->resource_url }}'"
                :data="{{ $payment->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.payment.actions.edit', ['name' => $payment->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.payment.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </payment-form>

        </div>
    
</div>

@endsection