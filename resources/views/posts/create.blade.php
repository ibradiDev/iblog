@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"> {{ __('New Post') }} </div>

                    <div class="card-body">
                        <form id="form" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row justify-content-center">

                                <div class="p-0 col-md-10">
                                    <div class="row mb-3">
                                        <label for="title" class="col-md-3 text-md-end col-form-label">
                                            {{ __('Titre') }}
                                        </label>

                                        <div class="col-md-8">
                                            <input type="text" name="title" id="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" required autocomplete="title" />

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="category" class="col-md-3 col-form-label text-md-end">
                                            {{ __('Catégorie') }}
                                        </label>

                                        <div class="col-md-8">
                                            <select name="category" id="category" class="form-select form-control">
                                                <option value="informatique">{{ __('Informatique') }}</option>
                                                <option value="sport">{{ __('Sport') }}</option>
                                                <option value="science">{{ __('Science') }}</option>
                                                <option value="nature">{{ __('Nature') }}</option>
                                                <option value="cuisine">{{ __('Cuisine') }}</option>
                                                <option value="finance">{{ __('Finance') }}</option>
                                                <option value="marketing">{{ __('Marketing') }}</option>
                                                <option value="transport">{{ __('Transport') }}</option>
                                                <option value="autre">{{ __('Autre') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tags" class="col-form-label col-md-3 text-md-end">
                                            {{ __('Tags') }}
                                        </label>

                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <input id="tag_input" type="text" class="form-control mb-1">
                                                </div>
                                                <div class="col-xs-2 col-sm-2 col-md-2 m-auto">
                                                    <span onclick="add_tag()" class="btn btn-sm btn-primary">
                                                        {{ __('Ajouter') }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div id="tags" class=""></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="content" class="col-md-3 text-md-end col-form-label">
                                            {{ __('Contenu') }}
                                        </label>

                                        <div class="col-md-8">
                                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30"
                                                rows="10"></textarea>

                                            @error('content')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-8 offset-md-3">
                                            <button id="submit_btn" type="submit"
                                                class="btn btn-primary">{{ __('Poster') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-0 mx-auto col-md-2">
                                    <div class="text-center">
                                        <span id="add_img_btn" onclick="choose_img()" class="btn btn-sm btn-primary">
                                            {{ __('Ajouter une image') }}
                                        </span>
                                        <span id="rm_img_btn" onclick="remove_img()" class="d-none btn btn-sm btn-danger">
                                            {{ __('Retirer X') }}
                                        </span>

                                        <img id="img_shower" width="130px" height="142px" class="mt-3 d-none">

                                        <input id="img_input" type="file" accept="image/*" name="image_url"
                                            class="d-none form-control" onchange="show_img(this)">
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        var tag_input = document.getElementById("tag_input");
        var tags = document.getElementById("tags");
        var img_input = document.getElementById("img_input");
        var rm_img_btn = document.getElementById("rm_img_btn");
        var add_img_btn = document.getElementById("add_img_btn");
        var img_shower = document.getElementById("img_shower");

        const remove_tag = (id) => {
            const elt = document.getElementById(id);
            elt
                ?
                elt.parentNode.removeChild(elt) :
                console.log("Element with ID " + id + " not found.");
        }

        const add_tag = () => {
            let tag = tag_input.value;
            if (tag) {
                tags.innerHTML += `
                <block id='${tag}' class='bg-light m-auto me-2 px-2' style="border-radius:8px;">
                    <label>
                        <input type='checkbox' class='d-none' name='tags[]' value='${tag}' checked />
                        #${tag}
                    </label>
                    <span style="color:#aaa;" title='click to remove' onclick='remove_tag("${tag}")'>x</span>
                </block>`;
            }
            tag_input.classList.add('focus');
            tag_input.value = null;
            return;
        }

        const remove_img = () => {
            img_input.value = null;
            console.log(img_input.files[0]);
            img_shower.setAttribute('src', '');
            img_shower.classList.add('d-none');
            rm_img_btn.classList.add('d-none');
            add_img_btn.classList.remove('d-none');
        }

        const show_img = (x) => {
            let file = x.files[0];
            add_img_btn.classList.add('d-none');
            img_shower.setAttribute('src', window.URL.createObjectURL(file));
            img_shower.classList.remove('d-none');
            rm_img_btn.classList.remove('d-none');
        }

        const choose_img = () => {
            document.getElementById("img_input").click();
        }
    </script>
@endsection
