@inject('users', 'App\User')

        <div class="panel panel-default">
            <div class="panel-heading">Add new Photo Session</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/photosessions') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control" name="category" value="{{ old('category') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client" class="col-md-4 control-label">Client</label>

                            <div class="col-md-6">
                                <select id="client" name="client" class="form-control">
                                    @foreach($users::all() as $user)
                                        <option value="{{ $user->id }}">{{ $user->getFullName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date_of_photosession" class="col-md-4 control-label">Date of shooting</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="date_of_photosession" value="{{ date('d/m/Y') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Add new photo session
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>