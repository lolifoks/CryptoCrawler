<div class="row">

    <div class="col-md-4 col-md-offset-4">

        <p class="lead">Add new gallery picture</p>

        <form action="{{ route("gallery.store") }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">

                <div class="form-line">

                    <input name="title" type="text" class="form-control" placeholder="Title">

                </div>

            </div>

            <div class="form-group">

                <div class="form-line">

                    <textarea name="description" type="number" class="form-control" placeholder="Description"></textarea>

                </div>

            </div>

            <div class="form-group">
                <label for="picture">Picture:</label>
                    <input name="picture" type="file" id="picture">

            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary waves-amber" value="Add">

                <a href="{{ route("navigation.index") }}" class="btn btn-warning waves-effect">Cancel</a>

            </div>

        </form>

    </div>

</div>