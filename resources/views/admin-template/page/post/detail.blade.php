@extends('admin-template.main.master')

@section('content-css')
    <meta charset="utf-8"/>
    <title>Hero Studio | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-asset/assets/images/favicon.ico') }}"/>

    <!-- plugins -->
    <link href="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- App css -->
    <link href="{{ asset('admin-asset/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
          id="bs-default-stylesheet"/>
    <link href="{{ asset('admin-asset/assets/css/app.min.css') }}" rel="stylesheet" type="text/css"
          id="app-default-stylesheet"/>

    <link href="{{ asset('admin-asset/assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
          id="bs-dark-stylesheet" disabled/>
    <link href="{{ asset('admin-asset/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
          id="app-dark-stylesheet" disabled/>

    <!-- icons -->
    <link href="{{ asset('admin-asset/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin-asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('custom/app.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content-page')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Kho Media</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Bài viết</li>
                                <li class="breadcrumb-item active">Chi tiết</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="row">
                    <div class="col-xl-8 text-end my-2 justify-content-between d-flex">
                        <h4>{{$post->subject}}</h4>

                        @if(Auth::id() === $post->member_id || Auth::user()->hasRole('super admin'))
                            <a class="btn btn-primary" href="{{route('post.edit', $post->id)}}">Edit</a>
                        @endif</div>
                </div>
            </div>
            <div class="row">
                <!-- form information -->
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                {{--                                        <h6 class="mt-0 header-title">About Project</h6>--}}
                                <div class="row">
                                    <div class="col-12">
                                        <div id="container"></div>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-muted mt-3">
                                            <p>
                                                {{ $post->content }}
                                            </p>
                                            <div class="tags">
                                                <h6 class="fw-bold">Tags</h6>
                                                <div class="text-uppercase">
                                                    @foreach($post->hashTags as $tag)
                                                        <a href="{{route('post', ['hash-tag-id' => $tag->id])}}"
                                                           class="badge badge-soft-primary me-2"> {{$tag->name}} </a>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="tags">
                                                <h6 class="fw-bold">Phân loại : {{ $post->category->name }}</h6>

                                                <h6 class="fw-bold">Link video : <a
                                                        href="{{ $post->link_video }}">{{ $post->link_video }}</a></h6>

                                                <h6 class="fw-bold">Link driver : <a
                                                        href="{{ $post->link_driver }}">{{ $post->link_driver }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4 fs-16">Các bài viết chung phân loại</h4>
                                <div class="row mt-1">
                                    @foreach($postSameCategory as $postSameCate)
                                        <div class="d-flex my-1">
                                            <div class="text-center me-3 flex-shrink-0">
                                                <div style="width: 9rem;aspect-ratio: 2">
                                                    @if($postSameCate->thumbnail)
                                                        <img src="{{ "/storage/$postSameCate->thumbnail" }}"
                                                             style="width: 100%;;height: 100%"
                                                             alt="Post Thumbnail">
                                                    @else
                                                        <span
                                                            class="avatar-title bg-soft-primary text-primary">{{ substr($postSameCate->subject, 0, 1) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="fs-15 my-1"><a href="{{ route('post.detail', $postSameCate->id) }}"
                                                                          class="text-dark"> {{ $postSameCate->subject }}</a>
                                                </h5>
                                                <p class="text-muted fs-13 text-truncate mb-0"> {{$postSameCate->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div style="border-bottom: 1px solid"></div>

                                <h4 class="mt-2 mb-4 fs-16">Các bài viết giống hashtag</h4>
                                <div class="row">
                                    @foreach($postHaveSameTags as $postSameTags)
                                        <div class="d-flex my-1">
                                            <div class="text-center me-3 flex-shrink-0">
                                                <div style="width: 9rem;aspect-ratio: 2">
                                                    @if($postSameTags->thumbnail)
                                                        <img src="{{ "/storage/$postSameTags->thumbnail" }}"
                                                             style="width: 100%;;height: 100%"
                                                             alt="Post Thumbnail">
                                                    @else
                                                        <span
                                                            class="avatar-title bg-soft-primary text-primary">{{ substr($postSameTags->subject, 0, 1) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="fs-15 my-1"><a href="{{ route('post.detail', $postSameTags->id) }}"
                                                                          class="text-dark"> {{ $postSameTags->subject }}</a>
                                                </h5>
                                                <p class="text-muted fs-13 text-truncate mb-0"> {{$postSameTags->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
<button id="resetAnimate">Reset Animate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-js')
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <!-- optional plugins -->
    <script src="{{ asset('admin-asset/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- page js -->
    <script src="{{ asset('admin-asset/assets/js/pages/widgets.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-asset/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('admin-asset/assets/js/vendor.min.js') }}"></script>

    <!-- Data table neccessary -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <script src="{{ asset('admin-asset/assets/js/pages/datatables.init.js') }}"></script>
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection

@push('custom-js')
    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    <script type="importmap">
			{
                "imports": {
                    "three": "https://threejs.org/build/three.module.js",
                    "three/addons/": "https://threejs.org/examples/jsm/"
                }
            }

    </script>
    <script type="module">
        import * as THREE from 'three';
        import Stats from 'three/addons/libs/stats.module.js';
        import {OrbitControls} from 'three/addons/controls/OrbitControls.js';
        import {RoomEnvironment} from 'three/addons/environments/RoomEnvironment.js';

        import {GLTFLoader} from 'three/addons/loaders/GLTFLoader.js';
        import {DRACOLoader} from 'three/addons/loaders/DRACOLoader.js';

        let mixer;

        const clock = new THREE.Clock();
        const container = document.getElementById('container');
        const innerWidth = container.clientWidth || window.innerWidth;
        const innerHeight = container.clientWidth * 3 / 4 || window.innerHeight;


        // const stats = new Stats();
        // container.appendChild( stats.dom );

        const renderer = new THREE.WebGLRenderer({antialias: true});
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(innerWidth, innerHeight);
        renderer.outputEncoding = THREE.sRGBEncoding;
        container.appendChild(renderer.domElement);

        const pmremGenerator = new THREE.PMREMGenerator(renderer);
        const scene = new THREE.Scene();
        scene.background = new THREE.Color(0xbfe3dd);
        scene.environment = pmremGenerator.fromScene(new RoomEnvironment(), 0.04).texture;
        const camera = new THREE.PerspectiveCamera(40, innerWidth / innerHeight, 1, 100);
        camera.position.set(5, 2, 8);
        const controls = new OrbitControls(camera, renderer.domElement);
        controls.target.set(0, 0.5, 0);
        controls.update();
        controls.enablePan = false;
        controls.enableDamping = true;
        const dracoLoader = new DRACOLoader();
        dracoLoader.setDecoderPath('{{asset('custom/draco/gltf')}}/');
        const loader = new GLTFLoader();
        loader.setDRACOLoader(dracoLoader);
        loader.load('{{ sprintf('/storage/%s', $post->thumbnail) }}', function (gltf) {
            const model = gltf.scene;
            model.position.set(1, 1, 0);
            model.scale.set(0.01, 0.01, 0.01);
            scene.add(model);
            mixer = new THREE.AnimationMixer(model);
            mixer.clipAction(gltf.animations[0]).play();
            animate();
        }, undefined, function (e) {
            console.error(e);
        });


        window.onresize = function () {
            camera.aspect = innerWidth / innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(innerWidth, innerHeight);
        };


        function animate() {
            requestAnimationFrame(animate);
            const delta = clock.getDelta();
            mixer.update(delta);
            controls.update();
            // stats.update();
            renderer.render(scene, camera);
        }

        $('#resetAnimate').on('click', function() {
            camera.position.set(5, 2 , 8);
        })

    </script>
@endpush
