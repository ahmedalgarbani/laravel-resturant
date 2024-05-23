@extends('Admin.layouts.master')


@section('content')

        <section class="section">
            <div class="section-header">
                <h1>Chat Box</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Chat Box</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-4 " style="hight:100vh">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border" id="userOnline">
                                    @foreach($chatUsers as $chatUser)
                                    <li class="media fp_chat_user" data-user="{{$chatUser->id}}" style="cursor: pointer">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset($chatUser->avatar)}}" style="object-fit: cover">
                                        <div class="media-body">
                                            <div class="mt-0 mb-1 font-weight-bold">{{$chatUser->name}}</div>
                                            <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-8" id="userChating">
                        <div class="card chat-box" id="mychatbox" style="hight:100vh">
                            <div class="card-header">
                                <h4>Chat with Rizal</h4>
                            </div>
                            <div class="card-body chat-content">

                            </div>
                            <div class="card-footer chat-form">
                                <form id="chat-form" action="" method="post">
                                    @csrf
                                    <input type="text" class="form-control fp_message fp_send_message" name="message" placeholder="Type a message">
                                    <input type="hidden" id="receiver_id" name="receiver_id"  value="">
                                    <button class="btn btn-primary">
                                        <i class="far fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection
@push('scripts')

    <script>
        $(document).ready(function (){
            var userId = "{{auth()->user()->id}}"
            $('#receiver_id').val("")

            function scrollbuttom(){
                let chatContent = $('.chat-content')
                chatContent.scrollTop(chatContent.prop("scrollHeight"))
            }


            $('.fp_chat_user').on('click',function (){
                let senderId = $(this).data('user')
                $('#receiver_id').val(senderId)
                $.ajax({
                    method:'GET',
                    url:'{{route('admin.chat.get-conversation',':senderId')}}'.replace(':senderId',senderId),
                    beforeSend:function (){

                    },
                    success:function (response){
                        $('.chat-content').empty()
                        $.each(response,function (index,message){
                           // let avatar = "{{asset(':avatar')}}".replace(':avatar',message.sender.avatar)
                            let html =`
                          <div class="chat-item ${message.sender_id == userId ? "chat-right":"chat-left"} " style="">
                                            <img style="width: 50px;height: 50px;object-fit: cover" src= >
                                            <div class="chat-details">
                                                <div class="chat-text">${message.message}</div>
                                            <div class="chat-item">sender...</div>
                                            </div>
                                        </div>

                            `
                            $('.chat-content').append(html)
                        })
                        scrollbuttom()
                    },
                    error:function (){

                    }
                })

            })

            $('#chat-form').on('submit',function (e){

                e.preventDefault()
                let dataForm = $(this).serialize()

                $.ajax({
                    method:'POST',
                    url:'{{route('admin.chat.send-message')}}',
                    data:dataForm,
                    beforeSend:function (){
                        let message = $('.fp_message').val()
                        let html =`
                          <div class="chat-item  chat-right" style="">
                            <img src="" >
                            <div class="chat-details">
                                <div class="chat-text">${message}</div>
                            <div class="chat-item">sender....</div>
                            </div>
                        </div>

                            `
                        $('.chat-content').append(html)

                        $('.fp_send_message').val('')
                    },
                    success:function (response){


                    },
                    error:function (xhr,status,error){
                        let errorMessage = xhr.responseJSON.error
                    }
                })

            })



        })
    </script>
@endpush
