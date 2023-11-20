<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="">

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-control"
                        value="{{ old('site_name') }}" />
                </div>

                <div class="form-group">
                    <label for="layout">Layout</label>
                    <select name="layout" id="layout" class="form-control">
                        <option value="LTR">LTR</option>
                        <option value="RTL">RTL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control"
                        value="{{ old('contact_email') }}" />
                </div>

                <div class="form-group">
                    <label for="currency">Default Currency Name</label>
                    <select name="currency" id="currency" class="form-control">
                        <option value=""></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="currency_icon">Currency Icon</label>
                    <input type="text" name="currency_icon" id="currency_icon" class="form-control"
                        value="{{ old('currency_icon') }}" />
                </div>

                <div class="form-group">
                    <label for="timezone">Timezone</label>
                    <select name="timezone" id="timezone" class="form-control">
                        <option value=""></option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
</div>
