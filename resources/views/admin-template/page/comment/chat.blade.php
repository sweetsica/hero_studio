{{--<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>--}}
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
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex align-items-center">
                                <img src="{{asset('admin-asset/assets/images/users/avatar-9.jpg')}}"
                                     class="me-2 rounded-circle" height="36" alt="Arya Stark">
                                <h5 class="mt-0 mb-0 fs-14">
                                    {{ $comment->member->name }}
                                </h5>
                            </div>
                            <span class="float-end text-muted fs-12">{{ $comment->created_at }} </span>
                        </div>
                        <div class="flex-grow-1">
                            @switch($comment->type)
                                @case('media')
                                @case('media_upload')
                                <img style="max-width: 150px; max-height: 150px" src="{{$comment->content}}">
                                @break
                                @case('file')
                                <a href="{{route('download', ['file' => $comment->content])}}">{{route('download', ['file' => $comment->content])}}</a>
                                @break
                                @default
                                <p class="mt-1 mb-0 text-muted">
                                    {{ $comment->content }} 123
                                </p>
                                @break
                            @endswitch
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
                <form id="chat-form" action="{{route('comment-task', $task->id)}}" class="comment-area-box"
                      method="POST">
                    @csrf
                    <textarea id="chat-textarea" name="comment" rows="3" class="form-control border-0 resize-none"
                              placeholder="Your comment..."></textarea>

                    <textarea id="chat-textarea-hidden" rows="3" class="form-control border-0 resize-none"
                              placeholder="Your comment..." hidden></textarea>
                    <div class="p-2 bg-light">
                        <div class="float-end">
                            <a class="btn btn-primary" style="padding: 2px 12px" type="button" data-bs-toggle="modal"
                               data-bs-target="#myModal"> <i class="far fa-file"></i> Upload
                            </a>
                            <a
                                id="emoji-select"
                                class="btn border-1"
                                style="padding-block: 0; color: black"
                                role="button"
                                data-bs-toggle="popover-emo"
                            >
                                <i class="far fa-smile"></i>
                            </a>
                            <a
                                id="sticker-select"
                                class="btn btn-sm btn-danger"
                                role="button"
                                data-bs-toggle="popover"
                            >Send sticker</a>
                            <button id="chat-submit" type="submit" class="btn btn-sm btn-success">
                                Gửi bình luận
                            </button>
                        </div>
                        <div>
                            <i class="uil uil-message me-1"></i>
                        </div>
                    </div>
                    <input name="type" value="text" hidden>
                    <input name="media_type" value="text" hidden>
                </form>
            </div> <!-- end .border-->
        </div> <!-- end col-->
    </div>
</div>

<section class="center">
    <div hidden>
        <div data-name="popover-emoji">
            <div id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
        </div>
    </div>

    <div hidden>
        <div data-name="popover-sticker" style="width: 200px;height: 200px">
            <div id="myTabContent">
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
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Thông tin thành viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="chat-form" action="{{route('comment-task', $task->id)}}" class="comment-area-box"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="comment" onchange="loadFile(event)" required>
                        <input id="file_type" name="type" value="file" hidden>
                        <input id="file_media_type" name="media_type" value="file" hidden>
                        <img id="output" style="width: 200px; height: 200px"/>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                    <script>
                        const loadFile = function (event) {
                            const files = event.target.files;
                            const extension = files[0].type
                            const fileExtension = extension.split('/')[1];

                            const validFilePath = ['jpeg', 'jpg', 'png', 'gif']
                            if (validFilePath.includes(fileExtension)) {
                                $("#file_type").val('media_upload')
                            }
                            $("#file_media_type").val(fileExtension)

                            const output = document.getElementById('output');
                            output.src = URL.createObjectURL(files[0]);
                            output.onload = function () {
                                URL.revokeObjectURL(output.src) // free memory
                            }
                        };
                    </script>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>

{{-- Chart sticker js --}}
{{--<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>--}}
{{--<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>--}}
{{--<script type='text/javascript' src='{{asset('admin-asset/assets/js/chat-sticker.js')}}'></script>--}}

