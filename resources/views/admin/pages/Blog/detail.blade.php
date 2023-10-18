@extends('admin.layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BlogFrom</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">BLog</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{ route('admin.formblog.update',['formblog' => $blog->id]) }}"
                            enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input name="name" type="text" value="{{ $blog->name }}"
                                            class="form-control" id="name" placeholder="Enter name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input name="slug" type="text" value="{{ $blog->slug }}"
                                            class="form-control" id="slug" placeholder="a-b-c">
                                        @error('slug')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        {{-- <div id="short_description"></div> --}}
                                        <textarea placeholder="Describe yourself here..." class="form-control" name="short_description" id="short_description">{{ $blog->short_description }}</textarea>
                                        @error('short_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="information">Information</label>
                                        <textarea placeholder="Describe yourself here..." class="form-control" name="information" id="information">{{ $blog->information }}</textarea>
                                        @error('information')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="custom-select">
                                            <option value="">---Please Select---</option>
                                            <option {{ $blog->status === '1' ? 'selected' : '' }} value="1">Show
                                            </option>
                                            <option {{ $blog->status === '0' ? 'selected' : '' }} value="0">Hide
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image">image</label>
                                        <input name="image" type="file" class="form-control" id="image">
                                        @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                                @csrf
                                @method('put')
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js-custom')
    <script>
        //https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js
        // ClassicEditor
        //     .create(document.querySelector('#short_description'),{
        //         ckfinder: {
        //         // Upload the images to the server using the CKFinder QuickUpload command.
        //         uploadUrl: '{{ route('admin.product.ckedit.upload.image').'?_token='.csrf_token() }}'
        //          }
        //     })
        //Call the ClassicEditor.create() method to display the editor
        ClassicEditor
            .create(document.querySelector('#short_description'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#information'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var name = $('#name').val();
                //jquery.ajax at down
                $.ajax({
                    method: "POST", //method of form
                    url: "{{ route('admin.formblog.create.slug') }}", //action of form
                    data: {
                        'name': name,
                        '_token': '{{ csrf_token() }}'//va 404: csrf
                    },
                    success: function(response) {
                        $('#slug').val(response.slug);//sao chep
                    }
                });
            });
        });

    </script>
@endsection
