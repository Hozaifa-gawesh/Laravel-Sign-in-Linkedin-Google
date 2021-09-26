@csrf
<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                    <label class="control-label" for="username">{{ __('lang.username') }} <span class="required">*</span></label>
                    <input type="text" name="username" id="username" value="{{ old('username', $data->username ?? '') }}" placeholder="{{ __('lang.enter') }} {{ __('lang.username') }}" class="form-control" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="control-label" for="email">{{ __('lang.email') }} <span class="required">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email', $data->email ?? '') }}" placeholder="{{ __('lang.enter') }} {{ __('lang.email') }}" class="form-control" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label for="gender">{{ __('lang.gender') }} <span class="required">*</span></label>
                    <select id="gender" data-title="{{ __('lang.choose') }} {{ __('lang.gender') }}" name="gender" class="form-control bs-select">
                        <option {{ old('gender', $data->gender ?? null) == 'male' ? 'selected' : '' }} value="male">{{ __('lang.male') }}</option>
                        <option {{ old('gender', $data->gender ?? null) == 'female' ? 'selected' : '' }} value="female">{{ __('lang.female') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label class="control-label" for="phone">{{ __('lang.phone') }} <span class="required">*</span></label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $data->phone ?? '') }}" placeholder="{{ __('lang.enter') }} {{ __('lang.phone') }}" class="form-control" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label class="display-block" for="image">{{ __('lang.choose') }} {{ __('lang.image') }} <span class="required"> {{ __('lang.best_size') }} (600 * 600)</span></label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img style="width: 150px;" src="{{ isset($data->image) ? asset($data->image) : asset('images/user.png') }}"/>
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                        <div>
                            <span class="btn default btn-file">
                                <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.image') }}</span>
                                <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.image') }} </span>
                                <input type="file" name="image" id="image">
                            </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-9">
                    <button type="submit" id="submit" class="btn green">{{ __('lang.submit') }}</button>
                    <a href="{{ route('dashboard.users') }}" class="btn default">{{ __('lang.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
