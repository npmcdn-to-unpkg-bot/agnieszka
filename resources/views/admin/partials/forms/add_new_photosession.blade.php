@inject('users', 'App\User')

<div class="col-xs-12 col-md-6 add-photosession">
    <div class="panel panel-default">
        <div class="panel-heading">Add new photosession</div>
        <div class="panel-body">
            <form class="form-horizontal form" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/photosessions') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label">Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                    <label for="category" class="col-md-4 control-label">Category</label>

                    <div class="col-md-6">
                        <select id="category" name="category" class="form-control">
                            <option selected disabled>Please select a category</option>
                            @foreach(categories() as $key => $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                            @if ($errors->has('category'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('client') ? ' has-error' : '' }}">
                    <label for="client" class="col-md-4 control-label">Client</label>

                    <div class="col-md-6">
                        <select id="client" name="client" class="form-control">
                            <option selected disabled>Please select a client</option>
                            @foreach($users::all() as $user)
                                @if(! $user->hasRole('admin'))
                                    <option value="{{ $user->id }}">{{ $user->getFullName() }}</option>
                                @endif
                            @endforeach
                            @if ($errors->has('client'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('client') }}</strong>
                                </span>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label for="date" class="col-md-4 control-label">Date of shooting</label>

                    <div class="col-md-6">
                        <input id="date" type="text" class="form-control" name="date" value="{{ date('d/m/Y') }}">
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('photo_download_limit') ? ' has-error' : '' }}">
                    <label for="photo_download_limit" class="col-md-4 control-label">Download limit</label>

                    <div class="col-md-6">
                        <select id="photo_download_limit" name="photo_download_limit" class="form-control">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            @if ($errors->has('photo_download_limit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photo_download_limit') }}</strong>
                                </span>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('expiry_date') ? ' has-error' : '' }}">
                    <label for="expiry_date" class="col-md-4 control-label">Expiry date</label>

                    <div class="col-md-6">
                        <input id="expiry_date" type="text" class="form-control" name="expiry_date" value="{{ \Carbon\Carbon::now()->addMonth()->format('d/m/Y') }}">
                        @if ($errors->has('expiry_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('expiry_date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" data-after-submit-value="Adding photosession&hellip;">
                            <svg class="glyph stroked camera "><use xlink:href="#stroked-camera"/></svg> Add Photosession
                        </button>
                    </div>
                </div>
            </form>
        </div> {{-- ./panel-body --}}
    </div> {{-- ./panel --}}
</div>