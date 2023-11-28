<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('root.paypal-setting.update', 1) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status">Paypal Status</label>
                    <select name="status" id="status" class="form-control">
                        <option {{ $paypalSetting->status === 1 ? 'selected' : '' }} value="1">Enable</option>
                        <option {{ $paypalSetting->status === 0 ? 'selected' : '' }} value="0">Disable</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="account_mode">Account Mode</label>
                    <select name="account_mode" id="account_mode" class="form-control">
                        <option {{ $paypalSetting->account_mode === 0 ? 'selected' : '' }} value="0">Sandbox
                        </option>
                        <option {{ $paypalSetting->account_mode === 1 ? 'selected' : '' }} value="1">Live</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="country_name">Country Name</label>
                    <select name="country_name" id="country_name" class="form-control select2">
                        <option value=""><---Select---></option>

                        @foreach (config('settings.country_list') as $country)
                            <option {{ $paypalSetting->country_name === $country ? 'selected' : '' }}
                                value="{{ $country }}">{{ $country }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="currency">Currency Name</label>
                    <select name="currency" id="currency" class="form-control select2">
                        <option value=""><---Select---></option>

                        @foreach (config('settings.currency_list') as $key => $currency)
                            <option {{ $paypalSetting->currency === $currency ? 'selected' : '' }}
                                value="{{ $currency }}">{{ $key }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="currency_rate">Currency Rate (Per $~USD)</label>
                    <input type="text" name="currency_rate" id="currency_rate" class="form-control"
                        value="{{ $paypalSetting->currency_rate }}" />
                </div>

                <div class="form-group">
                    <label for="client_id">Paypal Client ID</label>
                    <input type="text" name="client_id" id="client_id" class="form-control"
                        value="{{ $paypalSetting->client_id }}" />
                </div>

                <div class="form-group">
                    <label for="secret_key">Paypal Secret Key</label>
                    <input type="text" name="secret_key" id="secret_key" class="form-control"
                        value="{{ $paypalSetting->secret_key }}" />
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
</div>
