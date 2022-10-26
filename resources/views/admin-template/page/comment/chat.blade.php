<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
<style>
    .chat-event {
        cursor: pointer;
    }

    .col-3.chat-event {
        background-repeat: no-repeat;
        background-size: 64px 64px;
        height: 64px;
        width: 64px;
    }
</style>
<div class="card">
    <div class="card-body" style="height: 418px;overflow-y: scroll">
        <h4 class="mb-4 fs-16">Bình luận về yêu cầu này</h4>
        @foreach($task->comments as $comment)
            <div class="row mt-1">
                <div class="col">
                    <div class="d-flex">
                        <img src="{{asset('admin-asset/assets/images/users/avatar-9.jpg')}}"
                             class="me-2 rounded-circle" height="36" alt="Arya Stark">
                        <div class="flex-grow-1">
                            <h5 class="mt-0 mb-0 fs-14">
                                                    <span
                                                        class="float-end text-muted fs-12">{{ $comment->created_at }} </span> {{ $comment->member->name }}
                            </h5>
                            <p class="mt-1 mb-0 text-muted">
                                {{ $comment->content }}
                            </p>
                        </div>
                    </div> <!-- end comment -->
                    <hr>
                </div> <!-- end col -->
            </div>
        @endforeach
    </div>
    <div class="row mt-1">
        <div class="col">
            <div class="border rounded">
                <form action="{{route('comment-task', $task->id)}}" class="comment-area-box"
                      method="POST">
                    @csrf
                    <textarea name="comment" rows="3" class="form-control border-0 resize-none"
                              placeholder="Your comment..."></textarea>
                    <div class="p-2 bg-light">
                        <div class="float-end">
                            <a id="example" tabindex="0" class="btn btn-sm btn-danger" role="button"
                               data-bs-toggle="popover"
                            >Sending emo</a>
                            <button type="submit" class="btn btn-sm btn-success">
                                Gửi bình luận
                            </button>
                        </div>
                        <div>
                            <i class="uil uil-message me-1"></i>
                        </div>
                    </div>
                </form>
            </div> <!-- end .border-->
        </div> <!-- end col-->
    </div>
</div>

<section class="center">
    <div hidden>
        <div data-name="popover-content" style="width: 200px;height: 200px">
            <div class="sticker-category">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true"><i
                                class="far fa-smile"></i>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fas fa-sticky-note"></i>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="gif-tab" data-bs-toggle="tab" data-bs-target="#gif" type="button"
                                role="tab" aria-controls="profile" aria-selected="false">
                            GIF
                        </button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="d-flex flex-wrap">
                        <div class="col-3 p-0 chat-event"
                             style="background-image: url(https://scontent.fhan3-1.fna.fbcdn.net/v/t39.1997-6/16685836_1458993954132381_7157059233479917568_n.png?_nc_cat=1&ccb=1-7&_nc_sid=ac3552&_nc_ohc=C3oRipq8l0cAX9WRabo&_nc_ht=scontent.fhan3-1.fna&oh=00_AT_of-jtzHpPkEUoqgiZfhyU0j_W5bjWwZmn2YoxdzaAAw&oe=635BE9E7);"
                             data-type="sticker"
                             data-url="https://scontent.fhan3-1.fna.fbcdn.net/v/t39.1997-6/16685836_1458993954132381_7157059233479917568_n.png?_nc_cat=1&ccb=1-7&_nc_sid=ac3552&_nc_ohc=C3oRipq8l0cAX9WRabo&_nc_ht=scontent.fhan3-1.fna&oh=00_AT_of-jtzHpPkEUoqgiZfhyU0j_W5bjWwZmn2YoxdzaAAw&oe=635BE9E7"
                        >
                        </div>
                        <div class="col-3 p-0 chat-event"
                             style="background-image: url(https://scontent.xx.fbcdn.net/v/t39.1997-6/16684984_1458993974132379_8795383253092532224_n.png?stp=dst-png_s168x128&_nc_cat=1&ccb=1-7&_nc_sid=0572db&_nc_ohc=-GrL81QnCmAAX9VFs43&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=00_AT9RoUzCahT3qEq5aZ9Lg45U30j1NsmQgAZa_bKFFOgTSg&oe=635D63F1);"
                             data-type="sticker"
                             data-url="https://scontent.xx.fbcdn.net/v/t39.1997-6/16684984_1458993974132379_8795383253092532224_n.png?stp=dst-png_s168x128&_nc_cat=1&ccb=1-7&_nc_sid=0572db&_nc_ohc=-GrL81QnCmAAX9VFs43&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=00_AT9RoUzCahT3qEq5aZ9Lg45U30j1NsmQgAZa_bKFFOgTSg&oe=635D63F1"
                        >
                        </div>
                        <div class="col-3 p-0 chat-event"
                             style="background-image: url(https://scontent.xx.fbcdn.net/v/t39.1997-6/16344830_1458999190798524_1851726792633614336_n.png?stp=dst-png_s168x128&_nc_cat=1&ccb=1-7&_nc_sid=0572db&_nc_ohc=7DWfANBlg6EAX90Qurn&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=00_AT-go2Zo1DumNtAdSMt_hhU9nFL4eqiJINlmX4yK1BGF8A&oe=635D5355);"
                             data-type="sticker"
                             data-url="https://scontent.xx.fbcdn.net/v/t39.1997-6/16684984_1458993974132379_8795383253092532224_n.png?stp=dst-png_s168x128&_nc_cat=1&ccb=1-7&_nc_sid=0572db&_nc_ohc=-GrL81QnCmAAX9VFs43&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=00_AT9RoUzCahT3qEq5aZ9Lg45U30j1NsmQgAZa_bKFFOgTSg&oe=635D63F1"
                        >
                        </div>
                        <div class="col-3 p-0 chat-event"
                             style="background-image: url(https://scontent.xx.fbcdn.net/v/t39.1997-6/16685079_1458993744132402_99939301952847872_n.png?stp=dst-png_s168x128&_nc_cat=1&ccb=1-7&_nc_sid=0572db&_nc_ohc=4dURLtAkE58AX8wMr8v&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=00_AT9Mtrx03JanF0vI8e90vMpmrBFeaD3nB0GSJggdUfV8TQ&oe=635D0377);"
                             data-type="sticker"
                             data-url="https://scontent.xx.fbcdn.net/v/t39.1997-6/16685079_1458993744132402_99939301952847872_n.png?stp=dst-png_s168x128&_nc_cat=1&ccb=1-7&_nc_sid=0572db&_nc_ohc=4dURLtAkE58AX8wMr8v&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=00_AT9Mtrx03JanF0vI8e90vMpmrBFeaD3nB0GSJggdUfV8TQ&oe=635D0377"
                        >
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="d-flex flex-wrap" role="row">
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1/30/1f600.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😀"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t6/1/30/1f600.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t89/1/30/1f603.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😃"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t89/1/30/1f603.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/30/1f604.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😄"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/ta/1/30/1f604.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/30/1f601.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😁"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t87/1/30/1f601.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1/30/1f606.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😆"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tc/1/30/1f606.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1/30/1f979.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🥹"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tab/1/30/1f979.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8b/1/30/1f605.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😅"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8b/1/30/1f605.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1/30/1f602.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😂"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8/1/30/1f602.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/30/1f923.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🤣"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8a/1/30/1f923.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t24/1/30/1f972.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🥲"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t24/1/30/1f972.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tc3/1/30/263a.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="☺️"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tc3/1/30/263a.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/30/1f60a.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😊"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/tb7/1/30/1f60a.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8d/1/30/1f607.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😇"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8d/1/30/1f607.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t84/1/30/1f642.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🙂"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t84/1/30/1f642.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1/30/1f643.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="🙃"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t5/1/30/1f643.png"> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 p-0 chat-event" data-type="emoji"
                             data-url="https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/1/30/1f609.png">
                            <div role="button" tabindex="0">
                                <div><span> <img height="30" width="30" alt="😉"
                                                 referrerpolicy="origin-when-cross-origin"
                                                 src="https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/1/30/1f609.png"> </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="gif" role="tabpanel" aria-labelledby="gif-tab">
                    <div class="d-flex flex-wrap">
                        <div class="col-12 p-0 chat-event"
                             data-type="gif"
                             data-url="https://media1.tenor.co/images/b72d1c6f639d9d3aa288ed59723745e1/tenor.gif?c=VjFfZmFjZWJvb2tfd2ViY29tbWVudHM&itemid=5173989"
                        >
                            <img width="200"
                                 src="https://media1.tenor.co/images/b72d1c6f639d9d3aa288ed59723745e1/tenor.gif?c=VjFfZmFjZWJvb2tfd2ViY29tbWVudHM&itemid=5173989">
                        </div>
                        {{--                        <div class="col-3 p-0 chat-event"--}}
                        {{--                        >--}}

                        {{--                        </div>--}}
                        {{--                        <div class="col-3 p-0 chat-event"--}}
                        {{--                        >--}}

                        {{--                        </div>--}}
                        {{--                        <div class="col-3 p-0 chat-event">--}}
                        {{--                            <img src="https://media1.tenor.co/images/b72d1c6f639d9d3aa288ed59723745e1/tenor.gif?c=VjFfZmFjZWJvb2tfd2ViY29tbWVudHM&itemid=5173989">--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

 {{-- Chart sticker js --}}
{{--<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>--}}
{{--<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>--}}
{{--<script type='text/javascript' src='{{asset('admin-asset/assets/js/chat-sticker.js')}}'></script>--}}

