<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('root.general-setting-update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-control"
                        value="{{ $generalSetting->site_name }}" />
                </div>

                <div class="form-group">
                    <label for="layout">Layout</label>
                    <select name="layout" id="layout" class="form-control">
                        <option {{ $generalSetting->layout == 'LTR' ? 'selected' : '' }} value="LTR">LTR</option>
                        <option {{ $generalSetting->layout == 'RTL' ? 'selected' : '' }} value="RTL">RTL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control"
                        value="{{ $generalSetting->contact_email }}" />
                </div>

                <div class="form-group">
                    <label for="currency">Default Currency Name</label>
                    <select name="currency" id="currency" class="form-control select2">
                        <option value=""><---Select---></option>

                        @foreach (config('settings.currency_list') as $currency)
                            <option {{ $generalSetting->currency == $currency ? 'selected' : '' }}
                                value="{{ $currency }}">{{ $currency }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="currency_icon">Currency Icon</label>
                    <input type="text" name="currency_icon" id="currency_icon" class="form-control"
                        value="{{ $generalSetting->currency_icon }}" />
                </div>

                <div class="form-group">
                    <label for="timezone">Timezone</label>
                    <select name="timezone" id="timezone" class="form-control select2">
                        <option value=""><---Select---></option>

                        @foreach (config('settings.time_zones') as $key => $timezone)
                            <option {{ $generalSetting->timezone == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
</div>
